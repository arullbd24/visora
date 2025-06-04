<?php

namespace App\Livewire\Dashboard\Layouts\Sidebar;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Log\UserActivity;
use Carbon\Carbon;

class Logout extends Component
{

    public function logout(){
            $carbonNow = Carbon::now();
            UserActivity::create([
            'id' => Str::uuid(),
            'id_user' => Auth::user()->id_user,
            'activity_type' => json_encode(array(
                'Profile',
            )),
            'action' => json_encode(array(
                'title' => 'Logout Account',
                'type' => 'logout',
                'entity' => 'account',
                'description' => Auth::user()->userPersonal->fullname . ' logged out at ' .  $carbonNow ,
                'changes' => [],
            )),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
            'created_at' => $carbonNow,
        ]);
        
        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function render()
    {
        return view('livewire.dashboard.layouts.sidebar.logout');
    }
}
