<?php

namespace App\Livewire\Dashboard\Documents;

use Livewire\Attributes;
use Livewire\Component;

class MainCopy extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.documents.main');
    }
}
