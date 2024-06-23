@extends('layouts.app')

@section('content')

<style>
    form {
        border: 1px solid black;
        width: 300px;
        padding: 15px;
        border-radius: 10px;
    }

    form .form-group {
        margin-bottom: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    textarea {
        resize: vertical;
    }
</style>
<div class="container">
    <h1>Создать объявление</h1>
    <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название товара</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="seller_name">Имя продавца</label>
            <input type="text" class="form-control" id="seller_name" name="seller_name" required>
        </div>
        <div class="form-group">
            <label for="price">Цена товара (рублей)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Телефон продавца</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
</div>
@endsection
