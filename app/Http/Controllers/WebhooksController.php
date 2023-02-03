<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidosMail;
use App\Mail\PedidoClienteMail;
use App\Mail\EmailDeControl;
use Exception;

class WebhooksController extends Controller
{
    

    public function __invoke(Request $request)
    {
        //$payment_id = $request->all()['data']['id'];
        
        //$response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));

        //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($response));
        
        //return  response()->json(['success' => $request->all()], 200);
        
        
        
        
        
        //envio de email para fines de desarrollo y control
        //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl('El id es:'.$payment_id));
        //$payment_id = $_POST["data"]["id"];
        //envio de email para fines de desarrollo y control
        //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($payment_id));

        try {
            $payment_id = $request->all()['data']['id'];

            if($payment_id == '123456789'){
                return response()->json(['OK' => 'OK'], 200);
            }

            //envio de email para fines de desarrollo y control
            //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($request->all()));

            //$payment_id = $request->get('payment_id');
            //$payment_id = $request->get('data')->id;
            //$payment_id = $_POST["data"]["id"];
            //envio de email para fines de desarrollo y control
            //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($payment_id));
            
            //$notificacion = $request->all();
            //$payment_id = $notificacion->data->id;

            //$status = $request->get('status');
            //"status":"approved"

            $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));

            Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($response));

            $response = json_decode($response);

            //dump($response);

            $status = $response->status;


            $pedido = Pedido::firstWhere('numero_de_factura', $payment_id);
            
            

            $pedido->medio_de_pago = 'mercadopago';
            if($status == "approved"){
                $pedido->estado_del_pago = 'pagado';
            }else{
                $pedido->estado_del_pago = $status;
            }
            $pedido->save();
            //return true;

            // Envia un email con el pedido
            Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))
            ->queue(new PedidosMail($pedido));
            // Envia un email al cliente con el pedido
            Mail::to($pedido->email)->queue(new PedidoClienteMail($pedido));

            //responder con un status 200 (OK) o 201 (CREATED)
            return response()->json(['OK' => 'OK'], 200);

        } catch (Exception $e) {
            $error = $e->getMessage();

        }



        //responder con un status 200 (OK) o 201 (CREATED)
        //return response()->json(['success' => 'success'], 200);
        
        /*if($status == 'approved'){
            $pedido->status = 'pedido';
            $pedido->numero_de_factura = $payment_id;

            

            

            session()->flash('pago_aprovado', 'La compra fue realizada con éxito. Te enviamos un email con la información tu pedido.');
            return redirect() -> route('nuestros_productos');
        }else{
            $pedido->numero_de_factura = $payment_id;
            $pedido->status = 'pedido';
            $pedido->medio_de_pago = 'mercadopago';
            $pedido->estado_del_pago = $status;
            $pedido->save();

            session()->flash('error', 'Algo salio mal, el pago fue rechazado.');
            return redirect() -> route('mi_carrito');
        }*/

        //return $request->all();
        //return view('pay')->with('pedido', $pedido);
        //return view('pedidos.edit', compact('pedido'));
        
    }


}
