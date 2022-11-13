@extends('layouts.header')
@section('title')
    Корзина
@endsection
@section('main')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <h2>
                        Мои заказы
                    </h2>
                </div>
                <div class="row mt-4">
                    @if ($myOrders && !$myOrders->isEmpty())
                        @foreach ($myOrders as $m)
                            <div class="col-4 mb-4">
                                <div class="shadow-sm rounded p-4 position-relative">
                                    @if ($m->status == 'Новый')
                                        <a href="{{route('deleteOrder',['id'=>$m->id])}}"
                                            class="btn-close d-inline-block position-absolute top-0 end-0 me-4 mt-4"
                                            aria-label="Закрыть"> </a>
                                    @endif
                                    <h5>Заказ {{ $m->id }} от <span class="badge bg-success">
                                            {{ date('d.m.Y', strtotime($m->date)) }} </span></h5>
                                    <p class="my-2"><strong>Колличество товаров:</strong>{{ $m->count }}</p>
                                    <p class="mb-0"><strong>Статус заказа:</strong>
                                        @if ($m->status == 'Новый')
                                            <span class="badge bg-primary"> {{ $m->status }} </span>
                                        @endif
                                        @if ($m->status == 'Подтвержден')
                                            <span class="badge bg-success"> {{ $m->status }} </span>
                                        @endif
                                        @if ($m->status == 'Отклонен')
                                            <span class="badge bg-danger"> {{ $m->status }} </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
