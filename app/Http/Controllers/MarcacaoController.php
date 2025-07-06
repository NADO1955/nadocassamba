<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcacao;
use App\Models\Especialidade;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;

class MarcacaoController extends Controller
{
    public function create()
    {
        $especialidades = Especialidade::all();
        $medicos = Medico::all();

        return view('utente.marcacoes', compact('especialidades', 'medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'especialidade_id' => 'required|exists:especialidades,id',
            'medico_id'        => 'required|exists:medicos,id',
            'data'             => 'required|date|after_or_equal:today',
            'tipo'             => 'required|in:consulta,exame',
        ]);

        $utenteId = Auth::guard('utente')->id();
        if (!$utenteId) {
            return redirect()->route('login.utente')->withErrors('É necessário autenticar-se para realizar marcações.');
        }

        Marcacao::create([
            'utente_id'        => $utenteId,
            'especialidade_id' => $request->especialidade_id,
            'medico_id'        => $request->medico_id,
            'data'             => $request->data,
            'tipo'             => $request->tipo,
        ]);

        return redirect()->route('utente.marcacoes')->with('success', 'Marcação registada com sucesso!');
    }

    public function index()
    {
        $utenteId = Auth::guard('utente')->id();

        $marcacoes = Marcacao::where('utente_id', $utenteId)
            ->with(['especialidade', 'medico'])
            ->orderBy('data', 'desc')
            ->get();

        return view('utente.historico', compact('marcacoes'));
    }

    public function show($id)
    {
        $utenteId = Auth::guard('utente')->id();

        $marcacao = Marcacao::with(['especialidade', 'medico'])
            ->where('id', $id)
            ->where('utente_id', $utenteId)
            ->firstOrFail();

        return view('utente.marcacao_detalhes', compact('marcacao'));
    }

    public function destroy($id)
    {
        $utenteId = Auth::guard('utente')->id();

        $marcacao = Marcacao::where('id', $id)
            ->where('utente_id', $utenteId)
            ->firstOrFail();

        $marcacao->delete();

        return redirect()->route('utente.marcacoes.historico')->with('success', 'Marcação cancelada com sucesso.');
    }

    /**
     * Mostra o formulário para editar uma marcação.
     */
    public function edit($id)
    {
        $utenteId = Auth::guard('utente')->id();

        $marcacao = Marcacao::where('id', $id)
            ->where('utente_id', $utenteId)
            ->firstOrFail();

        $especialidades = Especialidade::all();
        $medicos = Medico::all();

        return view('utente.editar_marcacao', compact('marcacao', 'especialidades', 'medicos'));
    }

    /**
     * Atualiza uma marcação existente.
     */
    public function update(Request $request, $id)
    {
        $utenteId = Auth::guard('utente')->id();

        $marcacao = Marcacao::where('id', $id)
            ->where('utente_id', $utenteId)
            ->firstOrFail();

        $request->validate([
            'especialidade_id' => 'required|exists:especialidades,id',
            'medico_id'        => 'required|exists:medicos,id',
            'data'             => 'required|date|after_or_equal:today',
            'tipo'             => 'required|in:consulta,exame',
        ]);

        $marcacao->update([
            'especialidade_id' => $request->especialidade_id,
            'medico_id'        => $request->medico_id,
            'data'             => $request->data,
            'tipo'             => $request->tipo,
        ]);

        return redirect()->route('utente.marcacoes.historico')->with('success', 'Marcação atualizada com sucesso!');
    }
}



