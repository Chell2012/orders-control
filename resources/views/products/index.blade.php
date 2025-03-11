@extends('layouts.app')
@section('title', 'Список товаров')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Список товаров</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Добавить товар</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                <td>{{ $product->price }} руб.</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-6">{{ $products->onEachSide(2)->links() }}</div>
    </div>

@endsection
