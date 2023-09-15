<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    public $usuario_id;
    public $nombre_vacante;
    public $id_vacante; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacante,$nombre_vacante,$usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['email','database'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    /* public function toMail($notifiable)
    {
        $url= url('/notificaciones/'.$this->id_vacante);
        return (new MailMessage)
                    ->line('Nueva postulación')
                    ->line('a: '.$this->nombre_vacante)
                    ->action('Ver notificaciones', $url)
                    ->line('Tgracias por utilizar DevJobs');
    } */

    
    public function toDatabase($notifiable){

        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id
        ];

    }
}
