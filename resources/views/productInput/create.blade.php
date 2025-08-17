@extends('layouts.template-admin')
@section('title', 'Entrada de Produto')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 mt-5 justify-content-end d-flex">
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-secondary d-inline-flex align-items-center gap-2 me-2">
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('productsInput.index') }}" class="btn btn-secondary d-inline-flex align-items-center gap-2">
                    <span>Entradas</span>
                </a>
            </div>

            {{-- Formulário de entrada --}}
            <form action="{{ route('productsInput.store') }}" method="post" id="productInputForm">
                @csrf
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center text-white bg-secondary rounded-top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-box-arrow-in-down me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M3.5 9a.5.5 0 0 1 .5-.5h2.5V1.5a.5.5 0 0 1 1 0V8.5H10a.5.5 0 0 1 .354.854l-3 3a.5.5 0 0 1-.708 0l-3-3A.5.5 0 0 1 3.5 9z" />
                            <path fill-rule="evenodd"
                                d="M13.5 14a1.5 1.5 0 0 0 1.5-1.5V6.5a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 0-1 0v6a1.5 1.5 0 0 0 1.5 1.5h11z" />
                        </svg>
                        Nova Entrada de Produto
                    </div>

                    <div class="card-body">
                        {{-- Produto --}}
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="product_id" class="form-label required">Produto</label>
                                <select name="product_id" id="product_id" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }} ({{ $product->product_number }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="supplier_id" class="form-label required">Fornecedor</label>
                                <select name="supplier_id" id="supplier_id" class="form-select" required>
                                    <option value="">Selecione</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- Quantidade --}}
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="quantity_input" class="form-label required">Quantidade</label>
                                <input type="number" name="quantity_input" id="quantity_input" class="form-control"
                                    placeholder="Digite a quantidade" value="{{ old('quantity_input') }}" required>
                                @error('quantity_input')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Data de entrada --}}
                            <div class="col-lg-6">
                                <label for="date_input" class="form-label required">Data de Entrada</label>
                                <input type="date" name="date_input" id="date_input" class="form-control"
                                    value="{{ old('date_input', now()->toDateString()) }}" required>
                                @error('date_input')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        {{-- Número da Nota Fiscal (opcional) --}}
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="invoice_number" class="form-label">Número da Nota Fiscal</label>
                                <input type="text" name="invoice_number" id="invoice_number" class="form-control"
                                    placeholder="Ex: NF12345" value="{{ old('invoice_number') }}">
                                @error('invoice_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Responsável pelo recebimento --}}
                            <div class="col-lg-6">
                                <label for="responsible" class="form-label">Responsável pelo Recebimento</label>
                                <input type="text" name="responsible" id="responsible" class="form-control"
                                    placeholder="Ex: João da Silva" value="{{ old('responsible') }}">
                                @error('responsible')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>




                {{-- Botões --}}
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <a href="#" class="btn btn-danger">CANCELAR</a>
                        <button type="submit" class="btn btn-success">CADASTRAR ENTRADA</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
