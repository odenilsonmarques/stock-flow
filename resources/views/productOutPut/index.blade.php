@extends('layouts.template')
@section('title', 'saida de produtos')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h1>listar de saida de produtos</h1>
            <div class="col-lg-12 mb-3">
                <a href="{{ route('productOutputs.create') }}" class="btn btn-primary">Nova Saída</a>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Fornecedor</th>
                        <th>Código do Produto</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productOutPuts as $productOutPut)
                        <tr>
                            <td>{{ $productOutPut->id }}</td>
                            {{-- <td>{{ $productOutPut->product->name }}</td> --}}
                            <td>{{ $productOutPut->user->name }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <form action="#" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
