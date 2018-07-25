<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactForm extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $request)
    {
        $this->user = $user;
        $this->request = $request;
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
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        $requestName = $this->request->name;
        $requestPhone = $this->request->phone;
        $requestEmail = $this->request->email;
        $requestBudget = $this->request->budget;
        $requestComment = $this->request->comment;

        return (new MailMessage)
                    ->from('info@survenia.com', 'Survenia')
                    ->subject('Información de Formulario de Contacto')
                    ->markdown('notificaciones.contacto', ['requestName' => $requestName,'requestPhone' => $requestPhone,'requestEmail' => $requestEmail, 'requestBudget' => $requestBudget, 'requestComment' => $requestComment]);
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
