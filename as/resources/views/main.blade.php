@extends('layouts.header')
@section('title')
Главная
@endsection
@section('main')
<div class="modal fade" id="reg" tabindex="-1" aria-labelledby="reg" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reg">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" id="name" class="form-control" placeholder="Имя" required>
                </div>
                <div class="invalid-feedback" id="nameError "></div>
                <div class="input-group mb-3">
                    <input type="text" id="login" class="form-control" placeholder="Логин" required>
                </div>
                <div class="invalid-feedback" id="loginError "></div>
                <div class="input-group mb-3">
                    <input type="email" id="email" class="form-control" placeholder="email" required>
                </div>
                <div class="invalid-feedback" id="emailError "></div>
                <div class="input-group mb-3">
                    <input type="password" id="pass1" class="form-control" placeholder="Пароль" required>
                </div>
                <div class="invalid-feedback" id="pass1Error "></div>
                <div class="input-group mb-3">
                    <input type="password" id="pass2" class="form-control" placeholder="Повторите пароль" required>
                </div>
                <div class="invalid-feedback" id="pass1Error "></div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="sogl" required>
                    <label class="form-check-label" for="exampleCheck1"> Согласие на обработку персональных данных</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Зарегистрироваться</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="auth" tabindex="-1" aria-labelledby="auth" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="auth">Авторизация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" id="login" class="form-control" placeholder="Логин" required>
                </div>
                <div class="invalid-feedback" id="loginError "></div>

                <div class="input-group mb-3">
                    <input type="password" id="pass1" class="form-control" placeholder="Пароль" required>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success">Войти</button>
            </div>
        </div>
    </div>
</div>
<section id="home" class="bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid py-5">
                                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                                <button class="btn btn-success btn-lg" type="button">Example button</button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container-fluid py-5">
                                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                                <button class="btn btn-success btn-lg" type="button">Example button</button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container-fluid py-5">
                                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                                <button class="btn btn-success btn-lg" type="button">Example button</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section id="catalog" class="mt-2">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h5>Категории</h5>
                <ul class="list-group">
                    @foreach ($catigories as $c)
                    <li class="list-group-item"> <a href="{{route ('category', ['id'=>$c->id])}}" class="text-decoration-none text-dark d-block">{{$c->name}} </a> </li>
                    @endforeach
                </ul>
                <h5 class="mt-4">Сортировать</h5>
                <select class="form-select" onchange="sorting(1,1)">
                    <option value="year">по году производства</option>
                    <option value="name">по наименованию</option>
                    <option value="price">по цене</option>
                </select>
            </div>
            <div class="col-9">
                <h5>Все товары</h5>
                <div class="row">
                    @if($item && !$item->isEmpty())
                    @foreach ($item as $i)
                    <div class="col-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="text-center p-3">
                                <img src="{{$i->img}}" alt="" width="250">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$i->name}}{{$i->model}}</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-outline-success ">Подробнее</a>
                                        <button type="button" class="btn btn-sm btn-success">В корзину</button>
                                    </div>
                                    <small class="text-muted">{{$i->price}} руб.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection