<?php

namespace App\Livewire\Dashboard\Main;

use Livewire\Component;

class CardStatus extends Component
{
    public $dataCard;
    
    public function mount() {
        $this->dataCard = (object) array(
            'dataSignature' => rand(1, 100),
            'dataDocuments' => rand(1, 100),
        );
    }
    
    public function render()
    {
        return view('livewire.dashboard.main.card-status');
    }
    
    public function updateDataCard() {
        $this->dataCard->dataSignature = rand(1, 100);
        $this->dataCard->dataDocuments = rand(1, 100);
    }
}
