@extends('layouts.template')
@section('title', 'Home Page')
@section('content')

    <div class="container-fluid">

        <div class="container mt-3">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2 text-md-center">
                    <!-- Image -->
                    <img src="{{ asset('assets/img/img-hero.png') }}"
                        class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0 aos-init aos-animate " alt="..." width="280">
                </div>

                <div class="col-12 col-md-7 col-lg-6 order-md-1">
                    <!-- Heading -->
                    <h1 class="display-3 text-center text-md-start">
                        Gestão de <span class="text-custom-hero">Estoque</span> <br> Municipal
                    </h1>

                    <!-- Text -->
                    <p class="lead text-center text-md-start text-body-secondary mb-6 mb-lg-8">
                        Gestão inteligente de estoque para o setor público
                    </p>

                    <!-- Buttons -->
                    <div class="text-center text-md-start">
                        <a href="/login" class="btn btn-custom-hero shadow lift ">
                            Acessar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row texts-features">
            <h2 class="text-center mt-5 mb-5">Benefícios</h2>
         
            <div class="col-12 col-md mb-3">
                <div class="card shadow-sm">
                    <div class="card-body show-card">
                        <h6 class="card-title">Precisão</h6>
                        <p class="mt-3">
                            Minimize a probabilidade de registros incorretos ou perda de informações. Isso leva a um estoque
                            mais
                            preciso e confiável.
                        </p>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md mb-3">
                <div class="card shadow-sm">
                    <div class="card-body show-card">
                        <h6 class="card-title">Eficiência</h6>
                        <p class="mt-3">
                            Se concentrem em tarefas mais estratégicas em vez de passar tempo lidando com papelada e
                            contagens
                            manuais.
                        </p>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md mb-3">
                <div class="card shadow-sm">
                    <div class="card-body show-card">
                        <h6 class="card-title">Tomada de decisões</h6>
                        <p class="mt-3">
                            Com dados precisos e em tempo real, você pode tomar decisões informadas sobre compras e alocação
                            de
                            recursos.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endSection
