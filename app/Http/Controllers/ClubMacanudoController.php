<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioDelClubMacanudo;

class ClubMacanudoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('club_macanudo');
    }



    /* CREO QUE YA ESTA EN DSUSO ESTE METODO ¿?
    |--------------------------------------------------------------------------
    | Este metodo procesa el formulario_del_club_macanudo
    |--------------------------------------------------------------------------
    */
    public function formulario_del_club_macanudo(Request $request){
        //return $request->all();
        //return $request->get('nombre');
        $request->validate([ //TODO: revisar las validaciones porque no funcionan
            'nombre' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|max:20',
            'direccion' => 'required|max:100',
        ]);
        
        Mail::to(env('MAIL_RECEPTOR_DE_NOTIFICACIONES', 'rburg@vivaldi.net'))->cc(env('MAIL_REGISTROS', 'rburg@vivaldi.net'))
            ->queue(new FormularioDelClubMacanudo($request->all()));


        // TODO: guardar en la base de datos los mensajes
        // TODO: los mensajes son recibidos por correo pero podria guardarse adicionalmente en la BD
        // TODO: en la base de datos, el campo 'texto' tiene un maximo de 255 caracteres, 
        // llegado el caso va a haber que modificar ese valor maximo


        session()->flash('exito', 'Su solicitud fue recibida. Nos pondremos en contacto con usted a la brevedad.');
        return redirect() -> route('club_macanudo');
        //return 'mensaje enviado!';
    }



}
