<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDeStock;
use App\Models\Pedido;
use Carbon\Carbon;
use App\Mail\PedidosMail;

class GenerarUnNuevoPedido extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pedido:generar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera un nuevo pedido en la base de datos, cuando se cumple un mes de la fecha de creación del último pedido';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // crear un nuevo pedido
        //##########################################################
        /* seudo codigo: 
        paso 1- traer pedidos->tipo == 'club del queso'
        paso 2- traer traer los pedidos de un mes atras
        paso 3- consultar la suscripcion de cada pedido y ver si esta activa
        paso 4- si la suscripcion esta activa, crear un nuevo pedido con los datos del pedido anterior
        */
        $pedidos = Pedido::where('tipo', 'club del queso')
            //->whereDate('created_at', '>', Carbon::now()->subMonth())
            ->whereDate('created_at', '=', Carbon::now()->subDays(30))
            //->where('tipo_de_cliente', '=', 'suscripción - último pedido')
            ->whereHas('suscripcion', function ($query) {
                $query->where('activo', 1);
            })->get();

        foreach ($pedidos as $pedido) {
            $nuevo_pedido = new Pedido();
            $nuevo_pedido->status = 'sin productos';
            $nuevo_pedido->tipo = 'club del queso';
            $nuevo_pedido->user_id = $pedido->suscripcion->user_id;
            $nuevo_pedido->nombre = $pedido->suscripcion->user->name;
            $nuevo_pedido->email = $pedido->suscripcion->user->email;
            $nuevo_pedido->telefono = $pedido->suscripcion->telefono;
            $nuevo_pedido->direccion = $pedido->suscripcion->direccion_de_entrega;
            $nuevo_pedido->medio_de_pago = $pedido->medio_de_pago;
            // el monto se calcula en base al precio de la suscripcion, porque si se cambia el tipo de suscripcion entre pedidos, debe tomar siempre el precio de la suscripcion
            $nuevo_pedido->monto = $pedido->suscripcion->precio;
            //$nuevo_pedido->monto = $pedido->monto;
            $nuevo_pedido->recibir_novedades = $pedido->recibir_novedades;

            $nuevo_pedido->tipo_de_cliente = 'suscriptor - último pedido';
            $pedido->tipo_de_cliente = 'suscriptor';
            $pedido->save();

            // el numero de factura es 66 porque es el numero de factura que se le asigna a los pedidos que se generan automaticamente
            $nuevo_pedido->numero_de_factura = 66; //rand(1000, 9999);
             
            $nuevo_pedido->estado_del_pago = 'pendiente';
            $nuevo_pedido->suscripcion_id = $pedido->suscripcion_id;


            //$nuevo_pedido->canasta_id = $pedido->canasta_id;
            //$nuevo_pedido->costo_de_envio_id = $pedido->costo_de_envio_id;
            //$nuevo_pedido->cupon_id = $pedido->cupon_id;
            $nuevo_pedido->save();

            // en la suscripcion relativa al nuevo pedido, se actualiza el campo 'fecha_de_renovacion' con un date
            $suscripcion = $pedido->suscripcion;
            $suscripcion->fecha_de_renovacion = now();
            $suscripcion->save();

            // Envia a pedro o a mi un email con el pedido
            //Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rburg@vivaldi.net'))->cc(env('MAIL_REGISTROS', 'rburg@vivaldi.net'))
            //->queue(new PedidosMail($nuevo_pedido));
            Mail::to(env('MAIL_DESARROLLADOR', 'rburg@vivaldi.net'))->cc(env('MAIL_REGISTROS', 'rburg@vivaldi.net'))
            ->queue(new PedidosMail($nuevo_pedido));

        }

        //#########################################################




        
        //$now = new \DateTime();
        

        //Mail::to('rburg@vivaldi.net')->queue(new EmailDeStock('email cada X minutos. ' . $now->format('Y-m-d H:i:s')));

        $this->info('Se ha generado un nuevo pedido');


        return Command::SUCCESS;
    }
}
