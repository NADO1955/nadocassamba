<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utente;
use App\Models\Marcacao;
use App\Models\Especialidade;
use App\Models\Medico;
use Carbon\Carbon;

class UtenteController extends Controller
{
    /**
     * Painel do utente
     */
    public function dashboard()
    {
        return view('utente.dashboard');
    }

    /**
     * Formulário de registo do utente
     */
    public function create()
    {
        return view('utente.registo');
    }

    /**
     * Guardar novo utente
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'                    => 'required|string|max:255',
            'email'                   => 'required|email|unique:utentes,email',
            'telefone'                => 'nullable|string|max:20',
            'data_nascimento'         => 'nullable|date',
            'genero'                  => 'nullable|in:Masculino,Feminino,Outro',
            'endereco'                => 'nullable|string|max:255',
            'documento_identificacao' => 'required|string|in:BI,Passaporte',
            'numero_documento'        => 'required|string|max:50|unique:utentes,numero_documento',
            'entidade_financeira'     => 'nullable|string|max:255',
            'numero_utente_entidade'  => 'nullable|string|max:255',
            'historia_familiar'       => 'nullable|string|max:1000',
            'boletim_vacinas'         => 'nullable|string|max:1000',
            'observacoes'             => 'nullable|string|max:1000',
            'password'                => 'required|string|min:6|confirmed',
        ]);

        // Criar utente
        $utente = Utente::create([
            'nome'                    => $request->nome,
            'email'                   => $request->email,
            'telefone'                => $request->telefone,
            'data_nascimento'         => $request->data_nascimento,
            'genero'                  => $request->genero,
            'endereco'                => $request->endereco,
            'documento_identificacao' => $request->documento_identificacao,
            'numero_documento'        => $request->numero_documento,
            'entidade_financeira'     => $request->entidade_financeira,
            'numero_utente_entidade'  => $request->numero_utente_entidade,
            'password'                => bcrypt($request->password),
        ]);

        // Criar RCU associado
        $utente->rcu()->create([
            'utente_id'         => $utente->id,
            'data_registo'      => now()->toDateString(),
            'historia_familiar' => $request->historia_familiar,
            'boletim_vacinas'   => $request->boletim_vacinas,
            'observacoes'       => $request->observacoes,
        ]);

        return redirect()->route('utente.registo')->with('success', 'Utente registado com sucesso!');
    }

    /**
     * Ver RCU (Registo Clínico do Utente)
     */
    public function verRCU()
    {
        $utente = Auth::guard('utente')->user();
        return view('utente.rcu', compact('utente'));
    }

    /**
     * Atualizar ou criar RCU (Registo Clínico do Utente)
     */
    public function atualizarRCU(Request $request)
    {
        $request->validate([
            'historia_familiar' => 'nullable|string|max:1000',
            'boletim_vacinas'   => 'nullable|string|max:1000',
            'observacoes'       => 'nullable|string|max:1000',
        ]);

        $utente = Auth::guard('utente')->user();

        if ($utente->rcu) {
            $utente->rcu->update([
                'historia_familiar' => $request->historia_familiar,
                'boletim_vacinas'   => $request->boletim_vacinas,
                'observacoes'       => $request->observacoes,
            ]);
        } else {
            $utente->rcu()->create([
                'utente_id'         => $utente->id,
                'data_registo'      => now()->toDateString(),
                'historia_familiar' => $request->historia_familiar,
                'boletim_vacinas'   => $request->boletim_vacinas,
                'observacoes'       => $request->observacoes,
            ]);
        }

        return redirect()->back()->with('success', 'RCU atualizado com sucesso!');
    }

    /**
     * Página de marcação
     */
    public function marcarConsulta()
    {
        $especialidades = Especialidade::all();
        $medicos = Medico::all();
        return view('utente.marcacoes', compact('especialidades', 'medicos'));
    }

    /**
     * Gravar marcação de consulta ou exame
     */
    public function gravarMarcacao(Request $request)
    {
        $request->validate([
            'especialidade_id' => 'required|exists:especialidades,id',
            'medico_id'        => 'required|exists:medicos,id',
            'data'             => 'required|date|after_or_equal:today',
            'tipo'             => 'required|in:consulta,exame',
        ]);

        Marcacao::create([
            'utente_id'        => Auth::id(),
            'especialidade_id' => $request->especialidade_id,
            'medico_id'        => $request->medico_id,
            'data'             => $request->data,
            'tipo'             => $request->tipo,
        ]);

        return redirect()->route('utente.historico')->with('success', 'Marcação registada com sucesso.');
    }

    /**
     * Histórico de marcações
     */
    public function historico()
    {
        $marcacoes = Marcacao::where('utente_id', Auth::id())
            ->with(['especialidade', 'medico'])
            ->orderByDesc('data')
            ->get();

        return view('utente.historico', compact('marcacoes'));
    }
}
