@extends('layouts.app')

@section('content')
<style>
    img {
        max-width: 400px !important;
    }

    .wtf {
        margin-top: 50px;
    }

    .card-title {
        
    }
</style>

<div class="container ">
    <h1>Список объявлений</h1>
    <a href="{{ route('ads.create') }}" class="btn btn-primary">Создать объявление</a>
    <div class="row mt-4 wtf">
        @foreach($ads as $ad)
        <div class="col-md-4 mb-4">
            <div class="card">
                <h3 class="card-title">{{ $ad->title }}</h5>
                <img src="{{ asset('storage/' . $ad->image_path) }}" class="card-img-top" alt="{{ $ad->title }}">
                <div class="card-body">
                    
                    <p class="card-text">Продавец: {{ $ad->seller_name }}</p>
                    <p class="card-text">Цена: {{ $ad->price }}</p>
                    <p class="card-text">Телефон: {{ $ad->phone_number }}</p>
                    <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-info">Подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
