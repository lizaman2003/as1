@extends('layouts.header')
@section('title')
    Корзина
@endsection
@section('main')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Корзина товаров <span class="badge bg-success">{{ $cartInfo->count }}</span></h2>
                    @if ($cart && !$cart->isEmpty())
                        <div class="row mt-4 align-items-center">
                            <div class="col-1 text-center">
                                <strong>№</strong>
                            </div>
                            <div class="col-2 text-center">
                                <strong>Картинка</strong>
                            </div>
                            <div class="col-3">
                                <strong>Название товара</strong>
                            </div>
                            <div class="col-2 text-center">
                                <strong>Колличество</strong>
                            </div>
                            <div class="col-1 text-center">
                                <strong>Одна еденица</strong>
                            </div>
                            <div class="col-2 text-center">
                                <strong>Сумма</strong>
                            </div>
                        </div>
                </div>
                @foreach ($cart as $c)
                    <div class="row mt-4 align-items-center">
                        <div class="col-1 text-center">
                            <strong></strong>
                        </div>
                        <div class="col-2 text-center">
                            <img src="{{ $c->img }}" height="60" alt="">
                        </div>

                        <div class="col-3">
                            <strong>{{ $c->name }}{{ $c->model }}</strong>
                        </div>
                        <div class="col-2 text-center">
                            <button type="button" class="btn btn-outline-success btn-sm text-dark">-</button>
                            <span id="count1">{{ $c->count }}</span>
                            <button type="button" class="btn btn-outline-success btn-sm text-dark">+</button>
                        </div>
                        <div class="col-1 text-center">
                            {{ $c->price }}руб
                        </div>
                        <div class="col-2 text-center">
                            <strong>{{ $c->count * $c->price }}руб</strong>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('deleateCart', ['id' => $c->id]) }}" class="d-inline-block btn-close"
                                aria-label="Close"></a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Вы еще не добавили товары в корзину</h3>
                    </div>
                </div>
                @endif


                <div class="row">
                    <div class="col-12 text-end">
                        <h3>Обшая сумма- {{ $cartInfo->sum }}</h3>
                        <a href="#" class="btn btn-success">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
