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
use App\Http\Controllers\PagosController;

class WebhooksController extends Controller
{
    

    public function __invoke(Request $request)
    {
        //$payment_id = $request->all()['data']['id'];
        //$response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));
        //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($response));
        //return  response()->json(['success' => $request->all()], 200);
        

        try {
            $payment_id = $request->all()['data']['id'];

            // el siguiente 'if' responde a las consultas que mercadopago hace a nuestra plataforma con payment_id borrados
            //https://api.mercadopago.com/v1/payments/53981171870
            //https://api.mercadopago.com/v1/payments/53826495475
            if($payment_id == '123456789' or $payment_id == '53981171870'){
                return response()->json(['OK' => 'OK'], 200);
            }

            //envio de email para fines de desarrollo y control
            //Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($request->all()));
            

            $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=".env('MP_ACCESS_TOKEN'));

            Mail::to(env('MAIL_DESARROLLADOR', 'rafaelburg@gmail.com'))->queue(new EmailDeControl($response));

            $response = json_decode($response);

            //dump($response);

            $status = $response->status;


            $pedido = Pedido::firstWhere('numero_de_factura', $payment_id);
            
            

            $pedido->medio_de_pago = 'mercadopago';
            if($status == "approved"){
                $pedido->estado_del_pago = 'pagado';
                $pedido->save();
            
                // Envia un email con el pedido
                Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
                ->queue(new PedidosMail($pedido));
                // Envia un email al cliente con el pedido
                Mail::to($pedido->email)->bcc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))->queue(new PedidoClienteMail($pedido));

                
                // llamaos al metodo que actualiza el stock
                //$pago = new PagosController();
                //$pago->actualizarCuponYStock($pedido);
                $pedido->actualizarCuponYStock();
                

                //responder con un status 200 (OK) o 201 (CREATED)
                return response()->json(['OK' => 'OK'], 200);
            
            }else{
                $pedido->estado_del_pago = $status;
                $pedido->save();
            
            
            
            
            }
            //return true;

            

        } catch (Exception $e) {
            $error = $e->getMessage();

        }


        //responder con un status 200 (OK) o 201 (CREATED)
        //return response()->json(['success' => 'success'], 200);
        
        
    }


}
