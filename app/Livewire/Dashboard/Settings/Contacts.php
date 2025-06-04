<?php

namespace App\Livewire\Dashboard\Settings;

use Livewire\Attributes;
use Livewire\Component;

class Contacts extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.settings.contacts');
    }
}
