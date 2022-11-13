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
                            <button type="button" class="btn btn-outline-success btn-sm text-dark"
                                onclick="changeCount({{ $c->id }},'remove')">-</button>
                            <span id="count{{ $c->id }}">{{ $c->count }}</span>
                            <button type="button" class="btn btn-outline-success btn-sm text-dark"
                                onclick="changeCount({{ $c->id }},'add')">+</button>
                        </div>
                        <div class="col-1 text-center">
                            {{ $c->price }}руб
                        </div>
                        <div class="col-2 text-center">
                            <strong id="sum{{ $c->id }}">{{ $c->count * $c->price }}руб</strong>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('deleateCart', ['id' => $c->id]) }}" class="d-inline-block btn-close"
                                aria-label="Close"></a>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-4 text-end">
                            <h3 class="mb-2">Обшая сумма- <span id="sumCart{{ $c->id }}"> {{ $cartInfo->sum }} </span></h3>
                            <form action="{{ route('ordering') }}" method="Post" id="ordering"
                                onsubmit="formAction(this,event)">
                                <div>
                                    <input class="form-control mb-2 "name="password" id="passwordInput" type="password"
                                        placeholder="Введите пароль для поттверждения">
                                    <div class="invalid-feedback" id="passwordError"></div>
                                </div>
                                <button type="submit" class="btn btn-success">Оформить заказ</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <h3>Вы еще не добавили товары в корзину</h3>
                    </div>
                </div>
                @endif



            </div>
        </div>
    </section>
@endsection
