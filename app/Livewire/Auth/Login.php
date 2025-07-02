<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Library\User as UserLibrary;
use Carbon\Carbon;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            // Logging aktivitas (jika ada userPersonal)
            try {
                UserLibrary\Activity::createActivity(
                    $user->id ?? $user->id_user, // fallback
                    ['Account'],
                    [
                        'title' => 'Authenticate Account',
                        'type' => 'authenticate',
                        'entity' => 'account',
                        'description' => ($user->userPersonal->fullname ?? $user->name) . ' login at ' . Carbon::now(),
                        'changes' => []
                    ]
                );
            } catch (\Throwable $e) {
                Log::warning('Activity logging failed: ' . $e->getMessage());
            }

            // Redirect sesuai role
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('dashboard.main');
            }
        } else {
            session()->flash('error', 'Email atau password salah.');
        }
    }

    #[Layout('auth.layouts.main')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
