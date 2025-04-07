<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarpetaController;

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de oficinas (Resource Controller) - Solo accesible por administradores
Route::resource('oficinas', OficinaController::class)
    ->middleware('role:admin');  // Solo accesible por administradores

// Rutas de usuarios (Resource Controller) - Solo accesible por administradores
Route::resource('usuarios', UsuarioController::class)
    ->middleware('role:admin');  // Solo accesible por administradores

// Rutas de menús (Resource Controller) - Solo accesible por administradores
Route::resource('menus', MenuController::class)
    ->middleware('role:admin');  // Solo accesible por administradores

// Rutas de carpetas (Resource Controller) - Solo accesible por administradores
Route::resource('carpetas', CarpetaController::class)
    ->middleware('role:admin');  // Solo accesible por administradores

// Rutas de autenticación (generadas por Laravel UI)
Auth::routes();

// Ruta del dashboard después de login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas del dashboard de administración - Solo accesible por administradores
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('role:admin');  // Solo accesible por administradores

// Ruta para ver usuarios en el dashboard de administración - Solo accesible por administradores
Route::get('/admin/users', function () {
    $users = App\Models\User::all(); // Obtener todos los usuarios
    return view('admin.users', compact('users'));
})->middleware('role:admin');  // Solo accesible por administradores

// Rutas de documentos (internos, externos, compartidos) con autenticación
Route::prefix('documentos')->name('documentos.')->middleware('auth')->group(function () {
    // Rutas para documentos internos - Permiso para ver documentos internos
    Route::get('internos', [DocumentoController::class, 'internos'])->name('internos.index')
        ->middleware('permission:view documents'); // Permiso para ver documentos internos
    
    // Rutas para documentos externos - Permiso para ver documentos externos
    Route::get('externos', [DocumentoController::class, 'externos'])->name('externos.index')
        ->middleware('permission:view documents'); // Permiso para ver documentos externos
    
    // Rutas para documentos compartidos - Permiso para ver documentos compartidos
    Route::get('compartidos', [DocumentoController::class, 'compartidos'])->name('compartidos.index')
        ->middleware('permission:view documents'); // Permiso para ver documentos compartidos

    // Ruta para la creación de documentos - Permiso para crear documentos
    Route::get('create', [DocumentoController::class, 'create'])->name('documentos.create')
        ->middleware('permission:create documents');  // Permiso para crear documentos
});

// Rutas generales de documentos (sin excluir la ruta 'create') - Permiso para gestionar documentos
Route::get('internos', [DocumentoController::class, 'internos'])->name('internos.index')
    ->middleware('permission:view documents');  // Usar 'permission' tal cual
