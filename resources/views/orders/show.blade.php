@extends('layouts.app')
@section('title', 'Заказ №' . $order->id)
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Заказ №{{ $order->id }}</h1>
            <p class="card-text"><strong>ФИО:</strong> {{ $order->customer_name }}</p>
            <p class="card-text"><strong>Дата создания:</strong> {{ $order->created_at}}</p>
            <p class="card-text"><strong>Статус:</strong> {{ $order->status == 'new' ? 'Новый' : 'Выполнен' }}</p>
            <p class="card-text"><strong>Товар:</strong> {{ $order->product->name }} {{ $order->product->price }} руб.</p>
            <p class="card-text"><strong>Количество:</strong> {{ $order->amount }}</p>
            <p class="card-text"><strong>Комментарий:</strong> {{ $order->comment ?? 'Нет' }}</p>
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Редактировать</a>
            @if ($order->status == 'new')
                <form action="{{ route('orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" class="form-control" value="completed" required>
                    <button type="submit" class="btn btn-primary">Выполнить</button>
                </form>
            @endif
            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
