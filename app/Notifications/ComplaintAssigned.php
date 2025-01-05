<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintAssigned extends Notification
{
    use Queueable;

    protected $complaint;
    protected $assignedUser;
    protected $text;
    /**
     * Create a new notification instance.
     */
    public function __construct($complaint, $assignedUser, $text)
    {
        $this->complaint = $complaint;
        $this->assignedUser = $assignedUser;
        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Complaint Assigned')
            ->greeting('Dear '. $this->assignedUser->name.',')
            ->from('support@minister.com', 'MoECP')
                    ->line('A complaint has been assigned to you.')
                    ->line('Thank you for using our application!');
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
