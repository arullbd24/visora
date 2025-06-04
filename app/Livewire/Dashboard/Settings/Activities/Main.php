<?php

namespace App\Livewire\Dashboard\Settings\Activities;

use Livewire\Attributes;
use Livewire\Component;

class Main extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.settings.activities.main');
    }
}
