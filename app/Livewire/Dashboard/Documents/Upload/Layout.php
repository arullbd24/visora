<?php

namespace App\Livewire\Dashboard\Documents\Upload;

use Livewire\Attributes;
use Livewire\Component;

class Layout extends Component
{
    #[Attributes\Layout('dashboard.layouts.main')]
    
    public $stepUpload = 1;
    
    public function render()
    {
        return view('livewire.dashboard.documents.upload.layout');
    }
    
    public function mainUpload() {
        $this->stepUpload = 1;
        $this->dispatch('updateUrl', updateUrl: route('documents.upload\main'));
        // return redirect()->route('documents.upload\main');
    }
    #[Attributes\On('signature-document')]
    public function placeSign() {
        $this->stepUpload = 2;
        $this->dispatch('updateUrl', updateUrl: route('documents.upload\sign'));
        // return redirect()->route('documents.upload\sign');
    }
    public function finish() {
        $this->stepUpload = 3;
        $this->dispatch('updateUrl', updateUrl: route('documents.upload\finish'));
        // return redirect()->route('documents.upload\finish');
    }
}
