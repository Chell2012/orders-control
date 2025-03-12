@extends('layouts.app')
@section('title', 'Список заказов')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Список заказов</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Добавить заказ</a>
    </div>
    <form class="d-flex" action="{{ route('orders.index') }}" method="GET">
        <input name="search" class="form-control me-2" type="search" placeholder="Введите запрос" aria-label="Поиск"  value="{{ old('search', $search ?? '') }}">
        <button class="btn btn-primary" type="submit">Поиск</button>
    </form>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Номер заказа</th>
            <th>ФИО покупателя</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th>Сумма</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</a></td>
                <td><a href="{{ route('orders.show', $order) }}">{{ $order->customer_name }}</a></td>
                <td>{{ $order->created_at}}</td>
                <td>{{ $order->status == 'new' ? 'Новый' : 'Выполнен' }}</td>
                <td>{{ $order->amount * $order->product->price }} руб.</td>
                <td>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
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
        <div class="col-md-6">{{ $orders->onEachSide(2)->links() }}</div>
    </div>
@endsection
