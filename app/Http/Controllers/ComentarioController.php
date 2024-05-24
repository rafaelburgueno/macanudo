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

        //return $request->ip();
        //return $request->userAgent();
        //return $request->os();
        //return $request->get('nombre');
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255',
            'texto' => 'required|max:255|min:3',
        ]);

        
        // VALIDACION DE RECAPTCHA
        //return $request->all();
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ])->object();

        //return $response;

        if(!$response->success || $response->score < 0.8 ){
        //if($response->success ){
        //if(true ){
        // $request->userAgent();
            Log::warning('BOTS, ip: '. $request->ip() .', $request->userAgent(): '. $request->userAgent() .', $response->success: ' . $response->success . ', formulario de contacto, ComentarioController.php linea 47. Direccion del atacante: ' . $request->email . '. Texto del atacante: ' . $request->texto . '.');
            
            if(isset($response->score)){
            //if ($response->has('score')) {
                Log::warning('BOTS, $response-score: '.$response->score.', formulario de contacto, ComentarioController.php linea 51. Direccion del atacante: ' . $request->email . '. Texto del atacante: ' . $request->texto . '.');
            }

            session()->flash('error', 'El formulario no pudo ser enviado, se detecto el uso de bots.');
            return redirect() -> route('home');
        }else{
            // dejo registrado el score en el archivo laravel.log
            Log::info('El score de la validacion de recaptcha fue de: ' . $response->score . ' en el formulario de contacto, ComentarioController.php linea 58. Direccion del contacto: ' . $request->email . '. Texto del contacto: ' . $request->texto . '.'); 
        }
        // FIN DE VALIDACION DE RECAPTCHA


        
        
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

        // Log para registrar la llegada de un nuevo mensaje
        Log::notice('Nuevo mensaje recibido en el formulario de contacto, ComentarioController.php linea 82. Email: ' . $request->email . '. Texto: ' . $request->texto . '.');

        session()->flash('exito', 'Su mensaje fue recibido');
        return redirect() -> route('home');
        //return 'mensaje enviado!';
    }




    /*
    |--------------------------------------------------------------------------
    | Este metodo devuelve la vista de la pagina para administrar Comentarios
    |--------------------------------------------------------------------------
    */
    public function index(){
        //return "holisss mundo!";
        $comentarios = Comentario::all();
        return view('comentarios.index', compact('comentarios'));
    }


    /*
    |--------------------------------------------------------------------------
    | Este metodo devuelve la vista de la pagina para editar un Comentario
    |--------------------------------------------------------------------------
    */
    public function edit(Comentario $comentario){
        //$comentario = Comentario::find($id);
        return view('comentarios.edit', compact('comentario'));
    }


    /*
    |--------------------------------------------------------------------------
    | Este metodo actualiza un Comentario
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Comentario $comentario){
        //return $request->all();
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'texto' => 'required',
            'calificacion' => 'required',
            //'activo' => 'required',
        ]);
        
        // creo un booleano para el campo 'activo'
        if($request->activo == 'on'){
            $request->activo = 1;
        }else{
            $request->activo = 0;
        }

        $comentario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'texto' => $request->texto,
            'calificacion' => $request->calificacion,
            'activo' => $request->activo,
        ]);

        session()->flash('exito', 'El comentario fue editado.');
        return redirect()->route('comentarios.index');
    }


}
