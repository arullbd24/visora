<?php

namespace App\Livewire\Dashboard\SignIniti\Place;

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

class Signature extends Component
{
    public $id_document, $type_sign, $token, $fileDisk_data, $authorDocument;
    public $key_qr;
    public $qrCodeBase64;
    private $returnView = "livewire.dashboard.sign-initi.place.signature";
    
    #[Attributes\On('generateSignQrCode')]
    public function generateSignQrCode() {
        dump('Hello world');
    }
    
    
    public function mount($token) {
        try {
            $responseDataToken = TokenHelper::getTokenDataSignatureInitial($token, Auth::user()->id_user);
            // if (!$responseDataToken->status) {
            //     $this->returnView = "livewire.dashboard.sign-initi.errors.not-found";
            // }
            
            $this->id_document = $responseDataToken->data->id_document;
            $this->type_sign = $responseDataToken->data->type_sign;
            $this->token = $token;
            
            $responseDocsHelper = DocsHelper::getDocumentFileById($responseDataToken->data->id_document);
            // if (!$responseDocsHelper->status) {
            //     throw new \Exception($responseDocsHelper->message);
            // }
            
            $this->fileDisk_data = $responseDocsHelper->data->file;
            $this->authorDocument = $responseDocsHelper->data->author;
            return;
        } catch (\Exception $e) {
            dump($e);
            Log::error('Mount Error: ' . $e->getMessage());
        }
    }
    
    #[Attributes\Layout('dashboard.layouts.main')]
    public function render()
    {
        // dump($this->responseTokenHelper);
        // dump($this->cryptData);
        // return view($this->returnView);
        return view("livewire.dashboard.sign-initi.place.signature");
    }
}
