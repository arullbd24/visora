<?php

namespace App\Livewire\Testing\Scanner;

use Livewire\Attributes;
use Livewire\Component;

class ScanQR extends Component
{
    public $qrCodeResult = '';

    protected $listeners = [
        'qrCodeScanned' => 'handleQrCodeScanned'
    ];

    public function handleQrCodeScanned($data)
    {
        $this->qrCodeResult = $data;
        // Tambahkan logika tambahan di sini, misalnya simpan ke database atau validasi
    }
    #[Attributes\Layout('scanner.layouts.main')]
    public function render()
    {
        return view('livewire.testing.scanner.scan-q-r');
    }
}
