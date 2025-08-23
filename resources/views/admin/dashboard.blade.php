@extends('layouts.template-admin')
@section('title', 'Dashboard administrador')

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

        <div class="container mt-5">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="row text-center">
                        <!-- Fornecedores -->
                        <div class="col-12 col-md mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Fornecedores</h6>
                                    <h3 class="fw-bold text-primary">{{ $suppliersQuantity }}</h3>
                                    <small>Total cadastrados</small>
                                </div>

                            </div>
                        </div>

                        <!-- Produtos com Estoque Zerado -->
                        <div class="col-12 col-md mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Estoque Zerado</h6>
                                    <h3 class="fw-bold text-danger">{{ $zeroStockProducts }}</h3>
                                    <small>Produtos sem estoque</small>
                                </div>
                            </div>
                        </div>

                        <!-- Produtos disponíveis  -->
                        <div class="col-12 col-md mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Disponíveis</h6>
                                    <h3 class="fw-bold text-success">{{ $availableProducts }}</h3>
                                    <small>Produtos com estoque</small>
                                </div>
                            </div>
                        </div>

                        <!-- Produtos com Qtd. mínima -->
                        <div class="col-12 col-md mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Qtd. mínima</h6>
                                    <h3 class="fw-bold text-warning">{{ $minimumStockProducts }}</h3>
                                    <small>Produtos com Qtd mínima</small>
                                </div>
                            </div>
                        </div>

                        <!-- Produtos abaixo do Qtd. mínima -->
                        <div class="col-12 col-md mb-3">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <h6 class="card-title">Abaixo do mínimo</h6>
                                    <h3 class="fw-bold text-dark">{{ $belowMinimumStockProducts }}</h3>
                                    <small>Produtos Críticos</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- gráfico -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="mb-3 text-center">Visão geral</h6>
                            <div style="height: 300px;"> {{-- 🔹 altura fixa evita scroll infinito --}}
                                <canvas id="stockChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="{{ asset('assets/js/chart.umd.min.js') }}"></script>
            <script>
                const ctx = document.getElementById('stockChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Disponíveis', 'Zerados', 'Mínimo', 'Abaixo do mínimo'],
                        datasets: [{
                            label: 'Produtos',
                            data: [
                                {{ $availableProducts }},
                                {{ $zeroStockProducts }},
                                {{ $minimumStockProducts }},
                                {{ $belowMinimumStockProducts }}
                            ],
                            backgroundColor: ['#198754', '#dc3545', '#ffc107', '#6c757d'],
                            borderRadius: 6,
                            barThickness: 40
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false, // mantém responsivo dentro da div
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    @endsection


    <style>
        h1.title {
            margin-top: 100px;
        }
    </style>
