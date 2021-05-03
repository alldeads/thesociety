<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginEmail extends Notification
{
    use Queueable;

    public $agent;
    public $ip;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($agent, $ip)
    {
        $this->agent = $agent;
        $this->ip = $ip;
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
                    ->cc('johnrexter.flores@gmail.com')
                    ->cc('rojennettealivio@gmail.com')
                    ->subject('Login Notification')
                    ->line('Login Details: ')
                    ->line($this->agent)
                    ->line($this->ip);
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
