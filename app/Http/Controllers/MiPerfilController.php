<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class MiPerfilController extends Controller
{
    

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mi_perfil(Request $request)
    {
        
        // obtener los pedidos del usuario usando el id del usuario
        $pedidos = Pedido::where('user_id', $request->user()->id)->get();
        //$pedidos = Pedido::where('email', $request->user()->email)->get();
        
        // obtener las direcciones registradas por el usuario
        $direcciones = Pedido::where('user_id', $request->user()->id)->get();
        // elimina las direcciones que repiten el contenido del campo direccion
        $direcciones = $direcciones->unique('direccion');

        return view('mi_perfil')->with('pedidos', $pedidos)->with('direcciones', $direcciones);
    }


}
