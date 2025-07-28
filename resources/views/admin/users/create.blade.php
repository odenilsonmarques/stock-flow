@extends('layouts.template')
@section('title', 'cadastro de usuário')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="card mt-5">
                    <div class="card-header d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        Cadastro de Usuário
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label required">Nome do Usuário</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Digite aqui" title="Informe o nome do usuário"
                                    required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Digite aqui" title="Informe o email" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="password" class="form-label required">Senha</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Digite aqui" title="Informe a senha" required>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="password_confirmation" class="form-label required">Confirmação da Senha</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                                    placeholder="Digite aqui" title="Informe a confirmação da senha" required>
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="role" class="form-label required">Papel</label>
                                <select id="role" name="is_admin" class="form-select" required
                                    title="Selecione o papel do usuário">
                                    <option value="" {{ old('is_admin') == '' ? 'selected' : '' }}>Selecione</option>
                                    <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Administrador</option>
                                    <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>Usuário</option>
                                </select>
                                @error('is_admin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>  

                        </div>


                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
