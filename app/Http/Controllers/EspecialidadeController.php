<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    public function index()
    {
        // Agora com paginação para permitir uso de ->links() na view
        $especialidades = Especialidade::paginate(10);
        return view('admin.especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('admin.especialidades.criar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Especialidade::create($request->only('nome'));

        return redirect()->route('admin.especialidades.index')
                         ->with('success', 'Especialidade criada com sucesso.');
    }

    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('admin.especialidades.editar', compact('especialidade'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $especialidade = Especialidade::findOrFail($id);
        $especialidade->update($request->only('nome'));

        return redirect()->route('admin.especialidades.index')
                         ->with('success', 'Especialidade atualizada com sucesso.');
    }

    public function destroy($id)
    {
        Especialidade::destroy($id);

        return redirect()->route('admin.especialidades.index')
                         ->with('success', 'Especialidade removida com sucesso.');
    }
}
