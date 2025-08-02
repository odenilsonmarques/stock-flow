@extends('layouts.template-admin')
@section('title', 'Dashboard administrador')

@section('content')
    <div class="container">
        <h1 class="text-center title fs-3">Bem-vindo</h1>
        @php
            $hora = date('H');
            if ($hora < 12) {
                $mensagem = "Bom dia";
            } elseif ($hora < 18) {
                $mensagem = "Boa tarde";
            } else {
                $mensagem = "Boa noite";
            }
        @endphp
        <h6 class="text-center">{{ $mensagem }}, {{ date('d/m/Y') }}</h6>


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="row text-center justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card ">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Total de Fornecedores</h6>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#supplierModal"
                                    class="btn btn-primary"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                        <div class="card card-black">
                            <div class="card-body">
                                <h6 class="card-title">Produtos Cadastrados</h6>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"
                                    class="btn btn-primary"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Produtos Disponiveis</h6>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#productAvailableModal"
                                    class="btn btn-primary"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Produtos com quantidade minima</h6>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#productsMinimumModal"></a>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Produtos abaixo da quantidade minima</h6>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#productsBeloMinimumModal"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Produtos com estoque zerado</h6>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#productsWithZeroStockModal"></a>
                            </div>
                        </div>
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
