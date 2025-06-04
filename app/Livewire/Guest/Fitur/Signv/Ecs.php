<?php

namespace App\Livewire\Guest\Fitur\Signv;

use Livewire\Attributes;
use Livewire\Component;
class Ecs extends Component
{
    #[Attributes\Layout('guest.layouts.main')]
    public function render()
    {
        return view('livewire..guest.fitur.signv.ecs');
    }
}
