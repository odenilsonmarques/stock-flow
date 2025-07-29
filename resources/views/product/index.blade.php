@extends('layouts.template')
@section('title', 'cadastro de fornecedor')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h1>listar produtos</h1>
            <div class="col-lg-12 mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Novo Produto</a>
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
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>{{ $product->product_number }}</td>
                            <td>{{ $product->quantity }}</td>
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
