<?php

namespace App\Livewire\Dashboard\Settings\Initials\Data;

use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Library\Helper as LibHelper;

use App\Models\Initial\initial;
use App\Models\Initial\initialDisk;

class Initials extends Component
{
    public $default_initial;
    // public $list_signature = [];
    public $list_initial;
    
    public function mount() {
        $id_user = Auth::user()->id_user;
        if (initial::where('id_user', '=', $id_user)->exists()) {
            $this->default_initial = initial::where('id_user', '=', $id_user)->where('default', '=', true)->first();
            // $this->list_signature = array_merge($this->list_signature, Signature::where('id_user', '=', $id_user)->whereNot('id_signature', '=', $this->default_signature->id_signature)->orderByDesc('updated_at')->paginate(10)->items());
            // $this->list_signature = Signature::where('id_user', '=', $id_user)->whereNot('id_signature', '=', $this->default_signature->id_signature)->orderByDesc('updated_at')->paginate(10)->items();
            $this->list_initial = initial::where('id_user', '=', $id_user)->whereNot('id_initial', '=', $this->default_initial->id_initial)->paginate(10)->items();
        }
    }
    
    public function placeholder() {
        return view('livewire.dashboard.settings.initials.data.placeholder');
    }
    
    public function render()
    {
        return view('livewire.dashboard.settings.initials.data.initials');
    }
    
    public function setDefaultInitials($id_initial) {
        if (initial::where('id_initial', '=', $id_initial)->exists()) {
            initial::where('id_user', '=', Auth::user()->id_user)->update([
                'default' => false
            ]);
            
            initial::where('id_initial', '=', $id_initial)->update([
                'default' => true
            ]);
        }
        
        $this->mount();
    }
    
    public function deleteInitial($id_initial) {
        if (initial::where('id_initial', '=', $id_initial)->exists()) {
            $strg = initialDisk::where('id_initial', '=', $id_initial)->first();
            Storage::disk($strg->disk)->delete($strg->path . $strg->file_name);
            initial::where('id_initial', '=', $id_initial)->delete();
        }
        $this->mount();
    }
}
