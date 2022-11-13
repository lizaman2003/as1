@extends('layouts.header')
@section('title')
    Админпанель-Добавление новых товаров
@endsection
@section('main')
    <section id="item">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Добавить товар</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('addItem') }}" method="post" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="имя" class="form-control mb-3 "required>
                        <input type="text" name="model" placeholder="модель" class="form-control mb-3 "required>
                        <input type="text"name="price" placeholder="цена" class="form-control mb-3 "required>
                        <input type="text"name="count" placeholder="колличество" class="form-control mb-3 "required>
                        <input type="text"name="country" placeholder="страна производителя"
                            class="form-control mb-3 "required>
                        <input type="text"name="year" placeholder="год выпуска" class="form-control mb-3 "required>
                        <select name="category" id="" class="form-select mb-3 "required>
                            <option value="" disabled>Выбор категории</option>

                            @foreach ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach


                        </select>
                        <label for="file" class="form-label mt-2">Фото товара</label>
                        <input type="file" id="file" name="file" class="form-control mb-3" accept="image/*"
                            required>
                        <button type="submit" class="btn btn-success mb-3">Опубликовать</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
