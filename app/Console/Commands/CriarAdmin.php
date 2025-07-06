<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class CriarAdmin extends Command
{
    protected $signature = 'criar:admin';

    protected $description = 'Cria um administrador para o sistema';

    public function handle()
    {
        $nome = $this->ask('Nome do administrador');
        $email = $this->ask('Email do administrador');
        $senha = $this->secret('Senha do administrador');

        if (Admin::where('email', $email)->exists()) {
            $this->error('Já existe um administrador com esse email.');
            return 1;
        }

        $admin = Admin::create([
            'nome' => $nome,
            'email' => $email,
            'password' => Hash::make($senha),
        ]);

        $this->info('Administrador criado com sucesso!');
        return 0;
    }
}

