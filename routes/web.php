<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\UtenteLoginController;
use App\Http\Controllers\Auth\ClinicoLoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\UtenteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClinicoController;
use App\Http\Controllers\MarcacaoController;

// =================== PÁGINA INICIAL COM REDIRECIONAMENTO ===================
Route::get('/', function () {
    if (Auth::guard('utente')->check()) return redirect()->route('utente.dashboard');
    if (Auth::guard('admin')->check()) return redirect()->route('admin.dashboard');
    if (Auth::guard('clinico')->check()) return redirect()->route('clinico.dashboard');
    return view('index');
})->name('home');

// =================== LOGIN UNIVERSAL ===================
Route::get('/login', fn () => view('login'))->name('login');

// =================== LOGIN UTENTE ===================
Route::prefix('login/utente')->group(function () {
    Route::get('/', [UtenteLoginController::class, 'showLoginForm'])->name('login.utente');
    Route::post('/', [UtenteLoginController::class, 'login'])->name('login.utente.post');
});
Route::post('/logout/utente', [UtenteLoginController::class, 'logout'])->name('logout.utente');
Route::post('/utente/logout', [UtenteLoginController::class, 'logout'])->name('utente.logout');

// =================== LOGIN CLÍNICO ===================
Route::prefix('login/clinico')->group(function () {
    Route::get('/', [ClinicoLoginController::class, 'showLoginForm'])->name('login.clinico');
    Route::post('/', [ClinicoLoginController::class, 'login'])->name('clinico.login.post');
});
Route::post('/logout/clinico', [ClinicoLoginController::class, 'logout'])->name('logout.clinico');

// =================== LOGIN ADMIN ===================
Route::prefix('login/admin')->group(function () {
    Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
    Route::post('/', [AdminLoginController::class, 'login'])->name('login.admin.post');
});
Route::post('/logout/admin', [AdminLoginController::class, 'logout'])->name('logout.admin');

// =================== ÁREA ADMIN ===================
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Clínicos
    Route::get('clinicos', [AdminController::class, 'listarClinicos'])->name('admin.clinicos.index');
    Route::get('clinicos/criar', [AdminController::class, 'criarClinico'])->name('admin.clinicos.criar');
    Route::post('clinicos', [AdminController::class, 'salvarClinico'])->name('admin.clinicos.salvar');
    Route::get('clinicos/{id}/editar', [AdminController::class, 'editarClinico'])->name('admin.clinicos.editar');
    Route::put('clinicos/{id}', [AdminController::class, 'atualizarClinico'])->name('admin.clinicos.atualizar');
    Route::delete('clinicos/{id}', [AdminController::class, 'deletarClinico'])->name('admin.clinicos.deletar');
    Route::patch('clinicos/{id}/ativar', [AdminController::class, 'ativarClinico'])->name('admin.clinicos.ativar');
    Route::patch('clinicos/{id}/desativar', [AdminController::class, 'desativarClinico'])->name('admin.clinicos.desativar');

    // Horários
    Route::get('clinicos/{id}/horarios', [AdminController::class, 'editarHorarios'])->name('admin.clinicos.horarios');
    Route::post('clinicos/{id}/horarios', [AdminController::class, 'salvarHorarios'])->name('admin.clinicos.horarios.salvar');
    Route::get('horarios', [AdminController::class, 'listarHorarios'])->name('admin.horarios.index');

    // Especialidades
    Route::get('clinicos/{id}/especialidade', [AdminController::class, 'editarEspecialidade'])->name('admin.clinicos.especialidade');
    Route::post('clinicos/{id}/especialidade', [AdminController::class, 'salvarEspecialidade'])->name('admin.clinicos.especialidade.salvar');
    Route::get('especialidades', [AdminController::class, 'listarEspecialidades'])->name('admin.especialidades.index');
    Route::get('especialidades/criar', [AdminController::class, 'criarEspecialidade'])->name('admin.especialidades.criar');
    Route::post('especialidades', [AdminController::class, 'salvarEspecialidadeCRUD'])->name('admin.especialidades.salvar');
    Route::get('especialidades/{id}/editar', [AdminController::class, 'editarEspecialidadeCRUD'])->name('admin.especialidades.editar');
    Route::put('especialidades/{id}', [AdminController::class, 'atualizarEspecialidade'])->name('admin.especialidades.atualizar');
    Route::delete('especialidades/{id}', [AdminController::class, 'deletarEspecialidade'])->name('admin.especialidades.deletar');

    // Marcações
    Route::get('marcacoes', [AdminController::class, 'listarMarcacoes'])->name('admin.marcacoes.index');
    Route::get('marcacoes/{id}', [AdminController::class, 'verMarcacao'])->name('admin.marcacoes.show');
    Route::get('marcacoes/{id}/editar', [AdminController::class, 'editarMarcacao'])->name('admin.marcacoes.edit'); // ✅ CORRIGIDO
    Route::put('marcacoes/{id}', [AdminController::class, 'atualizarMarcacao'])->name('admin.marcacoes.atualizar');
    Route::delete('marcacoes/{id}', [AdminController::class, 'deletarMarcacao'])->name('admin.marcacoes.destroy');

    // Utentes
    Route::prefix('utentes')->name('admin.utentes.')->group(function () {
        Route::get('/', [AdminController::class, 'listarUtentes'])->name('index');
        Route::get('{id}/dashboard', [AdminController::class, 'verDashboard'])->name('dashboard');
        Route::get('{id}/rcu', [AdminController::class, 'verRCU'])->name('rcu');
        Route::get('{id}/marcacoes', [AdminController::class, 'verMarcacoes'])->name('marcacoes.index');
        Route::get('{id}/marcacoes/{marcacao_id}', [AdminController::class, 'verMarcacaoDetalhes'])->name('marcacoes.show');
        Route::get('{id}/editar', [AdminController::class, 'editarUtente'])->name('edit');
        Route::put('{id}', [AdminController::class, 'atualizarUtente'])->name('update');
        Route::post('{id}/desativar', [AdminController::class, 'desativarUtente'])->name('desativar');
        Route::post('{id}/ativar', [AdminController::class, 'ativarUtente'])->name('ativar');
        Route::delete('{id}', [AdminController::class, 'deletarUtente'])->name('destroy');
    });
});

// =================== ÁREA CLÍNICO ===================
Route::prefix('clinico')->middleware('auth:clinico')->group(function () {
    Route::get('/dashboard', [ClinicoController::class, 'dashboard'])->name('clinico.dashboard');
    Route::get('/perfil', [ClinicoController::class, 'perfil'])->name('clinico.perfil');
    Route::post('/perfil', [ClinicoController::class, 'atualizarPerfil'])->name('clinico.perfil.atualizar');
    Route::get('/horarios', [ClinicoController::class, 'editarHorario'])->name('clinico.horarios.editar');
    Route::post('/horarios', [ClinicoController::class, 'salvarHorario'])->name('clinico.horarios.salvar');
    Route::get('/marcacoes', [ClinicoController::class, 'verMarcacoes'])->name('clinico.marcacoes');
    Route::get('/rcu', [ClinicoController::class, 'listarRCU'])->name('clinico.rcu.index');
    Route::get('/rcu/{utente_id}', [ClinicoController::class, 'verRCU'])->name('clinico.rcu.ver');
    Route::get('/rcu/{utente_id}/editar', [ClinicoController::class, 'editarRCU'])->name('clinico.rcu.editar');
    Route::put('/rcu/{utente_id}', [ClinicoController::class, 'atualizarRCU'])->name('clinico.rcu.atualizar');
});

// =================== REGISTO UTENTE ===================
Route::get('/utente/registo', [UtenteController::class, 'create'])->name('utente.registo');
Route::post('/utente/registo', [UtenteController::class, 'store'])->name('utente.store');

// =================== ÁREA UTENTE ===================
Route::prefix('utente')->middleware('auth:utente')->group(function () {
    Route::get('/dashboard', [UtenteController::class, 'dashboard'])->name('utente.dashboard');
    Route::get('/rcu', [UtenteController::class, 'verRCU'])->name('utente.rcu');
    Route::get('/rcu/editar', [UtenteController::class, 'editarRCU'])->name('utente.rcu.editar');
    Route::post('/rcu', [UtenteController::class, 'atualizarRCU'])->name('utente.rcu.atualizar');

    Route::get('/marcacoes', [MarcacaoController::class, 'create'])->name('utente.marcacoes');
    Route::post('/marcacoes', [MarcacaoController::class, 'store'])->name('utente.marcacoes.store');
    Route::get('/marcacoes/{id}', [MarcacaoController::class, 'show'])->name('utente.marcacoes.ver');
    Route::get('/marcacoes/{id}/editar', [MarcacaoController::class, 'edit'])->name('utente.marcacoes.editar');
    Route::put('/marcacoes/{id}', [MarcacaoController::class, 'update'])->name('utente.marcacoes.atualizar');
    Route::delete('/marcacoes/{id}', [MarcacaoController::class, 'destroy'])->name('utente.marcacoes.cancelar');
    Route::get('/historico', [MarcacaoController::class, 'index'])->name('utente.marcacoes.historico');

    Route::get('/disponiveis', [UtenteController::class, 'verDisponiveis'])->name('utente.disponiveis');
});
// Horários
Route::get('clinicos/{id}/horarios', [AdminController::class, 'editarHorarios'])->name('admin.clinicos.editar_horarios'); // <- Nome corrigido
Route::post('clinicos/{id}/horarios', [AdminController::class, 'salvarHorarios'])->name('admin.clinicos.editar_horarios.salvar');

// =================== PÁGINAS PÚBLICAS ===================
Route::view('/servicos', 'servicos')->name('site.servicos');
Route::view('/utentes', 'utentes')->name('site.utentes');
Route::view('/consultas', 'consultas')->name('site.consultas');
Route::view('/contacto', 'contacto')->name('site.contacto');
Route::view('/sobre', 'sobre')->name('site.sobre');
Route::view('/politica', 'politica')->name('site.politica');
Route::post('/contacto', function (Request $request) {
    return back()->with('success', 'Mensagem enviada com sucesso!');
})->name('site.contacto.enviar');

// =================== LOGOUT UNIVERSAL ===================
Route::post('/logout', function () {
    foreach (['utente', 'admin', 'clinico'] as $guard) {
        if (Auth::guard($guard)->check()) {
            Auth::guard($guard)->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route("login.$guard");
        }
    }

    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');












