<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Mostra o formulário de registo de utente.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Processa o registo do utente.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:utentes,email',
            'telefone'  => 'nullable|string|max:20',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        $utente = Utente::create([
            'nome'     => $request->nome,
            'email'    => $request->email,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('utente')->login($utente);

        return redirect()->route('utente.dashboard')->with('success', 'Registo feito com sucesso!');
    }
}
