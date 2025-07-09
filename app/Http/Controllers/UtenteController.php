<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Utente;
use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\ExameComplementar;
use App\Models\RCU; // <-- Certifique-se que o nome do ficheiro é RCU.php

class UtenteController extends Controller
{
    public function create()
    {
        return view('utente.registo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:utentes,email',
            'telefone' => 'nullable|string|max:20',
            'genero' => 'nullable|in:Masculino,Feminino,Outro',
            'data_nascimento' => 'nullable|date',
            'endereco' => 'nullable|string|max:255',
            'documento_identificacao' => 'required|string|in:BI,Passaporte|max:50',
            'numero_documento' => 'required|string|max:50|unique:utentes,numero_documento',
            'entidade_financeira' => 'nullable|string|max:255',
            'numero_utente_entidade' => 'nullable|string|max:100',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $utente = Utente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
            'endereco' => $request->endereco,
            'documento_identificacao' => $request->documento_identificacao,
            'numero_documento' => $request->numero_documento,
            'entidade_financeira' => $request->entidade_financeira,
            'numero_utente_entidade' => $request->numero_utente_entidade,
            'password' => Hash::make($request->password),
        ]);

        // Cria o RCU com todos os campos vazios
        RCU::create([
            'utente_id' => $utente->id,
            'grupo_sanguineo' => '',
            'historico_medico' => '',
            'historia_familiar' => '',
            'alergias' => '',
            'medicacoes_atuais' => '',
            'boletim_vacinas' => '',
            'observacoes' => '',
            'diagnostico' => '',
            'tratamento' => '',
            'prescricao' => '',
        ]);

        return redirect()->route('utente.registo')->with('success', 'Utente registado com sucesso!');
    }

    public function dashboard()
    {
        if (Auth::guard('utente')->check()) {
            return view('utente.dashboard');
        }

        return redirect()->route('login.utente')->with('error', 'Precisa de iniciar sessão.');
    }

    public function verRCU()
    {
        $utente = Auth::guard('utente')->user();
        $rcu = $utente->rcu;

        return view('utente.ver_rcu', compact('utente', 'rcu'));
    }

    public function editarRCU()
    {
        $utente = Auth::guard('utente')->user();

        if (!$utente->rcu) {
            $utente->rcu()->create([
                'grupo_sanguineo' => '',
                'historico_medico' => '',
                'historia_familiar' => '',
                'alergias' => '',
                'medicacoes_atuais' => '',
                'boletim_vacinas' => '',
                'observacoes' => '',
                'diagnostico' => '',
                'tratamento' => '',
                'prescricao' => '',
            ]);
        }

        $rcu = $utente->rcu;

        return view('utente.editar_rcu', compact('rcu'));
    }

    public function atualizarRCU(Request $request)
    {
        $request->validate([
            'grupo_sanguineo' => 'nullable|string|max:10',
            'historico_medico' => 'nullable|string|max:1000',
            'historia_familiar' => 'nullable|string|max:1000',
            'alergias' => 'nullable|string|max:1000',
            'medicacoes_atuais' => 'nullable|string|max:1000',
            'boletim_vacinas' => 'nullable|string|max:1000',
            'observacoes' => 'nullable|string|max:1000',
            'diagnostico' => 'nullable|string|max:1000',
            'tratamento' => 'nullable|string|max:1000',
            'prescricao' => 'nullable|string|max:1000',
        ]);

        $utente = Auth::guard('utente')->user();
        $rcu = $utente->rcu;

        $rcu->update([
            'grupo_sanguineo' => $request->grupo_sanguineo,
            'historico_medico' => $request->historico_medico,
            'historia_familiar' => $request->historia_familiar,
            'alergias' => $request->alergias,
            'medicacoes_atuais' => $request->medicacoes_atuais,
            'boletim_vacinas' => $request->boletim_vacinas,
            'observacoes' => $request->observacoes,
            'diagnostico' => $request->diagnostico,
            'tratamento' => $request->tratamento,
            'prescricao' => $request->prescricao,
        ]);

        return redirect()->route('utente.rcu')->with('success', 'Registo clínico atualizado com sucesso.');
    }

    public function marcacoes()
    {
        $especialidades = Especialidade::all();
        $medicos = Medico::all();

        return view('utente.marcacoes', compact('especialidades', 'medicos'));
    }

    public function verDisponiveis()
    {
        $especialidades = Especialidade::all();
        $medicos = Medico::with('especialidade')->get();
        $exames = ExameComplementar::all();

        return view('utente.disponiveis', compact('especialidades', 'medicos', 'exames'));
    }
}
