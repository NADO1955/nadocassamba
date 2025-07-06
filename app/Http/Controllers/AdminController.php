<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utente;
use App\Models\Marcacao;
use App\Models\Clinico;
use App\Models\Especialidade;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // ==== Gestão de Utentes ====

    public function listarUtentes()
    {
        $utentes = Utente::paginate(10);
        return view('admin.utentes.index', compact('utentes'));
    }

    public function verDashboard($id)
    {
        $utente = Utente::findOrFail($id);
        return view('admin.utentes.dashboard', compact('utente'));
    }

    public function verRCU($id)
    {
        $utente = Utente::findOrFail($id);
        return view('utente.rcu', compact('utente'));
    }

    public function verMarcacoes($id)
    {
        $utente = Utente::findOrFail($id);
        $marcacoes = $utente->marcacoes;
        return view('utente.marcacoes', compact('utente', 'marcacoes'));
    }

    public function verMarcacaoDetalhes($id, $marcacao_id)
    {
        $utente = Utente::findOrFail($id);
        $marcacao = Marcacao::findOrFail($marcacao_id);
        return view('utente.marcacao_detalhes', compact('utente', 'marcacao'));
    }

    public function editarUtente($id)
    {
        $utente = Utente::findOrFail($id);
        return view('admin.utentes.edit', compact('utente'));
    }

    public function atualizarUtente(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'numero_documento' => 'nullable|string|max:15',
            'email' => 'required|email|unique:utentes,email,' . $id,
            'telefone' => 'nullable|string|max:15',
            'ativo' => 'required|boolean',
        ]);

        try {
            $utente = Utente::findOrFail($id);
            $utente->update($request->only(['nome', 'numero_documento', 'email', 'telefone', 'ativo']));
            return redirect()->route('admin.utentes.index')->with('success', 'Utente atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao atualizar utente: ' . $e->getMessage());
        }
    }

    public function desativarUtente($id)
    {
        try {
            $utente = Utente::findOrFail($id);
            if (!$utente->ativo) {
                return back()->with('error', 'Este utente já está desativado.');
            }

            DB::transaction(function () use ($utente) {
                $utente->ativo = false;
                $utente->save();
            });

            return redirect()->route('admin.utentes.index')->with('success', 'Utente desativado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao desativar utente: ' . $e->getMessage());
        }
    }

    public function ativarUtente($id)
    {
        try {
            $utente = Utente::findOrFail($id);
            if ($utente->ativo) {
                return back()->with('error', 'Este utente já está ativado.');
            }

            DB::transaction(function () use ($utente) {
                $utente->ativo = true;
                $utente->save();
            });

            return redirect()->route('admin.utentes.index')->with('success', 'Utente ativado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao ativar utente: ' . $e->getMessage());
        }
    }

    public function deletarUtente($id)
    {
        try {
            DB::transaction(function () use ($id) {
                Marcacao::where('utente_id', $id)->delete();
                Utente::findOrFail($id)->delete();
            });

            return redirect()->route('admin.utentes.index')->with('success', 'Utente deletado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao deletar utente: ' . $e->getMessage());
        }
    }

    // ==== Gestão de Clínicos ====

    public function listarClinicos()
    {
        $clinicos = Clinico::with('especialidade')->paginate(10);
        $especialidades = Especialidade::all();
        return view('admin.clinicos.index', compact('clinicos', 'especialidades'));
    }

    public function criarClinico()
    {
        $especialidades = Especialidade::all();
        return view('admin.clinicos.criar', compact('especialidades'));
    }

    public function salvarClinico(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clinicos,email',
            'telefone' => 'nullable|string|max:20',
            'especialidade_id' => 'required|exists:especialidades,id',
            'password' => 'required|string|min:6',
            'ativo' => 'required|in:0,1',
        ]);

        try {
            Clinico::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'especialidade_id' => $request->especialidade_id,
                'password' => Hash::make($request->password),
                'ativo' => $request->ativo,
            ]);

            return redirect()->route('admin.clinicos.index')->with('success', 'Clínico registado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao registar clínico: ' . $e->getMessage());
        }
    }

    public function editarClinico($id)
    {
        $clinico = Clinico::findOrFail($id);
        $especialidades = Especialidade::all();
        return view('admin.clinicos.editar', compact('clinico', 'especialidades'));
    }

    public function atualizarClinico(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clinicos,email,' . $id,
            'telefone' => 'nullable|string|max:20',
            'ativo' => 'required|in:0,1',
            'especialidade_id' => 'required|exists:especialidades,id',
        ]);

        try {
            $clinico = Clinico::findOrFail($id);
            $clinico->update($request->only(['nome', 'email', 'telefone', 'ativo', 'especialidade_id']));
            return redirect()->route('admin.clinicos.index')->with('success', 'Dados do clínico atualizados com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar clínico: ' . $e->getMessage());
        }
    }

    public function deletarClinico($id)
    {
        try {
            DB::transaction(function () use ($id) {
                Marcacao::where('medico_id', $id)->delete();
                Clinico::findOrFail($id)->delete();
            });

            return redirect()->route('admin.clinicos.index')->with('success', 'Clínico deletado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao deletar clínico: ' . $e->getMessage());
        }
    }

    public function editarEspecialidade($id)
    {
        $clinico = Clinico::findOrFail($id);
        $especialidades = Especialidade::all();
        return view('admin.clinicos.especialidade', compact('clinico', 'especialidades'));
    }

    public function salvarEspecialidade(Request $request, $id)
    {
        $request->validate([
            'especialidade_id' => 'required|exists:especialidades,id',
        ]);

        try {
            $clinico = Clinico::findOrFail($id);
            $clinico->especialidade_id = $request->especialidade_id;
            $clinico->save();

            return redirect()->route('admin.clinicos.index')->with('success', 'Especialidade atribuída com sucesso!');
        } catch (Exception $e) {
            return redirect()->route('admin.clinicos.index')->with('error', 'Erro ao atribuir especialidade: ' . $e->getMessage());
        }
    }

    public function listarHorarios()
    {
        $horarios = Horario::with('clinico.especialidade')->paginate(10);
        return view('admin.clinicos.lista_horarios', compact('horarios'));
    }

    public function editarHorarios($id)
    {
        $clinico = Clinico::findOrFail($id);

        if (!empty($clinico->data_inicio) && !($clinico->data_inicio instanceof \Carbon\Carbon)) {
            $clinico->data_inicio = Carbon::parse($clinico->data_inicio)->format('Y-m-d');
        }

        if (!empty($clinico->hora_inicio) && !($clinico->hora_inicio instanceof \Carbon\Carbon)) {
            $clinico->hora_inicio = Carbon::parse($clinico->hora_inicio)->format('H:i');
        }

        return view('admin.clinicos.editar_horarios', compact('clinico'));
    }

    public function salvarHorarios(Request $request, $id)
    {
        $request->validate([
            'data_inicio' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
        ]);

        try {
            $clinico = Clinico::findOrFail($id);
            $dataInicio = Carbon::parse($request->data_inicio);
            $hoje = Carbon::now();
            $limite = $hoje->copy()->addMonth();

            if ($dataInicio->gt($limite)) {
                return back()->withInput()->with('error', 'Só pode alterar o horário com até 1 mês de antecedência.');
            }

            $temMarcacoes = Marcacao::where('medico_id', $id)
                ->whereBetween('data', [$hoje->format('Y-m-d'), $dataInicio->format('Y-m-d')])
                ->exists();

            if ($temMarcacoes) {
                return back()->withInput()->with('error', 'Existem consultas marcadas neste período.');
            }

            $clinico->update([
                'data_inicio' => $dataInicio,
                'hora_inicio' => $request->hora_inicio,
            ]);

            return redirect()->route('admin.clinicos.editar_horarios', $id)->with('success', 'Horário atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar horário: ' . $e->getMessage());
        }
    }

    // ==== Gestão de Marcações ====

    public function listarMarcacoes()
    {
        $marcacoes = Marcacao::with(['utente', 'clinico'])->latest()->paginate(10);
        return view('admin.marcacoes.index', compact('marcacoes'));
    }

    public function verMarcacao($id)
    {
        $marcacao = Marcacao::with(['utente', 'clinico'])->findOrFail($id);
        return view('admin.marcacoes.show', compact('marcacao'));
    }

    public function editarMarcacao($id)
    {
        $marcacao = Marcacao::findOrFail($id);
        $utentes = Utente::all();
        $clinicos = Clinico::all();
        return view('admin.marcacoes.edit', compact('marcacao', 'utentes', 'clinicos'));
    }

    public function atualizarMarcacao(Request $request, $id)
    {
        $request->validate([
            'utente_id' => 'required|exists:utentes,id',
            'medico_id' => 'required|exists:clinicos,id',
            'data' => 'required|date',
        ]);

        try {
            $marcacao = Marcacao::findOrFail($id);
            $marcacao->update($request->only(['utente_id', 'medico_id', 'data']));
            return redirect()->route('admin.marcacoes.index')->with('success', 'Marcação atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar marcação: ' . $e->getMessage());
        }
    }

    public function deletarMarcacao($id)
    {
        try {
            Marcacao::findOrFail($id)->delete();
            return redirect()->route('admin.marcacoes.index')->with('success', 'Marcação cancelada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao cancelar marcação: ' . $e->getMessage());
        }
    }

    // ==== Gestão de Especialidades ====

    public function listarEspecialidades()
    {
        $especialidades = Especialidade::paginate(10);
        return view('admin.especialidades.index', compact('especialidades'));
    }

    public function criarEspecialidade()
    {
        return view('admin.especialidades.criar');
    }

    public function salvarEspecialidadeCRUD(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:especialidades,nome',
        ]);

        try {
            Especialidade::create(['nome' => $request->nome]);
            return redirect()->route('admin.especialidades.index')->with('success', 'Especialidade criada com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao criar especialidade: ' . $e->getMessage());
        }
    }

    public function editarEspecialidadeCRUD($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('admin.especialidades.editar', compact('especialidade'));
    }

    public function atualizarEspecialidade(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:especialidades,nome,' . $id,
        ]);

        try {
            $especialidade = Especialidade::findOrFail($id);
            $especialidade->update(['nome' => $request->nome]);
            return redirect()->route('admin.especialidades.index')->with('success', 'Especialidade atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar especialidade: ' . $e->getMessage());
        }
    }

    public function deletarEspecialidade($id)
    {
        try {
            $especialidade = Especialidade::findOrFail($id);
            $especialidade->delete();
            return redirect()->route('admin.especialidades.index')->with('success', 'Especialidade eliminada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao eliminar especialidade: ' . $e->getMessage());
        }
    }
}







