<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CostoDeEnvioController;
use App\Http\Controllers\CanastaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\NuestrosProductosController;
use App\Http\Controllers\MiCarritoController;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\ClubMacanudoController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\SuscripcionController;
use App\Models\Suscripcion;
use App\Http\Controllers\UsuarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/
//Auth::routes(['verify' => true]);


/*
|--------------------------------------------------------------------------
| home
|--------------------------------------------------------------------------
| El método __invoke() de la clase HomeController.php 
| se encarga de devolver la vista del home.
| Se utiliza un controlador porque se envían a la vista  
| datos adicionales como los datos del $banner, $productos, etc.
*/
Route::get('/', HomeController::class)->name('home');




/*
|--------------------------------------------------------------------------
| nosotros
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/nosotros', function () {
    return view('nosotros');
    //return "nosotros";
})->name('nosotros');




/*
|--------------------------------------------------------------------------
| nuestros_productos
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/nuestros_productos', NuestrosProductosController::class)->name('nuestros_productos');
/*Route::get('/nuestros_productos', function () {
    return view('nuestros_productos');
    //return "nuestros_productos";
})->name('nuestros_productos');*/




/*
|--------------------------------------------------------------------------
| puntos_de_venta
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/puntos_de_venta', function () {
    return view('puntos_de_venta');
    //return "puntos_de_venta";
})->name('puntos_de_venta');




/*
|--------------------------------------------------------------------------
| club_macanudo
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
//Route::get('/club_macanudo', ClubMacanudoController::class)->name('club_macanudo');
Route::get('/club_macanudo', function () {
    return view('club_macanudo');
})->name('club_macanudo');




/*
|--------------------------------------------------------------------------
| FORMULARIO DEL CLUB MACANUDO 
|--------------------------------------------------------------------------
| esta ruta es exclusiva para recivir el formulario del club macanudo
| 
*/
//Route::post('formulario_del_club_macanudo', [ClubMacanudoController::class, 'formulario_del_club_macanudo'])->name('formulario_del_club_macanudo'); 

Route::post('suscribirse', [SuscripcionController::class, 'suscribirse'])->name('suscribirse'); 
// esta ruta se usa para que los cliente cancelen su suscripcion
Route::get('confirmar_cancelacion_de_suscripcion/{suscripcion}', [SuscripcionController::class, 'confirmar_cancelacion_de_suscripcion'])->name('confirmar_cancelacion_de_suscripcion');
Route::get('cancelar_suscripcion/{suscripcion}', [SuscripcionController::class, 'cancelar_suscripcion'])->name('cancelar_suscripcion');
Route::delete('suscripcion/{suscripcion}', [SuscripcionController::class, 'destroy'])->name('suscripcion.destroy')->middleware('acceso.administrador');



/*
|--------------------------------------------------------------------------
| blog
|--------------------------------------------------------------------------
| La clase BlogController.php se encarga de devolver
| la vista de blog y una vista 'show' para leer cada post.
| Se utiliza un controlador porque se envían a la vista  
| datos adicionales como los post.
*/
//Route::get('/blog', BlogController::class)->name('blog');
Route::controller(BlogController::class)->group(function () {
    Route::get('blog', 'index')->name('blog.index');
    Route::get('blog/{post}', 'show')->name('blog.show');

});




/*
|--------------------------------------------------------------------------
| productos
|--------------------------------------------------------------------------
| La ruta de productos es administrada por el controlador 
| ProductoController, ya que debe cumplir con la funciones 
| de CRUD para productos. 
*/
Route::controller(ProductoController::class)->group(function () {
    Route::get('productos', 'index')->name('productos.index')->middleware('acceso.administrador');
    /*Route::get('productos/create', 'create')->name('productos.create')->middleware('administrador');*/
    Route::post('productos', 'store')->name('productos.store')->middleware('acceso.administrador');
    /*Route::get('productos/{producto}', 'show')->name('productos.show')->middleware('administrador');*/
    Route::get('productos/{producto}/edit', 'edit')->name('productos.edit')->middleware('acceso.administrador');
    Route::put('productos/{producto}', 'update')->name('productos.update')->middleware('acceso.administrador');
    Route::delete('productos/{producto}', 'destroy')->name('productos.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| cupones
|--------------------------------------------------------------------------
| La ruta de cupones es administrada por el controlador 
| CuponController, ya que debe cumplir con la funciones 
| de CRUD para cupones. 
*/
Route::controller(CuponController::class)->group(function () {
    Route::get('cupones', 'index')->name('cupones.index')->middleware('acceso.administrador');
    /*Route::get('cupones/create', 'create')->name('cupones.create')->middleware('administrador');*/
    Route::post('cupones', 'store')->name('cupones.store')->middleware('acceso.administrador');
    /*Route::get('cupones/{cupon}', 'show')->name('cupones.show')->middleware('administrador');*/
    Route::get('cupones/{cupon}/edit', 'edit')->name('cupones.edit')->middleware('acceso.administrador');
    Route::put('cupones/{cupon}', 'update')->name('cupones.update')->middleware('acceso.administrador');
    Route::delete('cupones/{cupon}', 'destroy')->name('cupones.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| costos_de_envio
|--------------------------------------------------------------------------
| La ruta de costos_de_envio es administrada por el controlador 
| CostoDeEnvioController, ya que debe cumplir con la funciones 
| de CRUD para costos_de_envio. 
*/
Route::controller(CostoDeEnvioController::class)->group(function () {
    Route::get('costos_de_envio', 'index')->name('costos_de_envio.index')->middleware('acceso.administrador');
    /*Route::get('costos_de_envio/create', 'create')->name('costos_de_envio.create')->middleware('administrador');*/
    Route::post('costos_de_envio', 'store')->name('costos_de_envio.store')->middleware('acceso.administrador');
    /*Route::get('costos_de_envio/{costo_de_envio}', 'show')->name('costos_de_envio.show')->middleware('administrador');*/
    Route::get('costos_de_envio/{costo_de_envio}/edit', 'edit')->name('costos_de_envio.edit')->middleware('acceso.administrador');
    Route::put('costos_de_envio/{costo_de_envio}', 'update')->name('costos_de_envio.update')->middleware('acceso.administrador');
    Route::delete('costos_de_envio/{costo_de_envio}', 'destroy')->name('costos_de_envio.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| canastas
|--------------------------------------------------------------------------
| La ruta de canastas es administrada por el controlador 
| CostoDeEnvioController, ya que debe cumplir con la funciones 
| de CRUD para canastas. 
*/
Route::controller(CanastaController::class)->group(function () {
    Route::get('canastas', 'index')->name('canastas.index')->middleware('acceso.administrador');
    /*Route::get('canastas/create', 'create')->name('canastas.create')->middleware('administrador');*/
    Route::post('canastas', 'store')->name('canastas.store')->middleware('acceso.administrador');
    /*Route::get('canastas/{canasta}', 'show')->name('canastas.show')->middleware('administrador');*/
    Route::get('canastas/{canasta}/edit', 'edit')->name('canastas.edit')->middleware('acceso.administrador');
    Route::put('canastas/{canasta}', 'update')->name('canastas.update')->middleware('acceso.administrador');
    Route::delete('canastas/{canasta}', 'destroy')->name('canastas.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| posts
|--------------------------------------------------------------------------
| La ruta de posts es administrada por el controlador 
| CostoDeEnvioController, ya que debe cumplir con la funciones 
| de CRUD para posts. 
*/
Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index')->name('posts.index')->middleware('acceso.administrador');
    /*Route::get('posts/create', 'create')->name('posts.create');*/
    Route::post('posts', 'store')->name('posts.store')->middleware('acceso.administrador');
    /*Route::get('posts/{post}', 'show')->name('posts.show');*/
    Route::get('posts/{post}/edit', 'edit')->name('posts.edit')->middleware('acceso.administrador');
    Route::put('posts/{post}', 'update')->name('posts.update')->middleware('acceso.administrador');
    Route::delete('posts/{post}', 'destroy')->name('posts.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| mi_carrito
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/mi_carrito', MiCarritoController::class)->name('mi_carrito'); //->middleware('mantenimiento'); 
/*Route::get('/mi_carrito', function () {
    return view('mi_carrito');
    //return "mi_carrito";
})->name('mi_carrito');*/




/*
|--------------------------------------------------------------------------
| pedidos
|--------------------------------------------------------------------------
| La ruta de pedidos es administrada por el controlador 
| PedidoController, ya que debe cumplir con la funciones 
| de CRUD para pedidos. 
*/
Route::controller(PedidoController::class)->group(function () {
    Route::get('pedidos', 'index')->name('pedidos.index')->middleware('acceso.administrador');
    /*Route::get('pedidos/create', 'create')->name('pedidos.create');*/
    Route::post('pedidos', 'store')->name('pedidos.store')->middleware('acceso.administrador');
    /*Route::post('pedidos', 'carrito')->name('pedidos.carrito');*/
    
    // esta ruta se usa para que los cliente vean su pedido
    //Route::get('pedidos/{pedido}', 'show')->name('pedidos.show');

    Route::get('pedidos/{pedido}/edit', 'edit')->name('pedidos.edit')->middleware('acceso.administrador');
    Route::put('pedidos/{pedido}', 'update')->name('pedidos.update')->middleware('acceso.administrador');
    Route::delete('pedidos/{pedido}', 'destroy')->name('pedidos.destroy')->middleware('acceso.administrador');
    //Route::get('realizar_pago/{pedido}', 'realizarPago')->name('realizar_pago');
});
// esta ruta devuelve la interfase para trabajar el reparto 
Route::get('reparto', [PedidoController::class ,'reparto'])->name('reparto')->middleware('acceso.administrador');
Route::get('confirmar_cancelacion_de_pedido/{pedido}', [PedidoController::class, 'confirmar_cancelacion_de_pedido'])->name('confirmar_cancelacion_de_pedido');
// esta ruta se usa para que los cliente cancelen su pedido
Route::get('cancelar_pedido/{pedido}', [PedidoController::class, 'cancelar_pedido'])->name('cancelar_pedido');




/*
|--------------------------------------------------------------------------
| usuarios
|--------------------------------------------------------------------------
| La ruta de pedidos es administrada por el controlador 
| PedidoController, ya que debe cumplir con la funciones 
| de CRUD para pedidos. 
*/
Route::controller(UsuarioController::class)->group(function () {
    Route::get('usuarios', 'index')->name('usuarios.index')->middleware('acceso.administrador');
    /*Route::get('usuarios/create', 'create')->name('usuarios.create');*/
    //Route::post('usuarios', 'store')->name('usuarios.store')->middleware('acceso.administrador');
    /*Route::post('usuarios', 'carrito')->name('usuarios.carrito');*/
    
    // esta ruta se usa para que los cliente vean su usuario
    //Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');

    Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit')->middleware('acceso.administrador');
    //Route::put('usuarios/{usuario}', 'update')->name('usuarios.update')->middleware('acceso.administrador');
    //Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy')->middleware('acceso.administrador');
    //Route::get('realizar_pago/{usuario}', 'realizarPago')->name('realizar_pago');
});
// esta ruta devuelve la interfase para trabajar el reparto 
//Route::get('reparto', [usuarioController::class ,'reparto'])->name('reparto')->middleware('acceso.administrador');
//Route::get('confirmar_cancelacion_de_usuario/{usuario}', [usuarioController::class, 'confirmar_cancelacion_de_usuario'])->name('confirmar_cancelacion_de_usuario');
// esta ruta se usa para que los cliente cancelen su usuario
//Route::get('cancelar_usuario/{usuario}', [usuarioController::class, 'cancelar_usuario'])->name('cancelar_usuario');




/*
|--------------------------------------------------------------------------
| PAGOS
|--------------------------------------------------------------------------
| 
| 
*/
//recalcula los datos del carrito y si los datos de costos son correctos redirige a la ruta de realizar pago 
Route::post('verificar_carrito', [MiCarritoController::class ,'verificar_carrito'])->name('verificar_carrito');

// esta ruta verifica el estatus del pedido y nos lleva a la vista con las opciones de pago
Route::get('/realizar_pago/{pedido}', [PagosController::class, 'realizarPago'])->name('realizar_pago');

//
Route::get('/pagos/{pedido}/mercadopago', [PagosController::class, 'mercadopago'])->name('pagos.mercadopago');
//Route::get('/pagos/{pedido}', [PedidoController::class, 'mostrarPago'])->name('mostrar_pago');

//
Route::put('pagos/{pedido}', [PagosController::class ,'pagar_al_recibir'])->name('pagos.pagar_al_recibir');

// esta ruta se usa para que los cliente cancelen su pedido
Route::delete('eliminar_mi_pedido/{pedido}', [PagosController::class, 'eliminar_mi_pedido'])->name('eliminar_mi_pedido');

// esta ruta se usa para que los cliente vean su pedido
Route::get('ver_pedido/{pedido}', [PedidoController::class, 'show'])->name('ver_pedido');


//
Route::post('/webhooks', WebhooksController::class); 




/*
|--------------------------------------------------------------------------
| CONTACTO 
|--------------------------------------------------------------------------
| esta ruta es exclusiva para recivir el formulario de contacto
| 
*/
Route::post('contacto', [ComentarioController::class, 'formulario_de_contacto'])->name('formulario_de_contacto'); 



/*
|--------------------------------------------------------------------------
| Comentarios
|--------------------------------------------------------------------------
| La ruta de comentarios es administrada por el controlador
| ComentarioController.
*/
Route::get('comentarios', [ComentarioController::class, 'index'])->name('comentarios')->middleware('acceso.administrador');
/* rutas para el crud de comentarios */
Route::controller(ComentarioController::class)->group(function () {
    Route::get('comentarios', 'index')->name('comentarios.index')->middleware('acceso.administrador');
    //Route::get('comentarios/create', 'create')->name('comentarios.create')->middleware('acceso.administrador');
    //Route::post('comentarios', 'store')->name('comentarios.store')->middleware('acceso.administrador');
    //Route::get('comentarios/{comentario}', 'show')->name('comentarios.show');
    Route::get('comentarios/{comentario}/edit', 'edit')->name('comentarios.edit')->middleware('acceso.administrador');
    Route::put('comentarios/{comentario}', 'update')->name('comentarios.update')->middleware('acceso.administrador');
    //Route::delete('comentarios/{comentario}', 'destroy')->name('comentarios.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| banner
|--------------------------------------------------------------------------
| La ruta banner es administrada por el controlador 
| BannerController, ya que debe cumplir con la funciones 
| de CRUD para los elementos del banner de novedades.
| Utiliza el middleware 'administrador' que permite 
| que los usuarios con dicho rol creen y editen los elementos
*/
//Route::get('/', BannerController::class)->name('banner');
Route::controller(BannerController::class)->group(function () {
    Route::get('banner', 'index')->name('banner.index')->middleware('acceso.administrador');
    //Route::get('banner/create', 'create')->name('banner.create')->middleware('acceso.administrador');
    Route::post('banner', 'store')->name('banner.store')->middleware('acceso.administrador');
    //Route::get('banner/{imagen}', 'show')->name('banner.show');
    //Route::get('banner/{imagen}/edit', 'edit')->name('banner.edit')->middleware('acceso.administrador');
    Route::put('banner/{imagen}', 'update')->name('banner.update')->middleware('acceso.administrador');
    Route::delete('banner/{imagen}', 'destroy')->name('banner.destroy')->middleware('acceso.administrador');
});




/*
|--------------------------------------------------------------------------
| mi_perfil
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/mi_perfil', [MiPerfilController::class, 'mi_perfil'])->name('mi_perfil')->middleware('auth')->middleware('verified');
/*Route::get('/mi_perfil', function () {
    return view('mi_perfil');
    //return "mi_perfil";
})->name('mi_perfil')->middleware('auth');*/




/*
|--------------------------------------------------------------------------
| nosotros
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
/*Route::get('/email_gracias_por_suscribirte', function () {

    //obtengo la primer suscripcion de la base de datos y la guardo en la variable $suscripcion
    $suscripcion = Suscripcion::first();

    return view('emails.gracias_por_suscribirte')->with('suscripcion', $suscripcion);
    //return "nosotros";
})->name('email');*/




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //return view('dashboard');
        return redirect('/');
    })->name('dashboard');
});




/* 
|--------------------------------------------------------------------------
| storage_link
|--------------------------------------------------------------------------
| Ruta para ejecutar el comando que resuelve el problema 
| del enjace simbolico (no encuentra las imagenes).
| En la consola se veria asi -> php artisan storage:link
| Puede matenerse desactivada ya que esta resuelto el problema
*/
/*Route::get('/storage_link', function () {
    Artisan::call('storage:link');
    dd(Artisan::output());
    // /home/u297868560/domains/macanudonoqueso.com/macanudonoqueso
    //symlink('/home/u297868560/domains/alimentosmacanudo.com/macanudonoqueso/storage/app/public', '/home/u297868560/domains/alimentosmacanudo.com/public_html/storage');
    //return view('home');
});*/




/* 
|--------------------------------------------------------------------------
| artisan
|--------------------------------------------------------------------------
| Esta ruta se usa para ejecutar comandos artisan desde la web,
| mayormente para ejecutar las migraciones en produccion
| En produccion se debe desactivar despues de usar
| La ruta para ejecutar las migraciones debe verse 
| asi -> https://www.macanudonoqueso.com/artisan/migrate
| Como medida extra de seguridad, utiliza el middelware 'administrador'
*/
Route::get('/artisan/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
    //return Artisan::output();
})->middleware('acceso.administrador');




/*
|--------------------------------------------------------------------------
| welcome
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
/*Route::get('/welcome', function () {
    return view('welcome');
    //return "welcome";
})->name('welcome');*/




/*
|--------------------------------------------------------------------------
| dashboard
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect('/');
    //return "dashboard";
})->name('dashboard')->middleware('acceso.administrador');




/*
|--------------------------------------------------------------------------
| cerrar_sesion
|--------------------------------------------------------------------------
| Esta ruta no devuelve ninguna vista. 
| Simplemente, ejecuta las acciones para cerrar la sesión
*/
Route::get('/cerrar_sesion', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('cerrar_sesion');