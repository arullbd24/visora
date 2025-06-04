<?php

namespace App\Livewire\Set;

use Livewire\Component;
use Livewire\Attributes;
use Illuminate\Support\Facades\Session;

class SetTimezone extends Component
{
    #[Attributes\On('setTimeZone')]
    public function setTimezone($timezone) {
        Session::put('timezone', $timezone);
    }
    public function render()
    {
        return view('livewire.set.set-timezone');
    }
}
