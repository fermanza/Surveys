<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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

        $inicio = url('/inicio_sesion');
        // return (new MailMessage)
        //             ->from('info@survenia.com', 'Survenia')
        //             ->greeting('¡Hola! Acabas de crear una cuenta para el sitio web de Survenia.')
        //             ->subject('Nuevo Usuario Creado')
        //             ->line('Da click en el siguiente botón para iniciar sesión:')
        //             ->action('Ingresar', url('/inicio_sesion'))
        //             ->line('¡Gracias por registrarte en Survenia!');

        return (new MailMessage)
                    ->from('info@survenia.com', 'Survenia')
                    ->subject('Nuevo Usuario Creado')
                    ->markdown('notificaciones.newuser', ['inicio' => $inicio]);
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
