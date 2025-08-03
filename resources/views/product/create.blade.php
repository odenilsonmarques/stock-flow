@extends('layouts.template-admin')
@section('title', 'cadastro de produto')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf<!--csrf tokem de segurnça padrao do laravel para envio de requisao-->
                <div class="card mt-5">
                    <div class="card-header d-flex align-items-center">
                       
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-box-fill me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                        </svg>
                        Cadastro de Produto
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label required">Fornecedor</label>
                                <select name="supplier_id" id="supplier_id" class="form-select" required
                                    title="Selecione o fornecedor">
                                    <option value="" {{ old('supplier_id') == '' ? 'selected' : '' }}>Selecione
                                    </option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}</option>
                                    @endforeach
                                </select>

                                @error('supplier_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="name" class="form-label required">Nome do produto</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    title="Informe o nome do produto" value="{{ old('name') }}" placeholder="Digite aqui">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="product_number" class="form-label required">Código do produto</label>
                                <div class="input-group">
                                    <input type="tel" name="product_number" id="product_number" class="form-control"
                                        required title="Número do produto" value="{{ old('product_number') }}" readonly
                                        placeholder="">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="generateProductNumber()">Gerar</button>
                                </div>
                                @error('product_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-lg mb-3">
                                <label for="quantity" class="form-label required">Quantidade</label>
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    title="Informe a quantidade" placeholder="Digite aqui" value="{{ old('quantity') }}"
                                    required>
                                @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="confirm_quantity" class="form-label required">Confirme a quantidade</label>
                                <input type="number" name="confirm_quantity" id="confirm_quantity" class="form-control"
                                    title="Confirme a quantidade" placeholder="Digite aqui"
                                    value="{{ old('confirm_quantity') }}" required>
                                @error('confirm_quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="minimum_quantity" class="form-label required">Quantidade Mínima</label>
                                <input type="number" name="minimum_quantity" id="minimum_quantity" class="form-control"
                                    title="Informe a quantidade mínima" placeholder="Digite aqui"
                                    value="{{ old('minimum_quantity') }}" required>
                                @error('minimum_quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea name="description" id="description" cols="" rows="2" title="Informe a descrição do produto"
                                    class="form-control" placeholder="digite aqui ...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                        <button type="submit" class="btn btn-success">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
