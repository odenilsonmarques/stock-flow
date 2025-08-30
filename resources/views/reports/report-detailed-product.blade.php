@extends('layouts.template-admin')
@section('title', 'Relatório de Produtos')

@section('content')
    <div class="container">
        <div class="row  mt-5">
            <h4 class="mt-5 py-4">Relatório de Movimentações</h4>

            <form method="GET" class="row g-2 mb-3"> <!-- g-2 reduz espaçamento entre colunas -->
                <div class="col-md-3">
                    <label for="start_date">Data Inicial</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" class="form-control">
                </div>

                <div class="col-md-3">
                    <label for="end_date">Data Final</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" class="form-control"
                        min="{{ $startDate }}">
                </div>

                <div class="col-md-3 d-flex align-items-end gap-2"> <!-- gap-2 ajusta espaçamento entre botões -->
                    <button type="submit"
                        class="btn btn-secondary d-flex w-100 align-items-center justify-content-center px-2 gap-2">
                        Filtrar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-funnel-fill" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z" />
                        </svg>
                    </button>

                    <a href="{{ route('report.details.products') }}"
                        class="btn btn-secondary d-inline-flex align-items-center gap-2">
                        Limpar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                    </a>

                    <a href="{{ route('report.details.pdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}"
                        class="btn btn-secondary d-inline-flex align-items-center gap-2">
                        <span class="">Imprimir</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                            <path
                                d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                            <path fill-rule="evenodd"
                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                        </svg>
                    </a>

                    <a href="{{ route('report.details.pdf', ['start_date' => $startDate, 'end_date' => $endDate]) }}"
                        class="btn btn-secondary d-inline-flex align-items-center gap-2">
                        <span class="">Dashboard</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-grid-fill" viewBox="0 0 16 16">
                            <path
                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                        </svg>
                    </a>
                </div>
            </form>

            {{-- Tabela do relatório --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h6 class="mb-3">Resumo por produto</h6>
                    <table class="table table-striped">
                        <thead class="header-table-custom">
                            <tr>
                                <th>Data</th>
                                <th>Produto</th>
                                <th>Tipo</th>
                                <th>Quantidade</th>
                                <th>Fornecedor/Destino</th>
                                <th>Responsável</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movements as $movement)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($movement->date)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $movement->product_name }}</td>
                                    <td>
                                        <span class="badge {{ $movement->type == 'entrada' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($movement->type) }}
                                        </span>
                                    </td>
                                    <td class="fw-bold">{{ $movement->quantity }}</td>
                                    <td>
                                        @if ($movement->type == 'entrada')
                                            {{ $movement->supplier_name ?? '-' }}
                                        @else
                                            {{ $movement->destiny ?? '-' }}
                                        @endif
                                    </td>
                                    <td>{{ $movement->user_name ?? 'Sistema' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- paginação --}}
                    <div class="d-flex justify-content-end pagination pagination-sm">
                        {{-- {{ $report->links('pagination::bootstrap-4') }} --}}
                        {{ $movements->appends(request()->query())->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
