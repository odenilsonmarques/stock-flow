@extends('layouts.template-admin')
@section('title', 'Dashboard administrador')

@section('content')
    <div class="container">
        <h1 class="text-center title fs-3">Bem-vindo</h1>
        <h6 class="text-center">Dashboard administrador</h6>


        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card">
                    {{-- <div class="card-header">
                        <h5>Bem-vindo ao painel de administração</h5>
                    </div> --}}
                    <div class="card-body">
                        <p>Usuários cadastrados: </p><hr>
                        <p>Aqui você pode gerenciar usuários, produtos e pedidos.</p><hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Estatísticas</h5>
                    </div>
                    <div class="card-body">
                        <p>Aqui você pode visualizar estatísticas e relatórios.</p>
                    </div>
                </div>
            </div>
        </div>



    @endsection


    <style>
        h1.title {
            margin-top: 100px;
        }
    </style>
