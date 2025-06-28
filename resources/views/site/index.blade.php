@extends('layouts.template')
@section('title', 'Home Page')
@section('content')
    <div class="container">
        <h1>Welcome to Our Site</h1>
        <p>This is the home page of our site.</p>
        <a href="{{ route('suppliers.index') }}" class="btn btn-primary">fornecedores</a>
        <a href="{{ route('products.index') }}" class="btn btn-primary">produtos</a>
    </div>
@endSection