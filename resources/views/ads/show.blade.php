@extends('layouts.app')

@section('content')

<style>
    .img-fluid {
        max-width: 600px !important;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }

    form:first-child {
        border: 1px solid black;
        width: 300px;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
    }
</style>

<div class="container">
    <h1>{{ $ad->title }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $ad->image_path) }}" class="img-fluid" alt="{{ $ad->title }}">
        </div>
        <div class="col-md-6">
            <p><strong>Имя продавца:</strong> {{ $ad->seller_name }}</p>
            <p><strong>Цена:</strong> {{ $ad->price }}</p>
            <p><strong>Телефон:</strong> {{ $ad->phone_number }}</p>
            <p><strong>Описание:</strong> {{ $ad->description }}</p>
        </div>
    </div>
    <hr>
    <h3>Отзывы</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('ads.comments.store', $ad->id) }}">
                @csrf
                <div class="form-group">
                    <label for="comment">Комментарий</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Оценка</label>
                    <select class="form-control" id="rating" name="rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Оставить отзыв</button>
            </form>
        </div>
    </div>
    @foreach($ad->comments as $comment)
    <div class="card mb-2">
        <div class="card-body">
            <p><strong>Оценка:</strong> {{ $comment->rating }}</p>
            <p>{{ $comment->comment }}</p>
        </div>
    </div>
    @endforeach

    <form method="POST" action="{{ route('ads.destroy', $ad->id) }}" class="mt-4">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Удалить объявление</button>
    </form>
</div>
@endsection
