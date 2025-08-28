@extends('layouts.template-user')
@section('title', 'Dashboard do Usuário')

@section('content')
    <div class="container">
        <h1 class="text-center title fs-3">Bem-vindo</h1>
        @php
            $hora = date('H');
            if ($hora < 12) {
                $mensagem = 'Bom dia';
            } elseif ($hora < 18) {
                $mensagem = 'Boa tarde';
            } else {
                $mensagem = 'Boa noite';
            }
        @endphp
        <h6 class="text-center">{{ $mensagem }}, {{ date('d/m/Y') }}</h6>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="row text-center justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <!-- Produtos disponíveis  -->
                        <div class="col-12 col-md mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Produtos Disponíveis</h6>
                                    <h3 class="fw-bold text-success">{{ $availableProducts }}</h3>
                                    <!-- Botão para abrir o modal -->
                                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#productsModal">
                                        Ver detalhes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="productsModal" tabindex="-1" aria-labelledby="productsModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productsModalLabel">Produtos Disponíveis</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <thead class="header-table-custom">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Quantidade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Nenhum produto disponível.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
