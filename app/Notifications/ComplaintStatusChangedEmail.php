<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintStatusChangedEmail extends Notification
{
    use Queueable;

    protected $user;
    protected $complaint;
    protected $text;
    /**
     * Create a new notification instance.
     */
    public function __construct($user, $complaint, $text)
    {
        $this->user = $user;
        $this->complaint = $complaint;
        $this->text = $text;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Complaint Status Updated')
            ->from('support@minister.com', 'MoECP')
            ->greeting('Dear '. $this->user->name.',')
            ->line($this->text);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'complaint_id' => $this->complaint->id,
            'status_id' => $this->complaint->status_id,
            'message' => $this->text,
        ];
    }
}
