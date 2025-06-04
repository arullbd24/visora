<?php

namespace App\Livewire\Dashboard\Layouts\Header;

use Livewire\Component;

class Notification extends Component
{
    // Dropdown Header
    public $isOpen = false;
    public function dropwdownStatus() {
        $this->isOpen = !$this->isOpen;
    }
    
    // Load Notification
    public $notificationsData = [];
    public $loadedNotification = false;

    public function loadNotificationsHeader()
    {
        if ($this->loadedNotification) {
            return;
        }
        
        $titleNotif = ['You have a new message!', 'Your order has been shipped!'];
        for ($i = 0; $i < 5; $i++) {

            $tempNotif = (object) array(
                'imgProfile' => asset('components/icon/logo/logoD.svg'),
                'titleNotif' => array_rand($titleNotif),
                'message' => 'message notif'
            );

            $this->notificationsData[] = $tempNotif;
        }
        
        // Ambil notifikasi dari database atau API
        // $this->notificationsData = [
        //     ['message' => 'You have a new message!'],
        //     ['message' => 'Your order has been shipped!'],
        // ];

        $this->loadedNotification = true;
    }
    
    // Render View
    public function render()
    {
        return view('livewire.dashboard.layouts.header.notification');
    }
}
