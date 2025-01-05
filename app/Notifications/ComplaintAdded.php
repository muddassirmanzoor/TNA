<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintAdded extends Notification
{
    use Queueable;

    protected $complaint;
    protected $user;
    /**
     * Create a new notification instance.
     */
    public function __construct($complaint, $user)
    {
        $this->complaint = $complaint;
        $this->user = $user;
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
            ->subject('Complaint Received')
            ->from('support@minister.com', 'MoECP')
            ->greeting('Dear '. $this->user->name.',')
                    ->line('Thank you for submitting your complaint.')
                    ->line('Tracking ID: '. $this->complaint->complaint_id)
                    ->line('Your complaint has been received, and it is now under review. We will keep you updated on the progress.')
                    ->line('This is an automated email; Please do not reply to this email.');
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
            'message' => 'Your complaint has been received.',
        ];
    }
}
