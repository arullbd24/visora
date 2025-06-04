<?php
namespace App\Livewire\Dashboard\Account;

use Livewire\Component;
use Livewire\Attributes;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Info extends Component
{
    use WithFileUploads; // Enables file upload functionality

    public $photo; // To hold the uploaded photo

    // Function to save the uploaded photo
   
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        return view('livewire.dashboard.account.info');
    }
}
