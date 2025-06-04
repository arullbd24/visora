<?php

namespace App\Livewire\Dashboard\Documents\Upload;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Documents\DocumentSigned;


class Finish extends Component
{
    public Finish $finish;
    public $sign_finish;
    public $signatureUrl;

    // public function mount(Finish $finish)
    // {
    //     $this->finish = $finish;
    // }

    public function finish()
    {
        // Ambil tanda tangan terakhir untuk user saat ini
        $signaturePath = 'signatures/' . Auth::id() . '.png'; // Contoh path

        // Periksa apakah file ada
        if (Storage::disk('temp')->exists($signaturePath)) {
            $signatureUrl = Storage::url($signaturePath);
        } else {
            $signatureUrl = null;
        }

    }
    public function download($id)
    {
        $pdf = DocumentSigned::findOrFail($id);
        return response()->download(storage_path('app/public/' . $pdf->file_path));
        // return Storage::disk('temp')->download('temp.pdf');
        // return response()->download( 
        //     // $this->finish->file_path, '.pdf'
        // );
    }

    public function mount()
    {
        // Ambil URL tanda tangan dari sesi atau lokasi penyimpanan
        $signaturePath = session('signaturePath'); // Path tanda tangan yang disimpan sebelumnya

        if ($signaturePath && Storage::exists($signaturePath)) {
            $this->signatureUrl = Storage::url($signaturePath);
        } else {
            $this->signatureUrl = null; // Jika tidak ada tanda tangan
        }
    }
    public function render()
    {
        return view('livewire.dashboard.documents.upload.finish', [
            'signatureUrl' => $this->signatureUrl
        ]);
    }
}
