<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminSuccessfulPayoutNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $admin;
     public $user; 
     public $amount; 
     public $package;

    public function __construct($admin, $user, $amount, $package )
    {
        $this->admin=$admin;
        $this->user=$user;
        $this->amount=$amount; 
        $this->package=$package; 
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
                    ->subject($this->user.' Successfully Paid!')
                    ->greeting("Dear $this->admin,")
                    ->line("You have successfully made a payment of $this->amount to $this->user for his investment plan ($this->package).")
                    ->action('View Pending Payouts for Users', url('https://app.giftclubglobal.com/admin'))
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
