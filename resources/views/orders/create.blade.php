@extends('layouts.app')
@section('title', 'Добавить заказ')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Добавить заказ</h1>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                @include('orders.form')
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
