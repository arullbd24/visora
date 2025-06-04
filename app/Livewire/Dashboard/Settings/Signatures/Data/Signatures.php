<?php

namespace App\Livewire\Dashboard\Settings\Signatures\Data;

use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Library\Helper as LibHelper;

use App\Models\Signature\Signature;
use App\Models\Signature\SignatureDisk;

class Signatures extends Component
{
    public $default_signature;
    // public $list_signature = [];
    public $list_signature;
    
    public function mount() {
        $id_user = Auth::user()->id_user;
        if (Signature::where('id_user', '=', $id_user)->exists()) {
            $this->default_signature = Signature::where('id_user', '=', $id_user)->where('default', '=', true)->first();
            // $this->list_signature = array_merge($this->list_signature, Signature::where('id_user', '=', $id_user)->whereNot('id_signature', '=', $this->default_signature->id_signature)->orderByDesc('updated_at')->paginate(10)->items());
            // $this->list_signature = Signature::where('id_user', '=', $id_user)->whereNot('id_signature', '=', $this->default_signature->id_signature)->orderByDesc('updated_at')->paginate(10)->items();
            $this->list_signature = Signature::where('id_user', '=', $id_user)->whereNot('id_signature', '=', $this->default_signature->id_signature)->paginate(10)->items();
        }
    }
    
    public function placeholder() {
        return view('livewire.dashboard.settings.signatures.data.placeholder');
    }
    
    public function render()
    {
        return view('livewire.dashboard.settings.signatures.data.signatures');
    }
    
    public function setDefaultSignature($id_signature) {
        if (Signature::where('id_signature', '=', $id_signature)->exists()) {
            Signature::where('id_user', '=', Auth::user()->id_user)->update([
                'default' => false
            ]);
            
            Signature::where('id_signature', '=', $id_signature)->update([
                'default' => true
            ]);
        }
        
        $this->mount();
    }
    
    public function deleteSignature($id_signature) {
        if (Signature::where('id_signature', '=', $id_signature)->exists()) {
            $strg = SignatureDisk::where('id_signature', '=', $id_signature)->first();
            Storage::disk($strg->disk)->delete($strg->path . $strg->file_name);
            Signature::where('id_signature', '=', $id_signature)->delete();
        }
        $this->mount();
    }
}
