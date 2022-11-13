@extends('layouts.header')
@section('title')
    Админпанель-Добавление новых товаров
@endsection
@section('main')
    <section id="item">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Изменить товар</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <form action="{{route('edititem')}}" method="post" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="имя" class="form-control mb-3 " required value="{{$item->name}}">
                        <input type="text" name="model" placeholder="модель" class="form-control mb-3 " required value="{{$item->model}}">
                        <input type="text" name="price" placeholder="цена" class="form-control mb-3 " required value="{{$item->price}}">
                        <input type="text" name="count" placeholder="колличество" class="form-control mb-3 " required value="{{$item->count}}">
                        <input type="text" name="country" placeholder="страна производителя" class="form-control mb-3 "required value="{{$item->country}}">
                        <input type="text" name="year" placeholder="год выпуска" class="form-control mb-3 "required value="{{$item->year}}">
                        <input type="hidden" name="id" id="id" value="{{$item->id}}">
                        <select name="category" id="" class="form-select mb-3 " required>
                            <option value="">
                            @foreach ($category as $c)
                         @if ($c->id == $item->category)
                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                        @else
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endif
                            @endforeach

                        </select>
                        <label for="file" class="form-label mt-2">Фото товара</label>
                        <input type="file" id="file" name="file" class="form-control mb-3" accept="image/*" required>
                        <button type="submit" class="btn btn-success mb-3">Опубликовать</button>
                    </form>
                </div>
                <div class="col-4">
                    <div class="border rounded p-4">
                        <img src="{{$item->img}}" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
