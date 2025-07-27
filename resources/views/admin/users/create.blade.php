@extends('layouts.template')

@section('content')
<div class="container">
    <h2>Cadastrar novo usuário</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div>
            <label>Nome</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label>Senha</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirmação da Senha</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <label>É administrador?</label>
            <select name="is_admin" required>
                <option value="1">Sim</option>
                <option value="0" selected>Não</option>
            </select>
        </div>

        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
