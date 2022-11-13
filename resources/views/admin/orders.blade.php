@extends('layouts.header')
@section('title')
    Список заказов
@endsection
@section('main')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Список заказов</h2>
                </div>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-10">
                        <label for="sort-ststus">Фильтровать по статусу</label>
                        <select name="status" id="sort-status" class="form-select">
                            <option value="0">Все</option>
                            <option value="1">Новый</option>
                            <option value="2">Поттвержденн</option>
                            <option value="0">Отклонен</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success w-100">Фильтровать</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-1 text-center">
                    <strong>ID</strong>
                </div>
                <div class="col-3 text-center">
                    <strong>Дата оформления</strong>
                </div>
                <div class="col-3 text-center">
                    <strong>Фио заказчика</strong>
                </div>
                <div class="col-3 text-center">
                    <strong>кол-во товаров</strong>
                </div>
            </div>
            @foreach($orders as $o)
            <div class="row">
                <div class="col-1 text-center">
                    {{$o->id}}</div>
                        <div class="col-3 text-center">
                            {{$o->date}}
                            <div class="col-3 text-center">
                                {{$o->name}} {{$o->surname}}{{$o->patronymic}}
                            </div>
                            <div class="col-3 text-center">
                                {{$o->count}}
                            </div>
                            <div class="col-2">
                                <a href="#" class="btn-btn-success">Подробнее</a>
                                <a href="#" class="btn-btn-success">Подробнее</a>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>

    </section>
@endsection
