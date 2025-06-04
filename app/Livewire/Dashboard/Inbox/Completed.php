<?php

namespace App\Livewire\Dashboard\Inbox;

use Livewire\Attributes;
use Livewire\Component;

class Completed extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.inbox.completed');
    }
}
