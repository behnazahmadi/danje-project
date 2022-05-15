<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class sendReplayAdminCommentToUser extends Notification implements ShouldQueue
{
    use Queueable;

    private $comment;
    private $class;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
        $this->class = explode("\\",$this->comment->commentable_type);
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
                    ->line('به کامنت شما پاسخ داده شده است')
                    ->action('برگشت به وبسایت', url('/'))
                    ->line('Thank you for using our application!')
                    ->subject('به کامنت شما پاسخ داده شده است');
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
            'message' => ' یک پاسخ برای دیدگاهی که در ' . "<span class=\"text text-primary\">{$this->comment->commentable->title}</span>" . ' مطرح کردید ثبت شد ',
            'link' => strtolower($this->class[2]).'s/'. $this->comment->commentable->slug,
        ];
    }
}
