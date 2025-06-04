<?php

namespace App\Livewire\Dashboard\Settings\Signatures\Set;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Signatures extends Form
{
    #[Validate('required')]
    public $id_signature = '';
    // public function render()
    // {
    //     return view('livewire.dashboard.settings.signatures.set.signatures');
    // }
}
