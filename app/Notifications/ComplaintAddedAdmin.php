<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintAddedAdmin extends Notification
{
    use Queueable;

    protected $complaint;
    protected $user;
    protected $textNotify;
    /**
     * Create a new notification instance.
     */
    public function __construct($complaint, $user, $textNotify)
    {
        $this->complaint = $complaint;
        $this->user = $user;
        $this->textNotify = $textNotify;
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
            ->subject('Complaint Received')
            ->from('support@minister.com', 'MoECP')
            ->greeting('Dear '. $this->user->name.',')
                    ->line('Your complaint has been received. We will process it shortly.')
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
            'message' => $this->textNotify,
        ];
    }
}
