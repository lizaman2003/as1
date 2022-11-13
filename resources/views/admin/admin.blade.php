@extends('layouts.header')
@section('title')
    Админпанель
@endsection
@section('main')
    <section id="catalog" class="mt-2">
        <div class="container">
            <div class="row mt-3">
                <div class="col-3">
                    <h5>Меню</h5>
                    <ul class="list-group">
                        <li class="list-group-item" onclick="adminSelect('items')"> <a href="#"
                                class="text-decoration-none text-dark d-block">Товары </a></li>
                        <li class="list-group-item"onclick="adminSelect('orders')"> <a href="#"
                                class="text-decoration-none text-dark d-block">Заказы </a></li>
                        <li class="list-group-item"onclick="adminSelect('category')"> <a href="#"
                                class="text-decoration-none text-dark d-block">Категории </a></li>
                    </ul>
                    <h5 class="mt-4">Сортировать</h5>
                    <select class="form-select" onchange="">
                        <option value="new">Новые</option>
                        <option value="confirmed">Полтвержденные</option>
                        <option value="canceled">Отмененные</option>
                    </select>
                </div>
                <div class="col-9" style="display: none" id="items">  
                    <div class="col-4 text-end">
                        <a href="{{route('addItemPage')}}" class="btn btn-success">Добавить товар</a>
                    </div> 
                    <h5>Все товары</h5>
                    <div>
                        <div class="row">
                            @foreach ($item as $i)
                                <div class="col-6">
                                    <div class="card mb-3" style="max-width: 440px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ $i->img }}" class="img-fluid rounded-start"
                                                    alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <a href="{{route('deleteItem' , ['id'=>$i->id])}}"class="btn-close d-inline-block position-absolute top-0 end-0 me-4 mt-4"
                                                        aria-label="Закрыть"> </a>
                                                    <h5 class="card-title">{{ $i->name }}{{ $i->model }}</h5>
                                                    <p class="card-text">{{ $i->price }}руб</p>
                                                    <a href="{{route('edititemPage', ['id'=> $i->id])}}" class="btn btn-success">Редактировать</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-9" style="display: none" id="orders">
                    <h5>Все заказы</h5>
                    <div>

                    </div>
                </div>
                <div class="col-9" style="display: none" id="category">
                    <h5>Все категории</h5>
                    <div>

                    </div>
                </div>
            </div>
        @endsection
