<?php

namespace App\Livewire\Guest\Fitur;

use Livewire\Attributes;
use Livewire\Component;

class Signe extends Component
{
    #[Attributes\Layout('guest.layouts.main')]
    public function render()    {
        return view('livewire..guest.fitur.signe');
    }
}
