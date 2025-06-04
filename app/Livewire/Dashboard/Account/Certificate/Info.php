<?php

namespace App\Livewire\Dashboard\Account\Certificate;

use Livewire\Attributes;
use Livewire\Component;

class Info extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.account.certificate.info');
    }
}
