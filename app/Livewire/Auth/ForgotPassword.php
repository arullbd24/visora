<?php

namespace App\Livewire\Auth;

use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use League\CommonMark\Extension\CommonMark\Parser\Inline\BacktickParser;
use Livewire\Attributes;
use Livewire\Component;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;


class ForgotPassword extends Component
{
    public function bebas(){
        $otp = random_int(100000, 999999);
        $otpHash = bcrypt($otp);
        $token = bin2hex(random_bytes(16));

        $credential = (object) array(
            'email' => 'noctis@gmail.com',
            'id_user' => Uuid::uuid4(),
            'password_old' => '',
            'timestamp' => Carbon::now(),
            'token' => $token,
        );

        // $sha256Hash = hash('sha256', json_encode($credential));
        // $sha512Hash = hash('sha512', json_encode($credential));
        // Backrypted();
        encrypt($credential, $otp);

        // FacadesHash::make('password')
        $encryptData = encrypt($credential);
        
        $token = (object) array(
            'timestamp' => Carbon::now (),
            'id' => Uuid::uuid4(),
            'email' => '123@gmail.com',
            
        );
            dump(
            $token,
            $credential,
            $encryptData,
            decrypt($encryptData),
            // $sha256Hash,
            // $sha512Hash
        );


    }
    
    #[Attributes\Layout('auth.layouts.main')]
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}