<?php

use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Usuarioscomponente;



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
})->name('welcome');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

//plantilla para modelos de grafico componentes
Route::get('/plantilla', function () {
    return view('plantilla');
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

Route::middleware(['auth:sanctum', 'verified'])->get('admin/categorias', function () {
    return view('admin/categorias');
})->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/productos', function () {
    return view('admin/productos');
})->name('productos');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/usuarios', function () {
    return view('admin/usuarios');
})->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/clientes', function () {
    return view('admin/clientes');
})->name('clientes');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/estadisticas', function () {
    return view('admin/estadisticas');
})->name('estadisticas');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/bancos', function () {
    return view('admin/bancos');
})->name('bancos');

Route::middleware(['auth:sanctum', 'verified'])->get('shop/detalles', function () {
    return view('shop/detalles');
})->name('detalles');

Route::middleware(['auth:sanctum', 'verified'])->get('shop/orden', function () {
    return view('shop/orden');
})->name('orden');

Route::get('/registro', function () {
    //$correo = new RegistroMailable;
    $mensajeCorreo = 'Por medio de este correo le damos la bienvenid@, puedes ingresar usando las siguientes credenciales: ';
    $name = 'Oliver Gomez';
    $email = 'kayserenrique@gmail.com';
    $password = '123456789';
    Mail::to('kayserenrique@gmail.com')->send(new RegistroMailable($mensajeCorreo, $name, $email, $password));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/telegram', Usuarioscomponente::class);