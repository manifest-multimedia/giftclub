<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuccessfulWithdrawalRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $name;
     public $walletaddress;
     public $amount;

    public function __construct($name, $walletaddress, $amount)
    {
        $this->name=$name;
        $this->walletaddress=$walletaddress;
        $this->amount=$amount;
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
                    ->greeting('Congratulations '.$this->name.',')
                    ->line('You have successfully requested a withdrawal of $'.$this->amount.'USD from your referral earnings.')
                    ->line("Your request is processing and you'd soon receive the funds in the wallet linked to your account (".$this->walletaddress.").")
                    ->line("Thank you!");
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
