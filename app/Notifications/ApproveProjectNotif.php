<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveProjectNotif extends Notification
{
    use Queueable;
    protected $projecturl,$name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($projectname,$shared_name,$additional_message)
    {
        $this->projectname = $projectname;
        $this->shared_name  = $shared_name;
        $this->additional_message = $additional_message;
        
        
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
        return (new MailMessage)->subject('Tulio Website: Project Approval - '.$this->projectname)->markdown('emails.approve-project-notif',
                ['shared_name' => $this->shared_name,
                'additional_message' =>$this->additional_message]);
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
