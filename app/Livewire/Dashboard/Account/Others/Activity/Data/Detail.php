<?php

namespace App\Livewire\Dashboard\Account\Others\Activity\Data;

use Livewire\Component;

class Detail extends Component
{
    public function placeholder() {
        return view('livewire.dashboard.account.others.activity.placeholder.detail');
    }
    public function render()
    {
        return view('livewire.dashboard.account.others.activity.data.detail');
    }
}
