@extends('layouts.template')
@section('title', 'saida de produtos')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h1>listar de saida de produtos</h1>
            <div class="col-lg-12 mb-3">
                <a href="{{ route('productOutputs.create') }}" class="btn btn-primary">Nova Saída</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Destino</th>
                        <th>Recebedor</th>
                        <th>Registrado por</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productOutPuts as $output)
                        <tr>
                            <td>{{ $output->id }}</td>
                            <td>{{ $output->product->name ?? '-' }}</td>
                            <td>{{ $output->quantity_output }}</td>
                            <td>{{ ucfirst($output->destiny) }}</td>
                            <td>{{ ucfirst($output->responsible_for_receiving) }}</td>
                            <td>{{ $output->admin->name ?? 'N/A' }}</td>
                            <td>{{ $output->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nenhuma saída registrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
