<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Notifications\Notification;

class AddReservation extends Notification
{
    use Queueable;

    public $reservation;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $$this->reservation=$reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            
        // 'id'=>$this->reservation->id,
        'title'=>"new  reservation add by ",
        'user'=> Auth::user()->name,
        ];
    }
}
