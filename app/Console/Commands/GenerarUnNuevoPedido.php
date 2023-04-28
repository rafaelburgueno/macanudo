<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDeStock;
use App\Models\Pedido;

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
        /*$pedido = new Pedido();

        $pedido->status = 'prueba';
        $pedido->tipo = 'club del queso';
        $pedido->nombre = 'rafa';
        $pedido->email = 'rafaelburg@gmail.com';
        $pedido->documento_de_identidad = '41027461';
        $pedido->telefono = '094741095';
        $pedido->direccion = 'mi direccion';
        $pedido->localidad = 'mi localidad';
        $pedido->departamento = 'Canelones';
        $pedido->pais = 'Uruguay';
        $pedido->medio_de_pago = 'sin definir';
        $pedido->monto = 1001;
        $pedido->save();*/
        
        $now = new \DateTime();
        

        Mail::to('rafaelburg@gmail.com')->queue(new EmailDeStock('email cada X minutos. ' . $now->format('Y-m-d H:i:s')));

        $this->info('Se ha generado un nuevo pedido');


        return Command::SUCCESS;
    }
}
