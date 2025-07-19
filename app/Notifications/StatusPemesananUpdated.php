<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusPemesananUpdated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $status;
    public $pembayaranUrl;
    public function __construct($status, $pembayaranUrl = null)
    {
        $this->status = $status;
        $this->pembayaranUrl = $pembayaranUrl;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // Tambahkan 'broadcast' jika ingin real-time
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Status pemesanan Anda diperbarui menjadi "' . $this->status . '"',
            'pembayaran_url' => $this->pembayaranUrl,
        ];
    }
}
