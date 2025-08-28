@extends('layouts.template-admin')
@section('title', 'Relatório de Produtos')

@section('content')
    <div class="container">
        <div class="row  mt-5">
            <h4 class="mt-5 py-4">Relatório de Movimentação de Produtos</h4>
            {{-- Filtro por período --}}
            <form method="GET" class="row mb-3">
                <div class="col-md-4">
                    <label for="start_date">Data Inicial</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="end_date">Data Final</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit"
                        class="btn btn-secondary w-50 d-flex align-items-center justify-content-center px-3 gap-2">
                        Filtrar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-funnel-fill" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z" />
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Tabela do relatório --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h6 class="mb-3">Resumo por produto</h6>
                    <table class="table table-striped text-center align-middle">
                        <thead class="header-table-custom">
                            <tr>
                                <th>Produto</th>
                                <th>Entradas</th>
                                <th>Saídas</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td class="text-success fw-bold">{{ $row->total_inputs }}</td>
                                    <td class="text-danger fw-bold">{{ $row->total_outputs }}</td>
                                    <td class="fw-bold">{{ $row->saldo }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Gráfico --}}
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="mb-3 text-center">Entradas x Saídas</h6>
                    <canvas id="movementsChart" style="height: 400px;"></canvas>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('movementsChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($report->pluck('name')) !!},
                        datasets: [{
                                label: 'Entradas',
                                data: {!! json_encode($report->pluck('total_inputs')) !!},
                                backgroundColor: '#198754'
                            },
                            {
                                label: 'Saídas',
                                data: {!! json_encode($report->pluck('total_outputs')) !!},
                                backgroundColor: '#dc3545'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
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
    </div>
@endsection
