<?php

namespace App\Livewire\Auth;

use Livewire\Attributes;
use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

use App\Library\User as UserLibrary;

use App\Models\Log\UserActivity;

use Carbon\Carbon;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Attempt login using the provided email and password
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            UserLibrary\Activity::createActivity(
                Auth::user()->id_user,
                [
                    'Account'
                ],
                [
                'title' => 'Authenticate Account',
                'type' => 'authenticate',
                'entity' => 'account',
                'description' => Auth::user()->userPersonal->fullname . ' login at ' . Carbon::now() ,
                'changes' => []
                ]
            );
            return redirect()->intended(route('dashboard.main'));
        } else {
            // dd('Auth Error');
            session()->flash('error', 'Your email address or password may be incorrect!');
        }
    }

    #[Attributes\Layout('auth.layouts.main')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
