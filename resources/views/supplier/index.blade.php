@extends('layouts.template')
@section('title', 'cadastro de fornecedor')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <h1>listar fornecedores</h1>
            <div class="col-lg-12 mb-3">
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Novo Fornecedor</a>
            </div>
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>CPF/CNPJ</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->type_supplier }}</td>
                            <td>{{ $supplier->cpf_cnpj }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
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
