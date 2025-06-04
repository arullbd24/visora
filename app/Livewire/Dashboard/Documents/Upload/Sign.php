<?php

namespace App\Livewire\Dashboard\Documents\Upload;

use Livewire\Attributes;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Profile\UserProfile;
use App\Models\User\UserPersonal;
use App\Models\Documents\Document_QR;
use App\Library\Helper as LibHelper;
use Carbon\Carbon;

class Sign extends Component
{
    public $filename;
    public $temporaryUrl;
    public $qrCodeBase64;
    public $payloadData;
    public $user_profile;
    public $selectedEmployment;
    public $isDoneButtonEnabled = false;
    public $signaturePreview = null;

    #[Attributes\On('signature-document')]
    public function signatureDocument($payload) {
        dd($payload);
        $this->payloadData = $payload;
        $this->filename = $payload['filename'];
        $this->temporaryUrl = $payload['temporaryUrl'];

    }
    // // Generate QR Code with updated data
    // $this->generateQrCode();

    #[Attributes\On('generateQrCode')]
    public function generateQrCode()
    {
        // $id_signature = Uuid::uuid4();
        // $user_personal = Auth::user()->fullname;
        $id_user = Auth::user()->id_user;
        $employment = UserProfile::where('id_user', $id_user)->first();
        $user_personal = UserPersonal::where('id_user', $id_user)->first();
        $fullname = $user_personal ? $user_personal->fullname : NULL;
        // $employment = $user_profile ? $user_profile->employment : NULL;
        $employment = $this->selectedEmployment ?? 'Unknown';
        // $employment = $user_profile->pluck('employment');

        // if ($user_profile->isEmpty()) {
        //     $employment = NULL; // or handle the case as needed
        // } else {
        //     $employment = $user_profile->pluck('employment');
        // }
    
        // if ($employment === 'Unknown') {
        //     // Jika employment belum dipilih, tampilkan pesan error atau cegah proses
        //     return;
        // }
        // $data = json_encode([
        //     'filename' => $this->filename,
        //     'temporaryUrl' => $this->temporaryUrl,
        // ]);
        
        // $this->qrCodeBase64 = base64_encode(QrCode::format('png')->size(200)->generate($data));
        $tempUrl = Str::random(8) . '&now=' . now()->timestamp;
        $sha256Url = hash('sha256', $tempUrl);
        // $hostUrl = (request()->secure() ? 'https' : 'http') . '://' . request()->getHost() . (request()->getPort() ? ':' . request()->getPort() : '');
        // $urlQr = LibHelper::$hostUrl .  $sha256Url;
        
        
        
        $qr_identifier = LibHelper::generateUniqueString();
        $urlQr = LibHelper::initializeHostUrl() .  $qr_identifier;
        
        $qrCodeFormat = QrCode::format('svg')->size(200)->generate($urlQr);
        $this->qrCodeBase64 = base64_encode($qrCodeFormat);
        
        $id_qr = LibHelper::generateUniqueUuId();
        $id_document = LibHelper::generateUniqueUuId();
        $id_signature = LibHelper::generateUniqueUuId();
        $document_title = Str::random(6) . " " . Str::random(8);
        $nowTimestamps = Carbon::now()->format('d-m-Y h:i:s');
        
        
        $documentQrData = array(
            'qrCode' => $this->qrCodeBase64,
            'id_user' => Auth::user()->userPersonal->fullname,
            'employment' => $employment,
            'id_signature' => $id_signature,
            'document_title' => $document_title,
            'credential_docs' => hash('sha256', $id_document . "&tl=" . $document_title . "&idUsr=" . Auth::user()->id_user),
            'timestamps' => $nowTimestamps
        );
        $jsonData = json_encode($documentQrData);
        $cryptJsonData = Crypt::encrypt($jsonData);
        
         
        $data = array(
            "id_qr" => $id_qr,
            "qr_identifier" => $qr_identifier,
            "data_qr" => $cryptJsonData,
            "id_document" => $id_document,
        );
        
        // Storage::disk('temp')->put('/qrcode/png/' . Str::random() . ".png", base64_decode($this->qrCodeBase64));
        
        Log::channel('qrCode')->info('QR Code created: ', ['data' => $data, 'user_id' => Auth::user()->id_user]);
        // logger()->info('QR Code generated with data: ' . $jsonData);
        

        $responseDispatch = [
            'qrCode' => $this->qrCodeBase64,
            'fullname' => $fullname,
            'employment' => $employment,
            // 'jsonData' => $jsonData,
            // 'encryptJson' => $cryptJsonData,
            // 'decryptJson' => Crypt::decrypt($cryptJsonData),
            // 'url_hash_256' => hash('sha256', $tempUrl),
            // // 'url_base_36' => base_convert($tempUrl, 10, 36),
            // // 'url_cryptString' => Crypt::encryptString($tempUrl),
            'urlQr' => $urlQr,
            'qrData' => $documentQrData,
            'cryptQrData' => $cryptJsonData,
            'datatable' => $data,
            'timestamps' => $nowTimestamps
        ];
        // return response()->json(['qrCodeBase64' => $jsonData]);
        
        // dd($this->qrCodeBase64, $jsonData);
        
        $this->dispatch('qrCodeGenerated', $responseDispatch);

        // Aktifkan tombol Done setelah proses selesai
        $this->isDoneButtonEnabled = true;
        // $this->emit('qrCodeGenerated', $this->qrCodeBase64);
    }

    // public function saveDone()
    // {
    //     if (!$this->isDoneButtonEnabled) {
    //         return; // Jangan lakukan apa-apa jika tombol belum aktif
    //     }

    //     $signatureData = $this->signaturePreview; // Base64 atau data URL

    //     if (str_starts_with($signatureData, 'data:image')) {
    //         // Decode base64
    //         $fileContent = explode(',', $signatureData)[1];
    //         $decodedContent = base64_decode($fileContent);
    
    //         // Simpan file ke local storage
    //         $fileName = 'pdfsignature/' . uniqid() . '.png';
    //         Storage::disk('temp')->put($fileName, $decodedContent);
    
    //         // Simpan URL lokal
    //         $this->signaturePreview = Storage::url($fileName);
    //     }
        
    //     session()->flash('message', 'Signature saved successfully!');
    //     // Redirect ke halaman finish
    //     // return redirect()->route('finish');
    //     // Logika untuk menyimpan tanda tangan
    // }

    public function updateSelectedEmployment($employment)
    {
        // Menangani perubahan pada selectedEmployment
        // Misalnya, generate QR Code atau update data lain
        $this->generateQrCode(); // Misalnya, jika Anda ingin memperbarui QR Code
    }

    // #[Attributes\On('setEmployment')]
    //     public function setEmployment($employment) {
    //         $this->user_profile->employment = $employment;
    //     }

    // #[Attributes\Layout('dashboard.layouts.main')] /
    public function render()
    {
        $temporaryUrl = session()->get('uploadedFileUrl');
        // return view('livewire.dashboard.documents.upload.sign', compact('fileName'));
        $user_profiles = Auth::user()->userProfile;
        return view('livewire.dashboard.documents.upload.sign', [
            'user_profiles' => $user_profiles,
            'uploadedFileUrl' =>  $temporaryUrl,
        ]);
    }
}
