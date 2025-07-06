<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtenteLoginController extends Controller
{
    /**
     * Mostra o formulário de login do utente.
     */
    public function showLoginForm()
    {
        return view('auth.login_utente');
    }

    /**
     * Processa o login do utente usando o guard 'utente'.
     */
    public function login(Request $request)
    {
        // Validação básica dos campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('utente')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('utente.dashboard');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput($request->only('email'));
    }

    /**
     * Termina a sessão do utente.
     */
    public function logout(Request $request)
    {
        Auth::guard('utente')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.utente')->with('success', 'Sessão terminada com sucesso.');
    }
}

