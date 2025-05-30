<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RegistroController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\LogController;

Route::get('/', function () {
    return view('landing_page'); 
})->name('inicio');

Route::post('/enviar-contacto', [ContactoController::class, 'enviar'])->name('enviar.contacto');

Route::get('/terminos', function () {
    return view('terminos');
})->name('terminos');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth')->name('perfil');

Route::get('/reset-password/{token}', function (string $token) {
    return view('recuperar_contra', ['token' => $token, 'email' => request('email')]);
})->name('password.reset');

Route::middleware(['auth', RoleMiddleware::class . ':administrador'])->group(function () {
    Route::get('/admindashboard', [AdminController::class, 'index'])->name('admindashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':usuario'])->group(function () {
    Route::get('/dashboard', [UsuarioController::class, 'dashboard'])->name('dashboard');
});

Route::get('/admindashboard', [AdminController::class, 'dashboard'])->name('admindashboard')->middleware('auth');
Route::post('/admin/usuarios/estado/{id}', [AdminController::class, 'cambiarEstadoUsuario'])->name('admin.cambiarEstadoUsuario');
Route::post('/admin/usuarios/{id}/cambiar-rol', [AdminController::class, 'cambiarRolUsuario'])->name('admin.cambiarRolUsuario');
Route::get('/v_usuarios', [AdminController::class, 'mostrarUsuarios'])->name('v_usuarios')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.eliminarUsuario');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/registro', [RegistroController::class, 'index']);
Route::post('/registro', [RegistroController::class, 'guardarRegistro'])->name('registro');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/perfil', [PerfilController::class, 'mostrar'])->name('perfil')->middleware('auth');
Route::post('/usuario/desactivar/{id}', [PerfilController::class, 'desactivar'])->name('usuario.desactivar');

Route::get('/configuracion', [UsuarioController::class, 'configuracion'])->name('configuracion')->middleware('auth');
Route::post('/configuracion.datos', [UsuarioController::class, 'actualizarConfiguracion'])->name('configuracion.datos');
Route::post('/configuracion', [UsuarioController::class, 'actualizarPassword'])->name('configuracion');

Route::get('/registrar-visita/{pagina}', [EstadisticasController::class, 'registrarVisita']);
Route::get('/contar-visitas', [EstadisticasController::class, 'contarVisitas'])->name('estadisticas')->middleware('auth');
Route::get('/grafica-usuarios', [EstadisticasController::class, 'graficaUsuarios'])->name('grafica-usuarios')->middleware('auth');
Route::get('/reporte-usuarios-excel', [EstadisticasController::class, 'exportarExcel'])->name('reporte.excel');
Route::get('/reporte-usuarios-pdf', [EstadisticasController::class, 'exportarPdf'])->name('reporte_usuarios_pdf');
Route::get('/filtrar-visitas', [EstadisticasController::class, 'filtrarVisitas'])->name('filtrar.visitas');


Route::get('/logs', [LogController::class, 'index'])->middleware('auth')->name('logs');



