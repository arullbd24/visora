<?php

namespace App\Livewire\Dashboard\Account\Others\Activity;

use Livewire\Attributes;
use Livewire\Component;

class Main extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.account.others.activity.main');
    }
}
