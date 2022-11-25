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
| club_del_noqueso
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/club_macanudo', ClubMacanudoController::class)->name('club_macanudo');
/*Route::get('/club_del_noqueso', function () {
    //return view('club_del_noqueso');
    return "club_del_noqueso";
})->name('club_del_noqueso');*/




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
    Route::get('blog', 'index')->name('blog.index')->middleware('mantenimiento');
    Route::get('blog/{post}', 'show')->name('blog.show')->middleware('mantenimiento');

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

// esta ruta se usa para que los cliente vean su pedido
Route::get('ver_pedido/{pedido}', [PedidoController::class, 'show'])->name('ver_pedido');

//
Route::post('webhooks', WebhooksController::class); 




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
| mi_perfil
|--------------------------------------------------------------------------
| Esta ruta solo devuelve una vista, por lo tanto no es 
| necesario utilizar un controlador.
*/
Route::get('/mi_perfil', function () {
    return view('mi_perfil');
    //return "mi_perfil";
})->name('mi_perfil')->middleware('auth');









Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
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
Route::get('/storage_link', function () {
    Artisan::call('storage:link');
    dd(Artisan::output());
    // /home/u297868560/domains/macanudonoqueso.com/macanudonoqueso
    //symlink('/home/u297868560/domains/macanudonoqueso.com/macanudonoqueso/storage/app/public', '/home/u297868560/domains/macanudonoqueso.com/public_html/storage');
    //return view('home');
});




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
    return view('dashboard');
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