<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioDeContacto;
use App\Models\Comentario;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ComentarioController extends Controller
{
    

    /*
    |--------------------------------------------------------------------------
    | Este metodo procesa el formulario que esta en el home
    |--------------------------------------------------------------------------
    */
    public function formulario_de_contacto(Request $request){
        
        // VALIDACION DE RECAPTCHA
        //return $request->all();
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ])->object();

        //return $response;

        if(!$response->success || $response->score < 0.8 ){
        //if($response->success ){
            Log::info('Se detecto el uso de bots($response-score: '.$response->score.' ) en el formulario de contacto, ComentarioController.php linea 32. Direccion del atacante: ' . $request->email . '. Texto del atacante: ' . $request->texto . '.');
            session()->flash('error', 'El formulario no pudo ser enviado, se detecto el uso de bots.');
            return redirect() -> route('home');
        }else{
            // dejo registrado el score en el archivo laravel.log
            Log::info('El score de la validacion de recaptcha fue de: ' . $response->score . ' en el formulario de contacto, ComentarioController.php linea 39. Direccion del contacto: ' . $request->email . '. Texto del contacto: ' . $request->texto . '.'); 
        }
        // FIN DE VALIDACION DE RECAPTCHA


        //return $request;
        //return $request->get('nombre');
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255',
            'texto' => 'required|max:255|min:3',
        ]);
        
        
        // TODO: en la base de datos, el campo 'texto' tiene un maximo de 255 caracteres, 
        // llegado el caso va a haber que modificar ese valor maximo
        $comentario = new Comentario();
        $comentario->nombre = $request->nombre;
        $comentario->email = $request->email;
        $comentario->texto = $request->texto;
        $comentario->comentarioable_type = 'formulario de contacto';
        $comentario -> save();

        try{
            Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rafaelburg@gmail.com'))->cc(env('MAIL_REGISTROS', 'rafaelburg@gmail.com'))
                ->queue(new FormularioDeContacto($request->all()));
        } catch (Exception $e) {
            Log::error('Error al enviar correo electrónico a MAIL_RECEPTOR_DE_NOTIFICACIONES y MAIL_REGISTROS, desde el controlador ComentarioController.php: ' . $e->getMessage());
        }

        session()->flash('exito', 'Su mensaje fue recibido');
        return redirect() -> route('home');
        //return 'mensaje enviado!';
    }


}
