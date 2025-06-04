<?php

namespace App\Livewire\Dashboard\Documents\Upload;

// use Livewire\Attributes;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

// use App\Models\Documents

use Ramsey\Uuid\Uuid;

class Main extends Component
{
    use WithFileUploads;
    // #[Attributes\Layout('livewire.dashboard.documents.upload.layout')]
    public $temporaryFile;
    public $temporaryUrl = '';
    public $filename = '';
    public $hostUrl = '';
    public $tempPath = '';
    public $fileContent = '';
    public $realpath = '';
    public $storagePath = '';
    public function updatedTemporaryFile() {
        
        if (!$this->temporaryFile || !$this->temporaryFile->isValid()) {
            dd('File upload gagal atau tidak valid.');
        }
        // dd('Upload File');
        // // Kamu bisa melakukan operasi di sini tanpa menyimpan file ke storage.
        // // File sudah di-cache oleh Livewire.
        // $fileContent = file_get_contents($this->temporaryFile->getRealPath());
        
        // // Lakukan apa pun yang dibutuhkan, misalnya membaca isi file.
        // // Contoh sederhana: baca nama file
        // $filename = $this->temporaryFile->getClientOriginalName();
        
        // Implementasi logic yang diinginkan
        // dd(file_exists($this->temporaryFile->getRealPath()), is_readable($this->temporaryFile->getRealPath()));
        $this->filename = $this->temporaryFile->getClientOriginalName();
        // $this->fileContent = file_get_contents($this->temporaryFile->getRealPath());
        $this->realpath = $this->temporaryFile->getRealPath();

        // Simpan file di disk 'test' (pastikan disk 'test' sudah dikonfigurasi)
        $storagePath = $this->temporaryFile->storeAs('/', $this->filename, 'test');

       // Dapatkan URL untuk file yang diunggah
        // $this->temporaryUrl = Storage::disk('test')->url($storagePath);
        $this->temporaryUrl = asset('test/' . basename($storagePath));

        // dd([
        //     'Filename' => $this->filename,
        //     'Temporary URL' => $this->temporaryUrl,
        //     'Storage Path' => $path,
        // ]);

        // dd([
        //     'temporaryFile' => $this->temporaryFile,
        //     'filename' => $this->filename,
        //     'storagePath' => $storagePath,
        //     'temporaryUrl' => $this->temporaryUrl,
        //     'expectedPath' => '/storage/test/',
        // ]);

         // Mendapatkan URL sementara dari Livewire
        // $this->temporaryUrl = $this->temporaryFile->temporaryUrl();
        // dd($this->temporaryFile);
         $hostUrl = (request()->secure() ? 'https' : 'http') . '://' . request()->getHost() . (request()->getPort() ? ':' . request()->getPort() : '');
        $tempPath = explode($hostUrl . '/storage/test/', $this->temporaryUrl);
        $stgPath = $tempPath[0];
        $tempPath = explode('?expires', $stgPath);
        $this->storagePath = $tempPath[0];
        // dd([
        //     'hostUrl' => $this->hostUrl,
        //     'Temporary URL' => $this->temporaryUrl,
        //     'expectedPath' => $this->hostUrl . '/storage/test',
        // ]);
        // $hostUrl = (request()->secure() ? 'https' : 'http') . '://' . request()->getHost() . (request()->getPort() ? ':' . request()->getPort() : '');
        // $tempPath = explode('/storage/test/', $this->temporaryUrl);
        // $hostUrl = (request()->secure() ? 'https' : 'http') . '://' . request()->getHost() . (request()->getPort() ? ':' . request()->getPort() : '');
        // $expectedPath = $hostUrl . '/storage/test/';
        // $tempPath = explode($expectedPath, $this->temporaryUrl);

        // if (isset($tempPath[1])) {
        //     $this->storagePath = $tempPath[1]; // Path relatif
        // } else {
        //     throw new \Exception('Invalid temporary URL or path.');
        // }
        

        // Simpan informasi file di session
        session()->put([
            'uploadedFileUrl' => $this->temporaryUrl,
            'filename' => $this->filename,
            'realpath' => $this->realpath,
            'storagepath' => $this->storagePath,
        ]);
       
        
        //                                        Bakal kepake
        // $id_documents = '';
        // $is_unique = false;
        // while (!$is_unique) {
        //     $id_documents = Uuid::uuid4();
        //     if (!$id_documents) {
        //         $is_unique = true;
        //     }
        // }
        
        
        // $this->temporaryFile->store('documents', 'temp');
        // dd($this->filename, $this->temporaryUrl);
        // Simpan nama file di session untuk diakses di halaman lain
        // session()->put('uploadedFileUrl', $this->temporaryUrl);
        // dd(session()->get('uploadedFileUrl'));
        // session()->put([
        //     'uploadedFileUrl' => $this->temporaryUrl,
        //     'filename' => $this->filename,
        //     'realpath' => $this->realpath,
        //     'storagepath' => $this->storagePath,
        // ]);

        // Log::info('Is file readable: ' . (is_readable($this->temporaryFile->getRealPath()) ? 'yes' : 'no'));
        // // Log::info('Temporary file path: ' . $this->temporaryFile->getRealPath());
        // $exists = Storage::disk('temp')->exists('livewire-tmp/' . $this->temporaryFile->getFilename());
        // Log::info('File exists in temp/livewire-tmp: ' . ($exists ? 'yes' : 'no'));

        // Kode untuk mengarahkan ke URL file yang diupload
        // $path = 'livewire-tmp/' . $this->temporaryFile->getFilename();
        // $url = Storage::disk('temp')->url($path);
        
        // // Lakukan redirect ke URL file yang telah diupload
        // return redirect($url); // Mengarahkan ke file yang baru saja diupload


    }

    // public function sign()
    // {
    //     // Logika untuk pindah ke halaman sign
    //     return redirect()->route('upload.sign');  // Pastikan route 'dashboard.sign' sudah didefinisikan
    // }
    
    public function render()
    {
        if (empty($this->temporaryFile)) {
            return view('livewire.dashboard.documents.upload.includes.first-upload');
        } else {
            return view('livewire.dashboard.documents.upload.includes.list-upload', [
                'temporaryUrl' => $this->temporaryUrl,
                'filename' => $this->filename,
                'storagepath' => $this->storagePath,
            ]);
        }
        // return view('livewire.dashboard.documents.upload.main');
    }
}
