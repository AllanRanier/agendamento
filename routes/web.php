<?php

use App\Http\Controllers\Admin\{
    AgendaController,
    GrupoController,
    UsuarioController,
};

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('admin')->group(function () {

    Route::prefix('usuarios')->group(function () {
        Route::get('index', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('create', [UsuarioController::class, 'create'])->name('usuarios.create');
        Route::post('store', [UsuarioController::class, 'store'])->name('usuarios.store');
        Route::get('edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::post('update/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
        Route::get('destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
        Route::get('search', [UsuarioController::class, 'search'])->name('usuarios.search');
    });

    Route::prefix('grupos')->group(function () {
        Route::get('index', [GrupoController::class, 'index'])->name('grupos.index');
        Route::get('create', [GrupoController::class, 'create'])->name('grupos.create');
        Route::post('store', [GrupoController::class, 'store'])->name('grupos.store');
        Route::get('edit/{id}', [GrupoController::class, 'edit'])->name('grupos.edit');
        Route::post('update/{id}', [GrupoController::class, 'update'])->name('grupos.update');
        Route::get('destroy/{id}', [GrupoController::class, 'destroy'])->name('grupos.destroy');
        Route::get('search', [GrupoController::class, 'search'])->name('grupos.search');
    });

    Route::prefix('agendas')->group(function () {
        Route::get('index', [AgendaController::class, 'index'])->name('agendas.index');
        Route::get('create', [AgendaController::class, 'create'])->name('agendas.create');
        Route::post('store', [AgendaController::class, 'store'])->name('agendas.store');
        Route::get('edit/{id}', [AgendaController::class, 'edit'])->name('agendas.edit');
        Route::post('update/{id}', [AgendaController::class, 'update'])->name('agendas.update');
        Route::get('destroy/{id}', [AgendaController::class, 'destroy'])->name('agendas.destroy');
        Route::get('search', [AgendaController::class, 'search'])->name('agendas.search');
    });
});
