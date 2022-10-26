<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CostoDeEnvioController;
use App\Http\Controllers\CanastaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
    Route::get('productos', 'index')->name('productos.index');
    /*Route::get('productos/create', 'create')->name('productos.create')->middleware('administrador');*/
    Route::post('productos', 'store')->name('productos.store');
    /*Route::get('productos/{producto}', 'show')->name('productos.show')->middleware('administrador');*/
    Route::get('productos/{producto}/edit', 'edit')->name('productos.edit');
    Route::put('productos/{producto}', 'update')->name('productos.update');
    Route::delete('productos/{producto}', 'destroy')->name('productos.destroy');
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
    Route::get('cupones', 'index')->name('cupones.index');
    /*Route::get('cupones/create', 'create')->name('cupones.create')->middleware('administrador');*/
    Route::post('cupones', 'store')->name('cupones.store');
    /*Route::get('cupones/{cupon}', 'show')->name('cupones.show')->middleware('administrador');*/
    Route::get('cupones/{cupon}/edit', 'edit')->name('cupones.edit');
    Route::put('cupones/{cupon}', 'update')->name('cupones.update');
    Route::delete('cupones/{cupon}', 'destroy')->name('cupones.destroy');
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
    Route::get('costos_de_envio', 'index')->name('costos_de_envio.index');
    /*Route::get('costos_de_envio/create', 'create')->name('costos_de_envio.create')->middleware('administrador');*/
    Route::post('costos_de_envio', 'store')->name('costos_de_envio.store');
    /*Route::get('costos_de_envio/{costo_de_envio}', 'show')->name('costos_de_envio.show')->middleware('administrador');*/
    Route::get('costos_de_envio/{costo_de_envio}/edit', 'edit')->name('costos_de_envio.edit');
    Route::put('costos_de_envio/{costo_de_envio}', 'update')->name('costos_de_envio.update');
    Route::delete('costos_de_envio/{costo_de_envio}', 'destroy')->name('costos_de_envio.destroy');
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
    Route::get('canastas', 'index')->name('canastas.index');
    /*Route::get('canastas/create', 'create')->name('canastas.create')->middleware('administrador');*/
    Route::post('canastas', 'store')->name('canastas.store');
    /*Route::get('canastas/{canasta}', 'show')->name('canastas.show')->middleware('administrador');*/
    Route::get('canastas/{canasta}/edit', 'edit')->name('canastas.edit');
    Route::put('canastas/{canasta}', 'update')->name('canastas.update');
    Route::delete('canastas/{canasta}', 'destroy')->name('canastas.destroy');
});




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
    //symlink('/home/u520718481/domains/casaraiz.uy/casaraiz/storage/app/public', '/home/u520718481/domains/casaraiz.uy/public_html/storage');
    //return view('casa_raiz');
});
