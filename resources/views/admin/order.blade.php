@extends('layouts.header')
@section('title')
    Админпанель-Добавление новых товаров
@endsection
@section('main')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Заказ 1 от</h2><span class="badge bg-secondary">10.10.2022</span>
                    <p><strong>Дата оформления:</strong></p>
                    <p><strong>ФИО заказчика:</strong></p>
                    <p><strong>Кол-во товаров:</strong></p>
                    <p><strong>Статус:</strong></p>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-4">
                                
                                <select name="status" id="" class="form-select">
                                    <option value="Поттвержден">Поттвержден</option>
                                    <option value="Отклонен">Отклонен</option>
                                </select>
                                <textarea name="adminComent" id="adminComent" cols="30" rows="3"></textarea>
                                <col-2>
                                <button type="submit" class="btn btn-success"> Cменить статус</button>
                                </col-2>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @section
