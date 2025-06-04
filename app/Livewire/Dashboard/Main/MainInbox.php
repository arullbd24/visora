<?php

namespace App\Livewire\Dashboard\Main;

use Livewire\Component;

class MainInbox extends Component
{
    public $listInboxComing = [];
    
    public function mount() {
        $randomName = ['Rijal', 'Sahrul', 'Nanda', 'Fajar'];
        for($i = 0; $i < 10; $i++) {
            $this->listInboxComing[] = (object) array(
                'fromInbox' => $randomName[rand(0, count($randomName) - 1)],
                'labelInbox' => 'Label inbox',
                'contentInbox' => 'Ini konten inbox'
            );
        }
    }
    
    public function render()
    {
        return view('livewire.dashboard.main.main-inbox');
    }
}
