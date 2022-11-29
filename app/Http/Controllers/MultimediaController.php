<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Multimedia;

class MultimediaController extends Controller
{
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multimedia $multimedia)
    {
        //se cambia la url relativa por la url del directorio
        $url = str_replace('storage', 'public', $multimedia->url);
            
        // elimina de la carpeta
        Storage::delete($url);

        // Se eliminan de la base de datos las imagenes relacionadas al producto
        $multimedia->delete();
            
        session()->flash('exito', 'El Multimedia fue eliminado.');

        return redirect() -> route('posts.index');
    }


}
