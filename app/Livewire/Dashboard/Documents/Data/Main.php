<?php

namespace App\Livewire\Dashboard\Documents\Data;

use Livewire\Component;
use Livewire\Attributes;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

use App\Models\Documents;
use App\Models\Files as FilesMod;

use App\Library\Documents\DocsHelper;
use App\Library\FileHelper;
use App\Library\Helper as LibHelper;
use App\Library\TokenHelper;
use Flasher\SweetAlert\Prime\SweetAlertInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Main extends Component
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
        if ($search == "") {
            $list_document = DocsHelper::getDocumentFileV2('latest', $id_user, null)->paginate($paginate);
        } else {
            $list_document = DocsHelper::getDocumentSearchFile($id_user, $search)->paginate($paginate);
        }
        
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
    
    public function actionDocument($data) {
        try {
            $decryptData = Crypt::decrypt($data);
            
            if (!isset($decryptData->action)) {
                throw new \Exception('Invalid action');
            }
            if (!isset($decryptData->id_document)) {
                throw new \Exception('Id document not found');
            }
            if (!isset($decryptData->_token) || $decryptData->_token !== csrf_token()) {
                throw new \Exception('Invalid CSRF token.');
            }
            
            
            $paramAction = (object) array(
                'id_document' => $decryptData->id_document,
            );
            
            switch($decryptData->action) {
                case 'edit':
                    $this->editAction($paramAction);
                    break;
                // case 'delete':
                //     $this->deleteAction($paramAction);
                //     break;
                case 'download':
                    $this->downloadAction($paramAction);
                    break;
                case 'sign':
                    $this->signAction($paramAction);
                    break;
                default:
                    throw new \Exception('Invalid action');
            }
            
        } catch (\Exception $e) {
            toastr()
                ->closeButton(true)
                ->newestOnTop(true)
                ->timeOut(2500)
                ->error($e->getMessage());
        }
    }
    private function downloadAction($data) {
        $responseHelper = FileHelper::getFile($data->id_document);
        if (!$responseHelper->status) {
            toastr()
                ->closeButton(true)
                ->newestOnTop(true)
                ->timeOut(2500)
                ->error($responseHelper->helper);
            return;
        }
        
        $responseData = $responseHelper->data;
        $statusFile = FileHelper::checkFile($responseData->disk, $responseData->path, $responseData->file_name);
        if (!$statusFile) {
            toastr()
                ->closeButton(true)
                ->newestOnTop(true)
                ->timeOut(2500)
                ->error('File not found');
            return;
        }
        
        $filePath = $responseData->path . $responseData->file_name;
        $filePathFull = Storage::disk($responseData->disk)->path($filePath);
        $content = file_get_contents($filePathFull);
        $headers = array(
            // 'Content-Type' => $responseData->mime_type,
            'Content-Type' => mime_content_type($filePathFull),
        );
        
        // dump('download action', $responseHelper, $responseData, $statusFile, $filePathFull, $headers);
        
        // Storage::disk($responseData->disk)->download(
        //     $filePathFull,
        //     $responseData->file_client_name,
        //     [
        //         'Content-Type' => $responseData->mime_type,
        //     ]
        // );
        // return response()->download(
        //     $filePathFull,
        //     $responseData->file_client_name,
        //     // $headers
        // );
        // $testDownload = Storage::disk($responseData->disk)->download(
        //     $filePath
        // );
        
        // dump($testDownload);
        // return $testDownload;
        // dump([
        //     'path' => $filePathFull,
        //     // 'header' => $headers,
        //     // 'content' => $content
        // ]);
        return response($content)->withHeaders($headers);
        // return response()->download($strgDisk);
    }
    private function editAction($data) {
        toastr()->success('Your account has been re-verified.');
        // dump('edit action');
    }
    // private function deleteAction($data) {
    //     // $q = sweetalert()
    //     //     ->showCloseButton(true)
    //     //     ->showConfirmButton(true, 'Confirm', 'red')
    //     //     ->showCancelButton(true, 'Cancel', 'gray')
    //     //     ->title('Confirm')
    //     //     ->info('Confirm delete account');
        
    //     $message = '';
    //     $fileFind = Documents\DocumentDisk::where('id_document_disk', '=', $data->id_document_disk);
    //     if ($fileFind->exists()) {
    //         $message = "File " . $fileFind->value('client_name') . ' successfully deleted';
    //     } else {
    //         $message = "File not found";
    //     }
        
    //     toastr()
    //         ->closeButton(true)
    //         ->newestOnTop(true)
    //         ->timeOut(2500)
    //         ->title('Deleted File')
    //         ->info($message);
    //         // ->toastClass('bg-white')
    //         // ->progressClass('bg-green-600')
    //         // ->success('Delete action.');
    //     // dump('delete action');
    // }
    
    private function signAction($data) {
        $nowIdDocs = $data->id_document;
        $idUser = Auth::user()->id_user;
        try {
            
            $modDocument = Documents\Document::where('document.id_document', '=', $nowIdDocs);
            if (!$modDocument->exists()) {
                throw new \Exception('Document not found');
            }
            
            $modFileDisk = $modDocument->join('document_versions', 
                function($join) {
                    $dbRawString = "(SELECT MAX(version) FROM document_versions AS dv WHERE dv.id_document = document_versions.id_document)";
                    $join->on('document_versions.id_document', '=', 'document.id_document')
                        ->whereColumn('document_versions.version', '=', DB::raw($dbRawString));
                })
                ->join('file_disk_entity', 'file_disk_entity.id_file_disk_entity', '=', 'document_versions.id_file_disk_entity')
                ->join('file_disk', 'file_disk.id_file_disk', '=', 'file_disk_entity.id_file_disk')
                ->first([
                    'file_disk.*'
                ]);
            
                
            if(!FileHelper::checkFile($modFileDisk->disk, $modFileDisk->path, $modFileDisk->file_name) ) {
                throw new \Exception('File not found');
            }
            
            $dataCreateToken = (object) [
                'id_document' => $nowIdDocs,
                'id_user' => $idUser,
                'type_sign' => 'signature',
            ];
            
            $responseCreateTokenHelper = TokenHelper::createSignToken($dataCreateToken);
            
            if (!$responseCreateTokenHelper->status) {
                throw new \Exception($responseCreateTokenHelper->message);
            }
            
            
            $this->redirectRoute('place_sign.signature', ['token' => $responseCreateTokenHelper->data->token], true, true);
            // $this->redirectRoute('place_sign.signature', ['token' => $responseCreateTokenHelper->data->token]);
            
        } catch(\Exception $e) {
            toastr()
                ->closeButton(true)
                ->newestOnTop(true)
                ->timeOut(2500)
                ->error($e->getMessage());
        }
    }
    
    // render
    public function placeholder() {
        return view('livewire.dashboard.documents.placeholder.list', [
            'paginate' => $this->paginate
        ]);
    }
    public function render()
    {
        // $list_document = Documents\Document::where('id_user', '=', Auth::user()->id_user)->paginate(5);
        $list_document = $this->loadDocument($this->paginate, $this->search);
        return view('livewire.dashboard.documents.data.main', [
            'list_document_paginate' => $list_document,
        ]);
    }
}
