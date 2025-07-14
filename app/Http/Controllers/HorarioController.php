<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Clinico;

class HorarioController extends Controller
{
    /**
     * Exibe a lista de horários.
     */
    public function index()
    {
        $horarios = Horario::with('clinico')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Mostra o formulário para criar um novo horário.
     */
    public function create()
    {
        $clinicos = Clinico::all();
        return view('admin.horarios.create', compact('clinicos'));
    }

    /**
     * Armazena um novo horário no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'clinico_id' => 'required|exists:clinicos,id',
            'data' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim' => 'required',
        ]);

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')->with('success', 'Horário criado com sucesso!');
    }

    /**
     * Exibe um horário específico.
     */
    public function show($id)
    {
        $horario = Horario::with('clinico')->findOrFail($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Mostra o formulário para editar um horário.
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $clinicos = Clinico::all();
        return view('admin.horarios.edit', compact('horario', 'clinicos'));
    }

    /**
     * Atualiza um horário no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'clinico_id' => 'required|exists:clinicos,id',
            'data' => 'required|date',
            'hora_inicio' => 'required',
            'hora_fim' => 'required',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->all());

        return redirect()->route('admin.horarios.index')->with('success', 'Horário atualizado com sucesso!');
    }

    /**
     * Remove um horário do banco de dados.
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('admin.horarios.index')->with('success', 'Horário removido com sucesso!');
    }
}
