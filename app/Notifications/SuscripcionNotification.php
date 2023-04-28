<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class SuscripcionNotification extends Notification
{
    use Queueable;

    protected $suscripcion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($suscripcion)
    {
        $this->suscripcion = $suscripcion;
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
        //dd($this->suscripcion->user->name);
        $suscripcion = $this->suscripcion;

        $descripcion_de_la_suscripcion = 'Mientras la suscripción esté activa, recibirás una canasta con ' . $suscripcion->cantidad_de_quesos . ' quesos cada ' . Str::lower($suscripcion->dia_de_entrega). '. La dirección definida para recibir el pedido es ' . $suscripcion->direccion_de_entrega . '.';

        $descripcion_del_pago = 'El costo de la suscripción es de $' . $suscripcion->precio . ', y deberás pagar con Mercado Pago, transferencia o efectivo, al recibir los productos.';

        // <a href="{{URL::signedRoute('cancelar_suscripcion', ['suscripcion' => $suscripcion->id])}}" target="_blank">
        //$cancelar_suscripcion = 'Si no deseas continuar con la suscripción, podés cancelarla haciendo click en este <a target="_blank" href="' . URL::signedRoute('cancelar_suscripcion', ['suscripcion' => $suscripcion->id]) . '">link</a>.';


        return (new MailMessage)
                    ->subject('Confirmación de suscripción')
                    ->greeting('¡Tu suscripción se realizó correctamente!')
                    ->line($descripcion_de_la_suscripcion)
                    ->line($descripcion_del_pago)
                    ->line('Ante cualquier consulta, recomendación o reclamo, por favor, no dudes en contactarnos respondiendo este correo o al 099 760 201.')
                    //->line('Si no deseas continuar con la suscripción, podés cancelarla haciendo click <a target="_blank" href="'. url(URL::signedRoute('cancelar_suscripcion', ['suscripcion' => $suscripcion->id])).'">aquí</a>.')
                    ->action('Podés cancelar la suscripción hasta 5 días antes de la entrega, haciendo click acá.', url(URL::signedRoute('cancelar_suscripcion', ['suscripcion' => $suscripcion->id])))
                    ->salutation('¡Muchas gracias por unirte al Club!');
                    //->salutation('Un afectuoso saludo y nos vemos pronto.');

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
