@extends('layouts.template-admin')
@section('title', 'Dashboard administrador')

@section('content')
    <div class="container">
        <h1 class="text-center title fs-3">Bem-vindo</h1>
        <h6 class="text-center">Dashboard administrador</h6>


        <div class="row mt-3">
            <div class="col-lg-3">
                <div class="card ">
                    {{-- <div class="card-header">
                        <h5>Bem-vindo ao painel de administração</h5>
                    </div> --}}
                    <div class="card-body text-center">
                        <a href="{{ route('admin.users.index') }}"
                            class="btn btn-secondary d-inline-flex align-items-center gap-2 mb-4">
                            <span class="text-custom-btn-users">Usuários cadastrados</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path
                                    d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                            </svg>
                        </a>
                        
                        <a href="{{ route('admin.users.create') }}"
                            class="btn btn-secondary d-inline-flex align-items-center gap-2">
                            <span class="text-custom-btn-users">Novo Usuário</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path
                                    d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                            </svg>
                        </a>


                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5>Estatísticas</h5>
                    </div>
                    <div class="card-body">
                        <p>Aqui você pode visualizar estatísticas e relatórios.</p>
                    </div>
                </div>
            </div>
        </div>



    @endsection


    <style>
        h1.title {
            margin-top: 100px;
        }
    </style>
