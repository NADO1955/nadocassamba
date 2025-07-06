@extends('layouts.app')

@section('title', 'Serviços')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="card border-3 border-warning shadow-sm p-4 bg-white rounded-4 animate__animated animate__fadeIn">
                <div class="text-center mb-5">
                    <h2 class="text-success section-title fw-bold animate__animated animate__fadeInDown">
                        <i class="bi bi-heart-pulse icon-hover me-2"></i>
                        Serviços Hospitalares
                    </h2>
                    <hr class="w-25 mx-auto border-2 border-success border-opacity-50">
                    <p class="text-muted">Conheça os serviços prestados pela nossa unidade de saúde</p>
                </div>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @php
                        $servicos = [
                            ['titulo' => 'Consultas Médicas', 'descricao' => 'Consultas em diversas especialidades com profissionais qualificados.', 'icone' => 'bi-stethoscope'],
                            ['titulo' => 'Exames Complementares', 'descricao' => 'Exames laboratoriais, de imagem e outros complementares.', 'icone' => 'bi-clipboard2-pulse'],
                            ['titulo' => 'Internamento', 'descricao' => 'Alojamento e tratamento hospitalar com assistência contínua.', 'icone' => 'bi-hospital'],
                            ['titulo' => 'Emergência', 'descricao' => 'Atendimento rápido e eficaz em situações críticas de saúde.', 'icone' => 'bi-exclamation-triangle-fill'],
                            ['titulo' => 'Pediatria', 'descricao' => 'Cuidados médicos dedicados ao desenvolvimento e bem-estar infantil.', 'icone' => 'bi-emoji-smile'],
                            ['titulo' => 'Saúde Preventiva', 'descricao' => 'Vacinação, rastreios e educação para a saúde.', 'icone' => 'bi-shield-check'],
                        ];
                    @endphp

                    @foreach ($servicos as $servico)
                        <div class="col">
                            <div class="card h-100 text-center p-4 border-0 rounded-4 shadow-sm card-hover animate__animated animate__fadeInUp">
                                <i class="bi {{ $servico['icone'] }} text-success fs-1 mb-3 icon-hover"
                                   style="transition: transform 0.3s ease;"></i>

                                <div class="card-body">
                                    <h5 class="fw-bold text-dark">{{ $servico['titulo'] }}</h5>
                                    <p class="text-muted small">{{ $servico['descricao'] }}</p>
                                </div>

                                <div class="card-footer bg-transparent border-0">
                                    <a href="#" class="btn btn-outline-success btn-sm px-3 fw-semibold btn-login">
                                        Saber Mais <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
@endsection


