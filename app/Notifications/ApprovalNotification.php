<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApprovalNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $template_id)
    {
        $this->user = $user;
        $this->template_id = $template_id;
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
        



        $urlVer = url('/encuestas/responder/'.$this->template_id->id);
        $urlAprobar = url('/mis_encuestas/approval/'.$this->template_id->id.'/1');
        $urlRechazar = url('/mis_encuestas/approval/'.$this->template_id->id.'/0');

       

        // return (new MailMessage)        
        //             ->from('info@survenia.com', 'Survenia')
        //             ->greeting('Aprobar Encuesta Pública en Survenia')
        //             ->subject('Aprobación de Encuesta Pública')
        //             ->line('La encuesta creada:')
        //             ->action('Ver Encuesta', $url)
        //             ->line('Da click en el siguiente botón para aprovar la encuesta:')
        //             ->action('Aprobar', $url)
        //             ->line('O da click acá para rechazarla:')
        //             ->action('Rechazar', $url);

        return (new MailMessage)
                    ->from('info@survenia.com', 'Survenia')
                    ->subject('Aprobación de Encuesta Pública')
                    ->markdown('notificaciones.aprobacion', ['urlVer' => $urlVer, 'urlAprobar' => $urlAprobar, 'urlRechazar' => $urlRechazar]);
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
