<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $walletaddress; 
     public $name;
     public $email; 
     public $amount;

    public function __construct($name, $walletaddress, $amount, $email)
    {
        $this->name=$name; 
        $this->email=$email; 
        $this->amount=$amount;
        $this->walletaddress=$walletaddress;
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
                    ->subject('Withdrawal Request Received from '.$this->email)
                    ->greeting('Dear Giftclub,')
                    ->line('Your user '.$this->name.' has requested a withdrawal of $'.$this->amount.'USD from their referral earnings.')
                    ->line('Funds are to be sent to the wallet address below: ')
                    ->line($this->walletaddress);
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
