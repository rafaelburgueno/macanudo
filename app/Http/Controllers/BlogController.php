<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        
        //$eventos = Evento::where('fecha', '>', now())->where('activo', true)->where('tipo', '!=', 'taller')->orderBy('relevancia')->take(6)->get();
        //$talleres = Evento::where('fecha', '>', now())->where('activo', true)->where('tipo', 'taller')->orderBy('relevancia')->take(6)->get();
        
        // Retorna la vista y los datos del banner dentro del array $banner.
        //return view('home')->with('banner', $banner);
        return view('blog');
        
        //return view('home')->with('eventos', $eventos)->with('talleres', $talleres)->with('banner', $banner);

    }
}
