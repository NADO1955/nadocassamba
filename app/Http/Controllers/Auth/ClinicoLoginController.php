<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinico;

class ClinicoLoginController extends Controller
{
    /**
     * Mostra o formulário de login do clínico.
     */
    public function showLoginForm()
    {
        // View localizada em: resources/views/clinico/login.blade.php
        return view('clinico.login');
    }

    /**
     * Processa o login do clínico.
     */
    public function login(Request $request)
    {
        // Validação básica dos campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verifica se o clínico existe e está ativo
        $clinico = Clinico::where('email', $request->email)->first();

        if (!$clinico || !$clinico->ativo) {
            return back()->withErrors([
                'email' => 'A conta não existe ou está desativada.',
            ])->withInput($request->only('email'));
        }

        // Autenticação
        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('clinico')->attempt($credenciais, $request->filled('remember'))) {
            // Proteção contra fixation
            $request->session()->regenerate();

            // Redireciona para o painel do clínico
            return redirect()->route('clinico.dashboard');
        }

        // Erro de credenciais inválidas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->withInput($request->only('email'));
    }

    /**
     * Termina a sessão do clínico.
     */
    public function logout(Request $request)
    {
        Auth::guard('clinico')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.clinico');
    }
}

