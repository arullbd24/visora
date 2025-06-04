<?php

namespace App\Livewire\Dashboard\Settings\Activities\Data;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\Log\UserActivity;

class Main extends Component
{
    public $logActivities = [];
    public function mount() {
        $this->logActivities = array_merge($this->logActivities, UserActivity::where('id_user', '=', Auth::user()->id_user)->whereJsonContains('activity_type', 'Settings')->orderByDesc('created_at')->paginate(10)->items());
    }
    public function placeholder() {
        return view('livewire.dashboard.settings.activities.placeholder.main');
    }
    public function render()
    {
        return view('livewire.dashboard.settings.activities.data.main');
    }
}
