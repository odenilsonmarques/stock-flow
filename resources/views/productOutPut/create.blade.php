@extends('layouts.template-admin')
@section('title', 'Cadastro de Saída de Produtos')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12  mt-5 justify-content-end d-flex">
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-secondary d-inline-flex align-items-center gap-2 me-2">
                    <span class="text-custom-btn-users">Dashboard </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-grid-fill" viewBox="0 0 16 16">
                        <path
                            d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z" />
                    </svg>
                </a>
                <a href="{{ route('productOutPuts.index') }}"
                    class="btn btn-secondary d-inline-flex align-items-center gap-2">
                    <span class="text-custom-btn-users">Saídas</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
                    </svg>
                </a>
            </div>
            <form action="{{ route('productOutputs.store') }}" method="post" enctype="multipart/form-data">
                @csrf<!--csrf tokem de segurnça padrao do laravel para envio de requisao-->
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center text-white bg-secondary rounded-top gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z" />
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
                                @error('quantity_output')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="destiny" class="form-label required">Orgão / Secretaria de Destino</label>
                                <input type="text" name="destiny" id="destiny" class="form-control" required
                                    title="Informe o nome do orgão / secretaria de destino" value="{{ old('destiny') }}"
                                    placeholder="Digite aqui">
                                @error('destiny')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="responsible_for_receiving" class="form-label required">Responsável po
                                    receber</label>
                                <input type="text" name="responsible_for_receiving" id="responsible_for_receiving"
                                    class="form-control" title="Informe o nome do responsável pelo recebimento"
                                    placeholder="Digite aqui" value="{{ old('responsible_for_receiving') }}" required>

                                @error('responsible_for_receiving')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <button class="btn btn-danger"><a href="{{ route('productOutPuts.index') }}">CANCELAR</a></button>
                        <button type="submit" class="btn btn-success">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
