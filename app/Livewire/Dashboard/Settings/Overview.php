<?php

namespace App\Livewire\Dashboard\Settings;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile\UserProfile;

class Overview extends Component
{
    public $user_profile;

    public function mount()
    {
        // Ambil data user profile, misalnya dari pengguna yang sedang login
        $this->user_profile = UserProfile::where('id_user', Auth::id())->first();
    }

    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.settings.overview', [
            'user_profile' => $this->user_profile,
        ]);
    }
}
