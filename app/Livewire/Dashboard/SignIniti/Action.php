<?php

namespace App\Livewire\Dashboard\SignIniti;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\Attributes;

use App\Library\Helper as LibHelper;
use App\Library\FileHelper;
use App\Library\Documents\DocsHelper;
use App\Library\TokenHelper;

use App\Models\User\UserPersonal;
use App\Models\Profile\UserProfile;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Action extends Component
{
    public $dataMount;
    #[Attributes\On('actionGenerateQrCode')]
    public function actionGenerateQrCode() {
        dump('Hello world');
    }
    
    public function mount() {
        
    }
    
    public function render() {
        return view('livewire.dashboard.sign-initi.action');
    }
}
