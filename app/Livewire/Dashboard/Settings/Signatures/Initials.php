<?php

namespace App\Livewire\Dashboard\Settings\Signatures;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Library\Helper as LibHelper;
use App\Models\Initial\initial;
use App\Models\Initial\initialDisk;
use Livewire\WithFileUploads;
use App\Models\User;

class Initials extends Component
{
    use WithFileUploads;

    public $draw_data;
    public $file_initials;
    private $diskStorage = 'media';


    public function storeDraw($dataStore){
        $this->draw_data = $dataStore['draw_data_input'];
        $file_name = $this->saveSignature($this->draw_data);

         //menyimpan ke database
         $new_id_initial = LibHelper::generateUniqueUuId('v4', 'id_initial', initial::class);
         $new_unique_key = LibHelper::generateUniqueString(12, 'unique_key', initial::class);
         $isDefault = initial::where('id_user', '=', Auth::user()->id_user)->count();
         initial::create([
             'id_initial' => $new_id_initial,
             'id_user' => Auth::user()->id_user,
             'title_initial' => null,
             'unique_key' => $new_unique_key,
             'default' => ($isDefault > 0) ? false : true,
         ]);

         $idUser = Auth::user()->id_user;
         $new_id_initial_disk = LibHelper::generateUniqueUuId('v4', 'id_initial_disk', initialDisk::class);
         initialDisk::create([
             'id_initial_disk' => $new_id_initial_disk,
             'id_initial' => $new_id_initial,
             'disk' => $this->diskStorage,
             'path' => "initial/{$idUser}/",
             'file_name' => $file_name,
         ]);

         //menyimpan ke database
        //  $initials = new initial();
        //  $initials->id_initial = Str::uuid();
        //  $initials->id_user = Auth::user()->id_user; 
        //  $initials->file_name_initial = $file_name; 
        //  $initials->unique_key = Str::random(10);
         // $signature->title_signature = $request->title_signature;
         // $signature->file_name_signature = $this->saveSignature($request->draw_data);
 
        //  $initials->save();
 
         // return redirect()->back()->with('success', 'Signature created successfully.');
         session()->flash('success', 'Initial created successfully.');
         return redirect()->back();
    }

    public function storeFileUpload(){
        $this->validate([
            'file_initials' => 'required|file|mimes:png,jpeg,jpg|max:2048',
        ]);

        // $file_name = time() . '_' . $this->file_initials->getClientOriginalName();
        // $this->file_initials->storeAs('initials', $file_name, 'public');
        $file_name = $this->saveSignature(null, $this->file_initials);

        $new_id_initial = LibHelper::generateUniqueUuId('v4', 'id_initial', initial::class);
        $new_unique_key = LibHelper::generateUniqueString(12, 'unique_key', initial::class);
        $isDefault = initial::where('id_user', Auth::user()->id_user)->count() === 0;
        
        // Simpan data ke tabel initial
        $initial = initial::create([
            'id_initial' => $new_id_initial,
            'id_user' => Auth::user()->id_user,
            'title_initial' => null,
            'unique_key' => $new_unique_key,
            'default' => $isDefault,
        ]);

        // Simpan data ke tabel initialDisk
        $new_id_initial_disk = LibHelper::generateUniqueUuId('v4', 'id_initial_disk', initialDisk::class);
        initialDisk::create([
            'id_initial_disk' => $new_id_initial_disk,
            'id_initial' => $initial->id_initial,
            'disk' => $this->diskStorage,
            'path' => "initial/" . Auth::user()->id_user . "/",
            'file_name' => $file_name,
        ]);
    //    $initials = new initial();
    //    $initials->id_initial = Str::uuid();
    //    $initials->id_user = Auth::user()->id_user;
    //    // $initials->title_signature = $request->title_signature;
    //    $initials->file_name = $file_name;
    //    $initials->unique_key = Str::random(10);

    //    $initials->save();

        // Reset properti setelah menyimpan file
       $this->file_initials = null;

       session()->flash('success', 'Initial uploaded successfully.');
       return redirect()->back();
    }

    private function saveSignature($draw_data = null, $file_initials = null)
    {
        // $folderPath = storage_path('app/public/initials'); // Path local storage
    
        // Jika data gambar base64 ada, simpan sebagai gambar yang digambar
        if ($draw_data) {
            $image_parts = explode(";base64,", $draw_data);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1]; // Dapatkan tipe gambar (png/jpg)
            $image_base64 = base64_decode($image_parts[1]); // Decode base64 ke binary
            $file_name = LibHelper::generateUniqueString(32, 'file_name', initialDisk::class) . ".$image_type";  // Buat nama file unik
            // $file_path = $folderPath . '/' . $file_name;
            $idUser = Auth::user()->id_user;
            $pathAs = "initial/{$idUser}/$file_name";
            Storage::disk($this->diskStorage)->put($pathAs, $image_base64);
    
            // file_put_contents($file_path, $image_base64); // Simpan file ke local storage
        } 
        // Jika ada file yang diunggah, simpan sebagai file upload
        elseif ($file_initials) {
            // $file_name = uniqid() . '.' . $file_initials->getClientOriginalExtension(); // Nama unik file
            $extension = $file_initials->getClientOriginalExtension(); // Mendapatkan ekstensi file asli
            $file_name = LibHelper::generateUniqueString(32, 'file_name', initialDisk::class). ".$extension"; // Nama unik file
            $idUser = Auth::user()->id_user;
            $file_initials->storeAs("initial/{$idUser}", $file_name, $this->diskStorage); // Simpan file di storage
            // $file_initials->storeAs('initials', $file_name, 'public'); // Simpan file di local storage

        } else {
            throw new \Exception('Tidak ada data untuk disimpan');
        }
    
        return $file_name; // Kembalikan nama file untuk disimpan di database
    }

    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.settings.signatures.initials');
    }
}
