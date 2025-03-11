@extends('layouts.app')
@section('title', $product->name)
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $product->name }}</h1>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Цена: <strong>{{ $product->price }} руб.</strong></p>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
@endsection
