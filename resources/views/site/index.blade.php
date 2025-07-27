@extends('layouts.template')
@section('title', 'Home Page')
@section('content')
    {{-- <div class="container">
        <h1>Welcome to Our Site</h1>
        <p>This is the home page of our site.</p>
        <a href="{{ route('suppliers.index') }}" class="btn btn-primary">fornecedores</a>
        <a href="{{ route('products.index') }}" class="btn btn-primary">produtos</a>
        <a href="{{ route('productOutPuts.index') }}" class="btn btn-primary">saida de produtos</a>
    </div> --}}

    <div class="container-fluid">
        <div class="container hero">
            <div class="row">
                <div class="col-lg-6 hero-text">
                    <h1 class="mt-5">Fluxo de Estoque</h1>
                    <p class="mt-3">Gerencie seu estoque de forma automática</p>
                    <img src="{{ 'assets/img/estoque4.svg' }}" alt="" width="250" height="250px">
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ 'assets/img/loja_virtual.webp' }}" alt="" class="" width="350"
                        height="">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row texts-features">
            <h2 class="text-center mt-5">Benefícios</h2>
            <div class="col text-center mt-5 show-card">
                <h5 class="mt-3">Precisão</h5>
                <p class="mt-3">
                    Minimize a probabilidade de registros incorretos ou perda de informações. Isso leva a um estoque mais
                    preciso e confiável.
                </p>
            </div>

            <div class="col text-center mt-5 show-card">
                <h5 class="mt-3">Eficiência</h5>
                <p class="mt-3">
                    Se concentrem em tarefas mais estratégicas em vez de passar tempo lidando com papelada e contagens
                    manuais.
                </p>
            </div>

            <div class="col text-center mt-5 show-card">
                <h5 class="mt-3">Tomada de decisões</h5>
                <p class="mt-3">
                    Com dados precisos e em tempo real, você pode tomar decisões informadas sobre compras e alocação de
                    recursos.
                </p>
            </div>
        </div>
    </div>
@endSection
