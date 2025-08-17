@extends('layouts.template-admin')
@section('title', 'cadastro de usuário')

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
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary d-inline-flex align-items-center gap-2">
                    <span class="text-custom-btn-users">Usuários</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                    </svg>
                </a>
            </div>
            <form action="{{ route('setup-admin.store') }}" method="POST">
                @csrf
                <div class="card mt-3">
                    <div class="p-2 d-flex align-items-center text-white bg-secondary rounded-top">
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
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Digite aqui" title="Informe a confirmação da senha"
                                    required>
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
                                    <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Administrador
                                    </option>
                                    {{-- esta opção só aparece se já existir um admin cadastrado, seguindo a lógica do metodo create no controller UserController --}}
                                    @if ($hasAdmin)
                                        <option value="0" {{ old('is_admin') == '0' ? 'selected' : '' }}>Usuário
                                        </option>
                                    @endif
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
