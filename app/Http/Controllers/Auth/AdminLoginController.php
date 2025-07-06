<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Mostra o formulário de login do administrador.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Processa o login do administrador.
     */
    public function login(Request $request)
    {
        // Validação básica
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        // Tenta autenticar com o guard 'admin'
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        }

        // Caso falhe
        return back()->withErrors([
            'email' => 'E-mail ou palavra-passe inválidos.',
        ])->withInput($request->only('email'));
    }

    /**
     * Termina a sessão do administrador.
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.admin');
    }
}

