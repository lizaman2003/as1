@extends('layouts.header')
@section('title'){{$item->name}} {{$item->model}}
@endsection
@section('main')
<section>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="w-100 p-4 text-center boder rounded">
                <img src="{{$item->img}}" alt="">
                </div>

            </div>
            <div class="col-7 mt-3">
                <h2>Название товара: {{$item->name}}  <span class="badge bg-success">{{$item->year}}</span></h2>
                <p class="mb-2"><strong>страна производитель:</strong> {{$item->country}}</p>
                <p class="mb-2"><strong>Год выпуска:</strong> {{$item->year}}</p>
                <p><strong>Модель:</strong> {{$item->model}}</p>
                <h3 class="mt-4">{{$item->price}}руб</h5>
                @auth
                <a http="{{route('addCart')}}" class="btn btn-sm btn-success" onchange="addCart({{$item->id}})">В корзину</a>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection