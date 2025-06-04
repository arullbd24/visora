<?php

namespace App\Livewire\Dashboard\Documents;

use Livewire\Attributes;
use Livewire\Component;

class Approved extends Component
{
    public $perPage = 5;
    public $currentPage = 1;
    public $total;
    public $lastPage;
    public $firstItem = 1;
    public $lastItem;
    
    public $filter_data;
    
    
    // listener
    #[Attributes\On('paginateData')]
    public function paginateData($data) {
        $data = (object) $data;
        
        $this->perPage = $data->perPage;
        $this->currentPage = $data->currentPage;
        $this->total = $data->total;
        $this->lastPage = $data->lastPage;
        $this->calculateItem();
    }
    
    #[Attributes\On('gotoNextPage')]
    public function nextPage() {
        if ($this->currentPage > 0 && $this->currentPage < $this->lastPage) {
            $this->currentPage++;
            
            $this->dispatch('gotopage', $this->currentPage);
            $this->calculateItem();
            
            // $this->dispatch('gotopage', $this->currentPage+1);
        }
    }
    #[Attributes\On('gotoPreviousPage')]
    public function previousPage() {
        if ($this->currentPage > 1 && $this->currentPage <= $this->lastPage) {
            $this->currentPage--;
            
            $this->dispatch('gotopage', $this->currentPage);
            $this->calculateItem();
            
            // $this->dispatch('gotopage', $this->currentPage-1);
        }
    }
    
    
    // private function
    private function calculateItem() {
        $this->firstItem = ($this->perPage * ($this->currentPage - 1)) + 1;  // Pastikan mulai dari 1
        $this->lastItem = ($this->firstItem + $this->perPage - 1) < $this->total ? $this->firstItem + $this->perPage - 1 : $this->total;
    }
    
    
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.documents.approved');
    }
}
