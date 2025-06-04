<?php

namespace App\Livewire\Dashboard\Documents\Data;

use Livewire\Component;

class Pending extends Component
{
    public function placeholder() {
        return view('livewire.dashboard.documents.placeholder.list');
    }
    public function render()
    {
        return view('livewire.dashboard.documents.data.pending');
    }
}
