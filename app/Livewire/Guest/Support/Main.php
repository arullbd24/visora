<?php

namespace App\Livewire\Guest\Support;

use Livewire\Attributes;
use Livewire\Component;

class Main extends Component
{
    #[Attributes\Layout('guest.layouts.main')]
    public function render()
    {
        return view('livewire.guest.support.main');
    }
}
