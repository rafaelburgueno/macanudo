<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;


class VerifyEmailCustom extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', // Este es el nombre de la ruta para la verificación de correo electrónico
            now()->addMinutes(60), // El enlace expira en 60 minutos
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );



        return (new MailMessage)
        ->subject('Verifica tu dirección de correo electrónico')
        ->line('Por favor, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.')
        ->action('Verificar dirección de correo electrónico', $verificationUrl)
        ->line('Si no creaste una cuenta, no es necesario realizar ninguna otra acción.');
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
