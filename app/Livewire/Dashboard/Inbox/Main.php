<?php

namespace App\Livewire\Dashboard\Inbox;

use Livewire\Attributes;
use Livewire\Component;

class Main extends Component
{
    public $search = '';
    public $setFilterInbox;
    
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.inbox.main');
    }
    public function refreshList() {
        $filter = rand(1, 10);
        $this->dispatch('inbox-refresh', $filter);
    }
    
}
