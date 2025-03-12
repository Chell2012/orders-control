@extends('layouts.app')
@section('title', 'Редактировать заказ')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Редактировать заказ</h1>
            <form action="{{ route('orders.update', $order) }}" method="POST">
                @csrf
                @method('PUT')
                @include('orders.form')
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
@endsection
