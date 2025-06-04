<?php

namespace App\Livewire\Dashboard\Account;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User\User;

class Security extends Component
{
    public $authPassword = false;
    public $currentPassword;

    public $new_password;

    public $confirm_password;

    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.account.security');
    }
    
    public function validatecurrentPassword() {
        $user = Auth::user();
        $this->authPassword = Hash::check($this->currentPassword, $user->password);
        // if (Hash::check($this->currentPassword, $user->password)) {
        //     $this->authPassword = true;
        // } else {
        //     $this->authPassword = false;
        // }
    }

    public function changePassword(){
        if ($this->new_password == $this->confirm_password) {
            // session()->flash('error', 'Passwords do not match.');
            // return;
            // dd($this->new_password);
            User::where('id_user', '=', Auth::user()->id_user)->update([
                'password' => Hash::make($this->new_password),
            ]);
            dd('Password Changed');
        }
        else {
            dd('password different');
        }
        
        
    }
}
