<?php

namespace App\Livewire\Auth;


use Livewire\Attributes;

use Livewire\Component;

class EmailConfirm extends Component
{

    #[Attributes\Layout('auth.layouts.main')]

    public function render()
    {
        return view('livewire.auth.email-confirm');
    }
}
