<?php

namespace App\Livewire\Dashboard\Documents\Upload;

use Livewire\Attributes;
use Livewire\Component;

class Signature extends Component
{
    // #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.documents.upload.signature');
    }
}
