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

        $pedido = $this->pedido;
        $direccion = "";
        $lista_de_productos = '';


        if($pedido->direccion == 'el pedido se retira en la planta'){
            $direccion = 'Podes retirarl de lunes a viernes '. $pedido->costo_de_envio->hora_de_entrega . ', en nuestra planta ubicada en calle los Coronillas casi De Los Ombues, La Floresta, Canelones.';
        }else{
            if($pedido->costo_de_envio){
                $direccion = 'La entrega en su zona se realiza ' . $pedido->costo_de_envio->dia_de_entrega . ', en el horario '. $pedido->costo_de_envio->hora_de_entrega . '.';
            }if($pedido->suscripcion){
                $direccion = 'La direccion de entrega es ' . $pedido->direccion . '.';

            }
        }

        // TODO
        /*foreach($pedido->productos as $producto){
            $lista_de_productos .= $producto->pivot->unidades . ' unidades de ' . $producto->nombre . '. ';
        }*/
        $lista_de_productos = $pedido->detalleDeProductos();


        $descripcion_del_pedido = 'Tu pedido se realizó correctamente!';

        $descripcion_del_pago = 'El costo del pedido es de $' . $pedido->precio . ', y deberás pagar con Mercado Pago, transferencia o efectivo, al recibir los productos.';


        return (new MailMessage)
                    ->subject('Tu pedido')
                    ->greeting('Ya estamos preparando tu pedido!')
                    ->line($direccion)
                    ->line($lista_de_productos)
                    
                    ->line('Ante cualquier consulta, recomendación o reclamo, por favor, no dudes en contactarnos.')
                    
                    ->action('Si querés cancelar tu pedido, podés hacerlo hasta 5 dias antes de la entrga, haciendo click acá', url(URL::signedRoute('cancelar_pedido', ['pedido' => $pedido->id])))
                    //->action('Si querés cancelar tu pedido, podés hacerlo hasta 5 dias antes de la entrga, haciendo click acá', url('/'))

                    ->line('Muchas gracias por su compra.');
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
