<?php

namespace App\Livewire\Dashboard\Documents\Data;

use Livewire\Component;
use Livewire\Attributes;

use Illuminate\Support\Facades\Auth;

use Livewire\WithPagination;

use App\Library\Documents\DocsHelper;

class Approved extends Component
{
    use WithPagination;
    #[Attributes\Url(as: 's')]
    public $search = null;
    
    public $isDispatched = false;
    public $totalData;
    private $paginate = 20;
    
    // public function
    public function loadDocument($paginate = 5, $search = '') {
        $id_user = Auth::user()->id_user;
        $list_document = DocsHelper::getDocumentFile('latest', $id_user, null, $search, 'Approved')->paginate($paginate);
        
        if($this->totalData != $list_document->total()) {
            $this->totalData = $list_document->total();
            $this->paginateData($list_document);
        }
        
        return $list_document;
    }
    
    public function paginateData($paginated) {
        $paginateData = [
            'perPage' => $paginated->perPage(),
            'currentPage' => $paginated->currentPage(),
            'total' => $paginated->total(),
            'lastPage' => $paginated->lastPage(),
        ];
        $this->dispatch('paginateData', $paginateData);  // Dispatch hanya jika belum dilakukan
        $this->isDispatched = true;  // Tandai dispatch sudah dilakukan
    }
    
    
    // listen dispatch
    #[Attributes\On('gotopage')]
    public function goToPage($page) {
        $this->setPage($page);
    }
    
    #[Attributes\On('searchDocument')]
    public function searchDocument($data)
    {
        try {
            // Memeriksa apakah data yang dikirim sudah sesuai
            $query = isset($data['query']) ? $data['query'] : null;
            $csrfToken = isset($data['_token']) ? $data['_token'] : null;
            
            // Verifikasi parameter
            if (!$csrfToken || $csrfToken !== csrf_token()) {
                throw new \Exception('Invalid CSRF token.');
            }
            
            $this->search = $query;
        } catch (\Exception $e) {
            dump('Error with parameters: ' . $e->getMessage());
        }
        
        $this->resetPage();
    }
    
    
    // render
    public function placeholder() {
        return view('livewire.dashboard.documents.placeholder.list', [
            'paginate' => $this->paginate
        ]);
    }
    public function render()
    {
        $list_document = $this->loadDocument($this->paginate, $this->search);
        
        return view('livewire.dashboard.documents.data.approved', [
            'list_document_paginate' => $list_document,
        ]);
    }
}
