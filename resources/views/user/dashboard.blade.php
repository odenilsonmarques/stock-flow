@extends('layouts.template-user')
@section('title', 'Dashboard do Usuário')

@section('content')
    <div class="container">
        <h1 class="text-center title fs-3">Bem-vindo</h1>
        @php
            $hora = date('H');
            if ($hora < 12) {
                $mensagem = 'Bom dia';
            } elseif ($hora < 18) {
                $mensagem = 'Boa tarde';
            } else {
                $mensagem = 'Boa noite';
            }
        @endphp
        <h6 class="text-center">{{ $mensagem }}, {{ date('d/m/Y') }}</h6>
    </div>
@endsection


<style>
    h1.title {
        margin-top: 100px;
    }
</style>
