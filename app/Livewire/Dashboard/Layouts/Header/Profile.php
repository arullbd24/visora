<?php

namespace App\Livewire\Dashboard\Layouts\Header;

use Livewire\Component;

class Profile extends Component
{
    // Dropdown Header
    public $isOpen = false;
    public function dropwdownStatus() {
        $this->isOpen = !$this->isOpen;
    }
    
    // Render View
    public function render()
    {
        return view('livewire.dashboard.layouts.header.profile');
    }
}
