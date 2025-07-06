<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Clinico;
use App\Models\Horario;
use App\Models\Marcacao;
use App\Models\RCU;
use Carbon\Carbon;

class ClinicoController extends Controller
{
    public function dashboard()
    {
        $clinico = Auth::guard('clinico')->user();
        return view('clinico.dashboard', compact('clinico'));
    }

    public function perfil()
    {
        $clinico = Auth::guard('clinico')->user();
        return view('clinico.perfil', compact('clinico'));
    }

    public function atualizarPerfil(Request $request)
    {
        $clinico = Auth::guard('clinico')->user();

        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $clinico->nome = $request->input('nome');
        $clinico->telefone = $request->input('telefone');

        if ($request->filled('password')) {
            $clinico->password = Hash::make($request->input('password'));
        }

        $clinico->save();

        return back()->with('success', 'Os dados do perfil foram actualizados com sucesso.');
    }

    public function editarHorario()
    {
        $clinico = Auth::guard('clinico')->user();
        $horarios = DB::table('horarios')->where('clinico_id', $clinico->id)->first();

        return view('clinico.horarios', compact('clinico', 'horarios'));
    }

    public function salvarHorario(Request $request)
    {
        $clinico = Auth::guard('clinico')->user();

        $request->validate([
            'data_inicio'     => 'required|date',
            'data_fim'        => 'required|date|after_or_equal:data_inicio',
            'dias_semana'     => 'required|array',
            'horario_inicio'  => 'required',
            'horario_fim'     => 'required|after:horario_inicio',
        ]);

        $novaData = Carbon::parse($request->input('data_inicio'));
        $hojeMaisUmMes = Carbon::now()->addMonth();

        if ($novaData->lt($hojeMaisUmMes)) {
            return back()->withErrors([
                'erro' => 'A alteração do horário só é permitida com pelo menos 1 mês de antecedência.',
            ]);
        }

        $existeMarcacao = Marcacao::where('clinico_id', $clinico->id)
            ->where('data', '>=', Carbon::now())
            ->exists();

        if ($existeMarcacao) {
            return back()->withErrors([
                'erro' => 'Existem marcações futuras associadas a este clínico. Não é possível alterar o horário neste momento.',
            ]);
        }

        DB::table('horarios')->updateOrInsert(
            ['clinico_id' => $clinico->id],
            [
                'data_inicio'     => $request->input('data_inicio'),
                'data_fim'        => $request->input('data_fim'),
                'dias_semana'     => json_encode($request->input('dias_semana')),
                'horario_inicio'  => $request->input('horario_inicio'),
                'horario_fim'     => $request->input('horario_fim'),
                'updated_at'      => now(),
                'created_at'      => now(),
            ]
        );

        return back()->with('success', 'Horário actualizado com sucesso.');
    }

    public function listarRCU()
    {
        $rcus = RCU::with('utente:id,nome')->get();
        return view('clinico.rcu.index', compact('rcus'));
    }

    public function editarRCU($utente_id)
    {
        $rcu = RCU::where('utente_id', $utente_id)->firstOrFail();
        return view('clinico.rcu.editar', compact('rcu'));
    }

    public function atualizarRCU(Request $request, $utente_id)
    {
        $rcu = RCU::where('utente_id', $utente_id)->firstOrFail();

        $request->validate([
            'diagnostico' => 'nullable|string',
            'tratamento'  => 'nullable|string',
            'prescricao'  => 'nullable|string',
        ]);

        $rcu->update([
            'diagnostico' => $request->input('diagnostico'),
            'tratamento'  => $request->input('tratamento'),
            'prescricao'  => $request->input('prescricao'),
        ]);

        return redirect()->route('clinico.rcu.index')->with('success', 'Registo Clínico actualizado com sucesso.');
    }

    public function verMarcacoes()
    {
        $clinico = Auth::guard('clinico')->user();

        $marcacoes = Marcacao::with(['utente:id,nome', 'especialidade:id,nome'])
            ->where('clinico_id', $clinico->id)
            ->orderBy('data', 'desc')
            ->get();

        return view('clinico.marcacoes.index', compact('marcacoes'));
    }
}
