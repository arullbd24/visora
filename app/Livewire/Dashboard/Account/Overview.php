<?php

namespace App\Livewire\Dashboard\Account;

use Livewire\Attributes;
use Livewire\Component;

class Overview extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.account.overview');
    }
}
