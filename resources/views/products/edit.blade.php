@extends('layouts.app')
@section('title', 'Редактировать товар')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Редактировать товар</h1>
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                @include('products.form')
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection
