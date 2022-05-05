<?php

use App\Http\Controllers\Admin\{
    AgendaController,
    AgendamentoController,
    DashboardController,
    GrupoController,
    PacienteController,
    UsuarioController,
};
use App\Http\Controllers\FrontEnd\SiteController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [SiteController::class, 'index']);
Route::get('/agendamento/{id}', [SiteController::class, 'agendamento'])->name('site.agendamento');
Route::post('/agendamento/{id}/cadastrar', [SiteController::class, 'cadastrarAgendamento'])->name('site.cadastro');
Route::get('/agendamento/{id}/concluido', [SiteController::class, 'concluidoAgendamento'])->name('site.concluido');
Route::get('/agendamento/{id}/pdf', [SiteController::class, 'gerarPDF'])->name('pdf');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';



Route::prefix('admin')->group(function () {
    Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard');

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
    });

    Route::prefix('agendamentos')->group(function () {
        Route::get('index', [AgendamentoController::class, 'index'])->name('agendamentos.index');
        Route::get('create', [AgendamentoController::class, 'create'])->name('agendamentos.create');
        Route::post('store', [AgendamentoController::class, 'store'])->name('agendamentos.store');
        Route::get('edit/{id}', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
        Route::post('update/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
        Route::get('destroy/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');
        Route::get('search', [AgendamentoController::class, 'search'])->name('agendamentos.search');
    });

    Route::prefix('pacientes')->group(function () {
        Route::get('index', [PacienteController::class, 'index'])->name('pacientes.index');
        Route::get('create', [PacienteController::class, 'create'])->name('pacientes.create');
        Route::post('store', [PacienteController::class, 'store'])->name('pacientes.store');
        Route::get('edit/{id}', [PacienteController::class, 'edit'])->name('pacientes.edit');
        Route::post('update/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
        Route::get('destroy/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
        Route::get('search', [PacienteController::class, 'search'])->name('pacientes.search');
    });
});
