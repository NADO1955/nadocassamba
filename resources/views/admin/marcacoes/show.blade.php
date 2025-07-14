@extends('layouts.admin')

@section('content')
    <h1>Detalhes da Marcação</h1>

    <p>ID: {{ $marcacao->id }}</p>
    <p>Data: {{ $marcacao->data }}</p>
    <p>Hora: {{ $marcacao->hora }}</p>
    <p>Utente: {{ $marcacao->utente->nome ?? 'N/A' }}</p>
    <p>Clínico: {{ $marcacao->clinico->nome ?? 'N/A' }}</p>
    <p>Estado: {{ $marcacao->estado }}</p>
@endsection
