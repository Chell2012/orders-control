@extends('layouts.app')
@section('title', 'Добавить товар')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Добавить товар</h1>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                @include('products.form')
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
