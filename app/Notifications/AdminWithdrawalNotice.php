<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminWithdrawalNotice extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($admin, $user, $amount)
    {
        $this->admin=$admin; 
        $this->user=$user; 
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
                    ->subject("Withdrawal Completed for $this->user")
                    ->greeting("Dear $this->admin,")
                    ->line("You have successfully completed the withdrawal payment of $$this->amount USD for $this->user.")
                    ->action('Viewing Pending Withdrawals', url('https://app.giftclubglobal.com/admin'))
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
