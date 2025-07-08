@extends('layouts.template')
@section('title', 'saída de produtos')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <form action="{{ route('productOutputs.store') }}" method="post" enctype="multipart/form-data">
                @csrf<!--csrf tokem de segurnça padrao do laravel para envio de requisao-->
                <div class="card mt-5">
                    <div class="card-header d-flex align-items-center">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-box-fill me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                        </svg>
                        Saída de Produto
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label required">Produtos</label>
                                <select name="product_id" id="product_id" class="form-select" required
                                    title="Selecione o produto">
                                    <option value="" {{ old('product_id') == '' ? 'selected' : '' }}>Selecione
                                    </option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>

                                @error('product_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-lg mb-3">
                                <label for="quantity_output" class="form-label required">Quantidade</label>
                                <input type="number" name="quantity_output" id="quantity_output" class="form-control"
                                    title="Informe a quantidade" placeholder="Digite aqui"
                                    value="{{ old('quantity_output') }}" required>
                                @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="destiny" class="form-label required">Orgão / Secretaria de Destino</label>
                                <input type="text" name="destiny" id="destiny" class="form-control" required
                                    title="Informe o nome do orgão / secretaria de destino" value="{{ old('destiny') }}" placeholder="Digite aqui">
                                @error('destiny')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="responsible_for_receiving" class="form-label required">Responsável por receber<label>
                                <input type="text" name="responsible_for_receiving" id="responsible_for_receiving" class="form-control"
                                    title="Informe o nome do responsável pelo recebimento" placeholder="Digite aqui"
                                    value="{{ old('responsible_for_receiving') }}" required>
                                @error('responsible_for_receiving')
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
