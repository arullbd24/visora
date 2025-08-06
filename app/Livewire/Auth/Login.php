<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Library\User as UserLibrary;
use App\Models\User as UserModels;
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
        
        
        if (UserModels\User::where('email', '=', $this->email)->exists()) {
            return $this->authUser();
        } 
        
        if (UserModels\Admin::where('email', '=', $this->email)->exists()) {
            return $this->authAdmin();
        }
        
    }

    #[Layout('auth.layouts.main')]
    public function render()
    {
        return view('livewire.auth.login');
    }


public function authUser(){
    if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
        $user = Auth::guard('web')->user();

        try {
            UserLibrary\Activity::createActivity(
                $user->id ?? $user->id_user,
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

        return redirect()->route($user->is_admin ? 'admin.dashboard' : 'dashboard.main');
    }

    $this->dispatch('showError', 'Email atau password salah.');
}


    
    public function authAdmin(){
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        session()->flash('error', 'Email atau password salah.');
    }












}