<?php

namespace App\Livewire\Dashboard\Inbox\Data;

use Livewire\Attributes\On;
use Livewire\Component;

class MainInbox extends Component
{
    public $randInbox = 10;
    public function placeholder() {
        return view('livewire.dashboard.inbox.data.placeholder');
    }
    
    #[On('inbox-refresh')]
    public function updateRandInbox($filter = null) {
        $this->randInbox = $filter == null ? rand(1, 10): $filter;
    }
    
    public function render()
    {
        return view('livewire.dashboard.inbox.data.main-inbox');
    }
}
