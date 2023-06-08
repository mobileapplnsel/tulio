<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovalRequest extends Notification
{
    use Queueable;
    protected $project,$name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$lastname,$type,$company,$email,$phone)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->type = $type;
        $this->company = $company;
        $this->email = $email;
        $this->phone = $phone;
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
        return (new MailMessage)->subject('Tulio A+ID Approval Request')->markdown('emails.approval-request',
                ['name'=>$this->name,'lastname'=>$this->lastname,'type'=>$this->type,'company'=>$this->company,'email'=>$this->email,'phone'=>$this->phone]);
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
