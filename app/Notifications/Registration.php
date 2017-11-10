<?php

namespace App\Notifications;

use App\Domain\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Registration extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $this->user;

        return (new MailMessage())
            ->greeting(sprintf('Beste %s %s', $user->name, $user->last_name))
            ->line('Er is een account aangemaakt voor planner.nl.')
            ->action('Meld u hier aan', url('/'))
            ->line('Bedankt voor uw tijd.')
            ->salutation('Met vriendelijke groet,');
    }
}
