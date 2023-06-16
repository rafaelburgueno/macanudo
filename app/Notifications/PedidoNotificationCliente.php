<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class PedidoNotificationCliente extends Notification
{
    use Queueable;

    protected $pedido;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pedido)
    {
        $this->pedido = $pedido;
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
        $PENDING_STATUS = 'pending';
        $APPROVED_STATUS = 'approved';
        $PENDIENTE_STATUS = 'pendiente';

        $pedido = $this->pedido;
        $direccion = "";
        $lista_de_productos = '';


        if($pedido->direccion == 'el pedido se retira en la planta'){
            $direccion = 'Podes retirar el pedido de lunes a viernes '. $pedido->costo_de_envio->hora_de_entrega . ', en nuestra planta ubicada en calle los Coronillas casi De Los Ombues, La Floresta, Canelones.';
        }else{
            if($pedido->costo_de_envio){
                $direccion = 'La entrega en tu zona se realiza ' . $pedido->costo_de_envio->dia_de_entrega . '.';
                //$direccion = 'La entrega en tu zona se realiza ' . $pedido->costo_de_envio->dia_de_entrega . ', en el horario '. $pedido->costo_de_envio->hora_de_entrega . '.';
            }if($pedido->suscripcion){
                $direccion = 'La dirección de entrega es ' . $pedido->direccion . '.';

            }
        }

        // TODO
        /*foreach($pedido->productos as $producto){
            $lista_de_productos .= $producto->pivot->unidades . ' unidades de ' . $producto->nombre . '. ';
        }*/
        $lista_de_productos = $pedido->detalleDeProductos();


        $descripcion_del_pedido = 'Tu pedido se realizó correctamente!';

        // si el status del pedido es aprobado, entonces se envía el mail de confirmación de pedido
        if($pedido->status == 'aprobado'){
            $descripcion_del_pago = 'El costo del pedido es de $' . $pedido->precio . ', y deberás pagar con Mercado Pago, transferencia o efectivo, al recibir los productos.';
            
        }elseif($pedido->status == $PENDING_STATUS || $pedido->status == $PENDIENTE_STATUS){
            $descripcion_del_pago = 'El costo del pedido es de $' . $pedido->precio . ', y todavia se encuentra pendiente de pago.';
        }

        // TODO: dependiendo del estado del pago se debe enviarun texto diferente para el boton de accion del email

        return (new MailMessage)
                    ->subject('Tu pedido')
                    ->greeting('¡Ya estamos preparando tu pedido!')
                    ->line($direccion)
                    ->line($lista_de_productos)
                    
                    ->line('Ante cualquier consulta, modificación o reclamo, por favor, no dudes en contactarnos respondiendo este correo o al 099 760 201.')
                    
                    //->action('Podés cancelar el pedido hasta 5 días antes de la entrega, haciendo click acá.', url(URL::signedRoute('confirmar_cancelacion_de_pedido', ['pedido' => $pedido->id])))
                    //->action('Si querés cancelar tu pedido, podés hacerlo hasta 5 dias antes de la entrega, haciendo click acá', url('/'))
                    //->line('Podés cancelar el pedido hasta 5 días antes de la entrega, haciendo click <a target="_blank" href="'. url(URL::signedRoute('confirmar_cancelacion_de_pedido', ['pedido' => $pedido->id])) .'">acá.</a>');

                    ->line('Muchas gracias por tu compra.');
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
