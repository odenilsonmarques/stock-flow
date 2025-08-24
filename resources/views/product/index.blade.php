@extends('layouts.template-admin')
@section('title', 'Produtos')

@section('content')
    <div class="container">
        <div class="row mt-5">
            {{-- mensagem de sucesso --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center mt-5" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('success') }}
                </div>
            @endif

            {{-- botões de ação --}}
            <div class="col-lg-12 mt-5 justify-content-end d-flex ">
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-secondary d-inline-flex align-items-center gap-2 me-2">
                    <span class="text-custom-btn-users">Dashboard </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-speedometer" viewBox="0 0 16 16">
                        <path
                            d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                        <path fill-rule="evenodd"
                            d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0" />
                    </svg>
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-secondary d-inline-flex align-items-center gap-2">
                    <span class="text-custom-btn-users">Novo Produto</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-grid-fill" viewBox="0 0 16 16">
                        <path
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                    </svg>
                </a>
            </div>

            {{-- condição para quando não houver produtos cadastrados --}}
            @if ($products->isEmpty())
                <div class="alert alert-info d-flex flex-column align-items-center py-4 mt-3">
                    <p class="mb-3">Produto não encontrado.</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Voltar para controle de estoque
                        </a>
                    </div>
                </div>
            @else
                {{-- fomulario de busca --}}
                <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Buscar produto por nome ou número" value="{{ request('search') }}">
                            <button type="submit"
                                class="btn btn-secondary d-flex align-items-center justify-content-center px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary ">Limpar</a>
                    </div>
                </form>

                {{-- tabela de produtos --}}
                <table class="table table-striped table-bordered table-hover">
                    <caption>Controle de Estoque</caption>
                    <thead class="header-table-custom">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Código do Produto</th>
                            <th>Qtd mínima</th>
                            <th>Qtd atual</th>
                            <th>Registrado por</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_number }}</td>
                                <td>{{ $product->minimum_quantity }}</td>
                                <td>
                                    {{ $product->quantity }}

                                    @if ($product->quantity < $product->minimum_quantity)
                                        <span class="badge bg-danger ms-2">
                                            ⚠️ Abaixo do mínimo
                                        </span>
                                    @elseif ($product->quantity == $product->minimum_quantity)
                                        <span class="badge bg-warning ms-2">
                                            Atenção: Mínimo atingido
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $product->admin->name }}</td>
                                <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#94AF97"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </a>
                                    <form action="#" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="#94AF97" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- paginação --}}
                <div class="d-flex justify-content-end pagination pagination-sm">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
@endsection
