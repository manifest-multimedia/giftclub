<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralEarningNotification extends Notification
{
    use Queueable;
    
    public $name; 
    public $amount;
    public $referral; 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$amount,$referral)
    {
        $this->name=$name;
        $this->amount=$amount;
        $this->referral=$referral; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->subject("Yay! You've just earned $" . "$this->amount USD")
                ->greeting("Congrats $this->name,")
                ->line("You have just earned $$this->amount USD from your referral ($this->referral).")
                ->action('View Earnings', url('https://app.giftclubglobal.com'))
                ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
