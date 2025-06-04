<?php

namespace App\Livewire\Dashboard\Settings\Signatures;

use Livewire\Attributes;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Http\Request; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Library\Helper as LibHelper;

// use App\Livewire\Dashboard\Settings\Signatures\Set\Signatures as SignatureForm;

use App\Models\Signature\Signature;
use App\Models\Signature\SignatureDisk;
use App\Models\User;

class Signatures extends Component
{
    use WithFileUploads;

    public $draw_data;
    public $file_signature;
    private $diskStorage = 'media';
    
    // #[Attributes\On('storeDraw')]
    
    public function storeDraw($dataStore)
    {
        // $request->validate([
        //     'draw_data' => 'required|string', // Data signature yang digambar
        //     // 'file_name_signature' => 'required',
             
        // ]);
        // dd($dataStore);
        $this->draw_data = $dataStore['draw_data_input'];
        $file_name = $this->saveSignature($this->draw_data);

        //menyimpan ke database
        $new_id_signature = LibHelper::generateUniqueUuId('v4', 'id_signature', Signature::class);
        $new_unique_key = LibHelper::generateUniqueString(12, 'unique_key', Signature::class);
        $isDefault = Signature::where('id_user', '=', Auth::user()->id_user)->count();
        Signature::create([
            'id_signature' => $new_id_signature,
            'id_user' => Auth::user()->id_user,
            'title_signature' => null,
            'unique_key' => $new_unique_key,
            'default' => ($isDefault > 0) ? false : true,
        ]);
        
        $idUser = Auth::user()->id_user;
        $new_id_signature_disk = LibHelper::generateUniqueUuId('v4', 'id_signature_disk', SignatureDisk::class);
        SignatureDisk::create([
            'id_signature_disk' => $new_id_signature_disk,
            'id_signature' => $new_id_signature,
            'disk' => $this->diskStorage,
            'path' => "signatures/{$idUser}/",
            'file_name' => $file_name,
        ]);

        session()->flash('success', 'Signature created successfully.');
        return redirect()->back();
    }
    
    // Simpan signature (Upload)
    public function storeUpload()
    {
        $this->validate([
           //  'title_signature' => 'required|string|max:255',
           'file_signature' => 'required|file|mimes:png,jpeg,jpg|max:2048',
           //  'file_name_signature' => 'required|file|mimes:png,jpeg,jpg|max:2048',
        ]);
        
        // dd($this->file_signature);

        //  $file = $this->file_signature;
        // $file = $request->file('file_signature');
        //  $file_name = time() . '_' . $file->getClientOriginalName();
        // $this->file_signature->store('signature', 'temp');
        // $file_name = time() . '_' . $this->file_signature->getClientOriginalName();
        // $this->file_signature->storeAs('signatures', $file_name, 'public');
        $file_name = $this->saveSignature(null, $this->file_signature);

        $new_id_signature = LibHelper::generateUniqueUuId('v4', 'id_signature', Signature::class);
        $new_unique_key = LibHelper::generateUniqueString(12, 'unique_key', Signature::class);
        $isDefault = Signature::where('id_user', Auth::user()->id_user)->count() === 0;
        
         // Simpan data ke tabel initial
         $signature = Signature::create([
            'id_signature' => $new_id_signature,
            'id_user' => Auth::user()->id_user,
            'title_signature' => null,
            'unique_key' => $new_unique_key,
            'default' => $isDefault,
        ]);

        // Simpan data ke tabel initialDisk
        $new_id_signature_disk = LibHelper::generateUniqueUuId('v4', 'id_signature_disk', SignatureDisk::class);
        SignatureDisk::create([
            'id_signature_disk' => $new_id_signature_disk,
            'id_signature' => $signature->id_signature,
            'disk' => $this->diskStorage,
            'path' => "signatures/" . Auth::user()->id_user . "/",
            'file_name' => $file_name,
        ]);

    //     $signature = new Signature();
    //     $signature->id_signature = Str::uuid();
    //     $signature->id_user = Auth::user()->id_user;
    //    //  $signature->title_signature = $request->title_signature;
    //     $signature->file_name_signature = $file_name;
    //     $signature->unique_key = Str::random(10);

    //     $signature->save();

        // Reset properti setelah menyimpan file
    //    $this->file_signature = null;

       //  return redirect()->back()->with('success', 'Signature uploaded successfully.');
       session()->flash('success', 'Signature uploaded successfully.');
       return redirect()->back();
       // session()->flash('success', 'Signature uploaded successfully.');
       // return response()->json(['message' => 'Signature uploaded successfully.']);
    }
    
    private function saveSignature($draw_data = null, $file_signature = null){
        // Jika data gambar base64 ada, simpan sebagai gambar yang digambar
        if ($draw_data) {
            $image_parts = explode(";base64,", $draw_data);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1]; // Dapatkan tipe gambar (png/jpg)
            $image_base64 = base64_decode($image_parts[1]); // Decode base64 ke binary
            // $file_name = uniqid();
            $file_name = LibHelper::generateUniqueString(32, 'file_name', SignatureDisk::class) . ".$image_type"; 
            // $file_name = Str::random(32); 
            // $file_name .= '.' . $image_type; // Buat nama file unik
            
            $idUser = Auth::user()->id_user;
            $pathAs = "signatures/{$idUser}/$file_name";
            
            Storage::disk($this->diskStorage)->put($pathAs, $image_base64);
            
            // $file_path = $folderPath . '/' . $file_name;
            // file_put_contents($file_path, $image_base64); // Simpan file ke local storage
        } 
        // Jika ada file yang diunggah, simpan sebagai file upload
        elseif ($file_signature) {
            // $file_name = uniqid() . '.' . $file_signature->getClientOriginalExtension(); // Nama unik file
            $extension = $file_signature->getClientOriginalExtension(); // Mendapatkan ekstensi file asli
            $file_name = LibHelper::generateUniqueString(32, 'file_name', SignatureDisk::class). ".$extension";
            $idUser = Auth::user()->id_user;
            $file_signature->storeAs("signatures/{$idUser}", $file_name, $this->diskStorage); // Simpan file di storage
            // $file_signature->storeAs('signatures', $file_name, 'public');
        } else {
            throw new \Exception('Tidak ada data untuk disimpan');
        }

        return $file_name;
    }
    
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.settings.signatures.signature');
    }
}
