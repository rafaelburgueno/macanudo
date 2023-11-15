<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDeStock;
use Illuminate\Support\Facades\Log;

class Pedido extends Model
{
    use HasFactory;



    /**
     * Devuelve un elemento del modelo Canasta que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var Canasta
     */
    public function canasta(){
        return $this->belongsTo('App\Models\Canasta');
    }



    /**
     * Devuelve un elemento del modelo User que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var User
     */
    // Relacion uno a muchos (inversa)
    // testeado tinker exitoso
    public function user(){
        //$user = User::where('id', $this->user_id)->first();
        //return $this->belongsTo('App\Models\User', 'id', $this->user_id);
        return $this->belongsTo('App\Models\User');
    }



    /**
     * Devuelve un elemento del modelo Costo_de_envio que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var Costo_de_envio
     */
    // Relacion uno a muchos (inversa)
    // testeado tinker exitoso
    public function costo_de_envio(){
        return $this->belongsTo('App\Models\Costo_de_envio');
    }



    /**
     * Devuelve un elemento del modelo Cupon que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * testeado tinker exitoso
     * @var Cupon
     */
    public function cupon(){
        return $this->belongsTo('App\Models\Cupon');
    }



    /**
     * Devuelve un elemento del modelo Suscripcion que se vinculan a esta instancia de Pedido
     * relacion uno a muchos (inversa)
     * @var Suscripcion
     */
    public function suscripcion(){
        return $this->belongsTo('App\Models\Suscripcion');
    }



    /**
     * Devuelve un array de elementos del modelo Producto que se vinculan a esta instancia de Pedido
     * relacion muchos a muchos
     * testeado tinker exitoso
     * @var array Producto
     */
    public function productos(){
        return $this->belongsToMany('App\Models\Producto')->withPivot('unidades');
    }


    
    /**
     * Devuelve un array de strings con la lista de elementos del modelo Producto que se vinculan a esta instancia de Pedido
     * 
     * NO SE ESTA USANDO ESTE METODO
     * @var array String
     */
    public function listaDeProductos(){

        $pedido = Pedido::with('productos')->find($this->id); 
        $lista_de_productos = $pedido->productos; 

        //$lista_de_productos = array();

        //$pedido_producto = $this->belongsToMany('App\Models\Producto');
        //$productos_del_pedido = DB::table('pedido_producto')->where('pedido_id', $this->id)->get();


        //dd($productos_del_pedido);
        //var_dump($productos_del_pedido);

        /*foreach($productos_del_pedido as $producto){

            array_push($lista_de_productos, $producto->producto_id);

            /*if (!in_array($producto->nombre, $lista_de_productos)) {
                array_push($lista_de_productos, $producto->nombre);
            }*/

        //}

        //return $productos_del_pedido;
        return $lista_de_productos;

    }




    /**
     * Actualiza el stock y los cupones
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function actualizarCuponYStock()
    {

        $productos = Producto::get();
        
        // este algoritmo resta una unidad del cupon usado 
        if($this->cupon_id){
            //$cupon = Cupon::find($this->cupon_id);
            $cupon = $this->cupon;
            $cupon->cantidad = (((int)$cupon->cantidad) -1);
            $cupon->save();
        }

        // TODO: hacer mas eficiente el siguiente algoritmo, para que no haga tantas busquedas en la bbdd

        // este algoritmo resta del stock los productos comprados
        //$productos_comprados = $this->productos();
        $productos_comprados = DB::table('pedido_producto')->where('pedido_id', $this->id)->get();
        //dd($productos_comprados);

        foreach($productos_comprados as $producto_comprado){

            //dd($producto_comprado);
            $producto = Producto::find($producto_comprado->producto_id);

            //$producto->stock = ( ((int)$producto->stock) - ((int)$producto_comprado->unidades) );
            //$producto_comprado->stock -= $producto_comprado->pivot_unidades;
            $producto->stock -= $producto_comprado->unidades;

            //$producto_comprado->save();
            $producto->save();


            // TODO: enviar email cuando queda menos de 5 unidades de un producto
            if($producto->stock <= 5){
                // Envia un email para avisar que queda poco stock
                try{
                    Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
                        ->queue(new EmailDeStock($producto->nombre.' tiene '. $producto->stock .' unidades en stock!', $productos));
                } catch (Exception $e) {
                    Log::error('Error al enviar correo electrónico a MAIL_RECEPTOR_DE_NOTIFICACIONES y MAIL_REGISTROS, desde el modelo Pedido.php linea 175: ' . $e->getMessage());
                }
            
            }


        }


        //$this->pais = 'MODEL actualizarCuponYStock!';
        $this->save();
        
    }




    /*metodo que devuelve un string con el detalle de cada producto y las unidades comprada */
    public function detalleDeProductos(){

        if($this->canasta_id){
            $productos_comprados = DB::table('canasta_producto')->where('canasta_id', $this->canasta_id)->get();
            $detalle = 'La canasta contiene ';
        }else{
            $productos_comprados = DB::table('pedido_producto')->where('pedido_id', $this->id)->get();
            $detalle = 'El pedido contiene ';
        }

        //dd($productos_comprados->first());
        foreach($productos_comprados as $producto_comprado){

            $producto = Producto::find($producto_comprado->producto_id);
            //dd($productos_comprados);

            //si el producto es el primero de la lista
            if($producto_comprado === $productos_comprados->first()){
                if($producto_comprado->unidades <= 1 ){
                    $detalle .= $producto_comprado->unidades . ' pieza de ' . $producto->nombre;
                }else{
                    $detalle .= $producto_comprado->unidades . ' piezas de ' . $producto->nombre;
                }
            }

            //si el producto es el ultimo de la lista se usa el punto final
            elseif($producto_comprado === $productos_comprados->last()){
                if($producto_comprado->unidades <= 1 ){
                    $detalle .= ' y ' . $producto_comprado->unidades . ' pieza de ' . $producto->nombre . '. ';
                }else{
                    $detalle .= ' y ' . $producto_comprado->unidades . ' piezas de ' . $producto->nombre . '. ';
                }
            }
            
            else{   
                if($producto_comprado->unidades <= 1 ){
                    $detalle .= ', ' . $producto_comprado->unidades . ' pieza de ' . $producto->nombre;
                }else{
                    $detalle .= ', ' . $producto_comprado->unidades . ' piezas de ' . $producto->nombre;
                }
            }
        }

        return $detalle;

    }




    /* Metodo que actualiza el monto del pedido, teniendo en cuenta los roductos y las canastas, si el pedido tiene productos y canastas debera sumar el precio de todos para calcular el monto. ademas debera sumar el valor del costo de envio */
    public function actualizarMonto(){

        $monto = 0;

        $productos_comprados = DB::table('pedido_producto')->where('pedido_id', $this->id)->get();
        
        foreach($productos_comprados as $producto_comprado){
            $producto = Producto::find($producto_comprado->producto_id);
            $monto += $producto->precio * $producto_comprado->unidades;
        }

        if($this->canasta_id){
            $canasta = Canasta::find($this->canasta_id);
            $monto += $canasta->precio;
        }

        // el siguiente bloque consulta si hay un costo_de_envio_id, si lo hay, busca el costo de envio y lo suma al monto
        if($this->costo_de_envio_id){
            $costo_de_envio = Costo_de_envio::find($this->costo_de_envio_id);
            $monto += $costo_de_envio->costo_de_envio;
        }

        $this->monto = $monto;
        $this->save();

    }
    




}
