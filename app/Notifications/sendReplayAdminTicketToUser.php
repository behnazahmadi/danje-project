<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendReplayAdminTicketToUser extends Notification implements ShouldQueue
{
    use Queueable;

    public $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        //
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->action('مشاهده پاسخ', url('/panel/tickets/'.$this->ticket->id))
            ->line('به تیکتی که در سایت ----- ارسال کرده اید پاسخ داده شد.')
            ->subject('به تیکت شما پاسخ داده شده است');
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
            'message' => ' یک پاسخ برای دیدگاهی که در ' . "<span class=\"text text-primary\">{$this->ticket->title}</span>" . ' مطرح کردید ثبت شد ',
            'link' => 'panel/tickets/'. $this->ticket->id,
        ];
    }
}
