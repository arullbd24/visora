<?php

namespace App\Livewire\Dashboard\Account\Others;

use Livewire\Attributes;
use Livewire\Component;

class SharedData extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.account.others.shared-data');
    }
}
