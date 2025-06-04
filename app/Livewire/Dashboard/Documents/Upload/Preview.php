<?php

namespace App\Livewire\Dashboard\Documents\Upload;

use Livewire\Component;
use App\Models\Documents\Document;
use Illuminate\Support\Facades\Storage;


class Preview extends Component
{
    public $id_document;
    // public $documentUrl;
    public function getDocument($id_document) {
        // Cari dokumen berdasarkan ID
        $document = Document::where('id_document' , $id_document)->first();

        if (!$document) {
            return response()->json(['error' => 'Document not found'], 404);
        }

        // Pastikan file benar-benar ada di storage
        if (!Storage::exists($document->file_path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Kembalikan URL file
        return response()->json([
            'url' => Storage::url($document->file_path)
        ]);
    }
    public function render()
    {
        return view('livewire.dashboard.documents.upload.sign');
    }
}
