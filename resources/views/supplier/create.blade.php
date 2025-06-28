@extends('layouts.template')
@section('title', 'cadastro de fornecedor')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data">
                @csrf<!--csrf tokem de segurnça padrao do laravel para envio de requisao-->
                <div class="card mt-5">
                    <div class="card-header d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        Dados Principais
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label required">Nome do Fornecedor</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Digite aqui"
                                    title="Informe o nome do fornecedor" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="type_supplier" class="form-label required">Tipo de fornecedor</label>
                                <select id="type_supplier" name="type_supplier" class="form-select" required
                                    title="Selecione o tipo de fornecedor">
                                    <option value="" {{ old('type_supplier') == '' ? 'selected' : '' }}>Selecione
                                    </option>
                                    <option value="Fisica" {{ old('type_supplier') == 'Fisica' ? 'selected' : '' }}>Pessoa
                                        física</option>
                                    <option value="Juridica" {{ old('type_supplier') == 'Juridica' ? 'selected' : '' }}>
                                        Pessoa jurídica</option>
                                </select>
                                @error('type_supplier')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="cpf_cnpj" class="form-label required">Número do documento</label>
                                <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" required title="Informe o CPF ou CNPJ"
                                    value="{{ old('cpf_cnpj') }}" placeholder="" title="Informe o CPF ou CNPJ" disabled>
                                @error('cpf_cnpj')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg mb-3">
                                <label for="phone" class="form-label required">Telefone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" required title="Informe o telefone"
                                    value="{{ old('phone') }}" placeholder="Digite aqui" title="Informe o telefone">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required title="Informe o email"
                                    value="{{ old('email') }}" placeholder="Digite aqui" title="Informe o email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mt-2">
                    <div class="card-header  d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        Endereço
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="zip_code" class="form-label">Cep</label>
                                <input type="text" name="zip_code" id="zip_code" class="form-control" title="Informe o CEP"
                                    value="{{ old('zip_code') }}" placeholder="Digite aqui" title="Informe o CEP">
                                @error('zip_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="address" class="form-label required">Endereço</label>
                                <input type="text" name="address" id="address" class="form-control" required title="Informe o endereço"
                                    value="{{ old('address') }}" placeholder="Digite aqui" title="Informe o endereço">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-lg-2 mb-3">
                                <label for="number" class="form-label">Número</label>
                                <input type="text" name="number" id="number" class="form-control" title="Informe o número"
                                    value="{{ old('number') }}" placeholder="Digite aqui" title="Informe o número">
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="distric" class="form-label required">Bairro</label>
                                <input type="text" name="district" id="district" class="form-control" required title="Informe o bairro"
                                    value="{{ old('district') }}" placeholder="Digite aqui" title="Informe o bairro">
                                @error('district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="city" class="form-label required">Cidade</label>
                                <input type="text" name="city" id="city" class="form-control" required title="Informe a cidade"
                                    value="{{ old('city') }}" placeholder="Digite aqui" title="Informe a cidade">
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="state" class="form-label required">Estado</label>
                                <input type="text" name="state" id="state" class="form-control" required title="Informe o estado"
                                    value="{{ old('state') }}" placeholder="Digite aqui" title="Informe o estado">
                                @error('state')
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
