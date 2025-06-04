<?php

namespace App\Livewire\Dashboard\ContextMenu\Detail\Documents;

use Livewire\Attributes;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Library\Helper as LibHelper; 
use App\Library\ChunkHelper; 
use App\Library\Documents\DocsHelper; 
use App\Library\FileHelper; 

use App\Models\Documents;
use Illuminate\Support\Facades\Auth;
use Pion\Laravel\ChunkUpload\Handler\ResumableJSUploadHandler;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class UploadDocument extends Component
{
    use WithFileUploads;
    
    // public var
    public $fileUpload;
    
    // private var
    private $file_client_name;
    private $file_name;
    private $log_chunk_data = [];
    
    public function updatedFileUpload() {
        $this->validate([
            'fileUpload' => 'required|file|mimes:pdf|max:204800'
        ]);
        
        // dd(
        //     $this->fileUpload,
        //     $this->fileUpload->getClientOriginalName(),
        //     $this->fileUpload->getClientOriginalExtension()
        // );
        
        // DocsHelper::uploadFile($this->fileUpload);
    }
    
    public function uploadChunkFile(Request $request) {
        // "resumableChunkNumber"
        // "resumableChunkSize"
        // "resumableCurrentChunkSize"
        // "resumableTotalSize"
        // "resumableType"
        // "resumableIdentifier"
        // "resumableFilename"
        // "resumableRelativePath"
        // "resumableTotalChunks"
        // "key_chunk"
        
        if (!isset($request->key_chunk)) {
            return response()->json(['error'=> 'key chunk not found']);
        }
        
        $resumeableFields = collect($request->all())->filter(function($value, $key) {
            return str_starts_with($key, 'resumable');
        });
                
        $maxFileSize = 52428800;
        $acceptType = ['application/pdf'];
        
        if (isset($request->resumableType)) {
            $fileType = $request->resumableType;
            if (!in_array($fileType, $acceptType)) {
                return response()->json(['error' => 'The uploaded file must be a PDF.'], 400);
            }
        }
        
        if (isset($request->resumableTotalSize)) {
            $totalSize = $request->resumableTotalSize;
            if ($totalSize >  $maxFileSize) {
                return response()->json(['error' => 'File size exceeds the maximum allowed size of 50MB.'], 400);
            }
        }
        
        $reqKeyChunk = $request->key_chunk;
        $setChunkUploadSession = ChunkHelper::setSessionChunkLog($resumeableFields->toArray(), $reqKeyChunk);
        
        
        Log::channel('upload_chunk')->info('Upload new chunk', ['chunk' => $request->input('resumableChunkNumber') . '/' . $request->input('resumableTotalChunks') , 'request' => $request->all() ]);
        $receiver = new FileReceiver($request->file, $request, ResumableJSUploadHandler::class);
        // dump([
        //     'receiver receive' => $receiver->receive(),
        //     // 'receiver isFinished' => $receiver->receive()->isFinished()
        // ]);
        if ($setChunkUploadSession) {
            return response()->json(['error' => (object) $setChunkUploadSession]);
        }
        
        $save = $receiver->receive();
        if ($save->isFinished()) {
            $file = $save->getFile();
            $dataChunkLog = ChunkHelper::getSessionChunkLog($reqKeyChunk);
            ChunkHelper::forgetSessionChunkLog($reqKeyChunk);
            if(empty($dataChunkLog)) {
                return response()->json(['warning' => 'chunk log ....']);
            }
            
            $clientRequest = (object) array(
                "chunkSize" => $request->resumableChunkSize,
                "totalSize" => $request->resumableTotalSize,
                "type" => $request->resumableType,
                "identifier" => $request->resumableIdentifier,
                "filename" => $request->resumableFilename,
                "relativePath" => $request->resumableRelativePath,
                "totalChunks" => $request->resumableTotalChunks,
                "key_chunk" => $request->key_chunk,
            );
            
            // dump(
            //     $file->getClientOriginalName(),
            //     $file->getClientMimeType(),
            //     $file->getClientOriginalExtension(),
            //     $file->getClientOriginalPath(),
            //     $file->getATime(),
            //     $newFilename,
            // );
            
            // DocsHelper::saveFile($file);
            $responseNewDocument = DocsHelper::newDocument($file, $clientRequest);
            // dump(DocsHelper::checkDuplicateClientName());
        }
        // $handler = $save->handler();
        // return response()->json(['progress' => $handler->getPercentageDone()]);
    }
    
    private function setFileName(Request $request) {
        if (isset($request->resumableFilename)) {
            $this->file_client_name = $request->resumableFilename;
        }
        if (isset($request->resumableFilename)) {
            $this->file_name;
        }
    }
    public function render()
    {
        return view('livewire.dashboard.context-menu.detail.documents.upload-document');
    }
}
