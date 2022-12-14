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
        
        $pedidos = Pedido::where('email', $request->user()->email)->get();

        return view('mi_perfil')->with('pedidos', $pedidos);
    }


}
