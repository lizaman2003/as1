<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\bootstrap.min.css">
    <link rel="stylesheet" href="\css\style.css">
    {{-- <link rel="stylesheet" href="\css\bootstrap.min.css.map"> --}}
    <title>@yield('title') -Music House</title>
</head>

<body>

    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Music House</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">Каталог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Где нас найти?</a>
                    </li>
                </ul>


                @auth
                    @if (Auth::user()->admin == 1)
                    <a href="{{ route('admin') }}" class="btn btn-outline-success ms-2">Админ панель</a>
                    <a href="{{ route('logout') }}" class="btn btn-success ms-2">Выйти</a>
                    @else
                        <a href="{{ route('cart') }}" class="btn btn-outline-success">Корзина</a>
                        <a href="{{ route('myOrders') }}" class="btn btn-outline-success">Мои заказы</a>
                        <a href="{{ route('logout') }}" class="btn btn-success ms-2">Выйти</a>
                    @endif
                @endauth
                @guest
                    <a class="btn btn-success ms-2" data-bs-toggle="modal" href="#reg" role="button">Регистрация</a>
                    <a class="btn btn-outline-success ms-2" data-bs-toggle="modal" href="#auth" role="button">Войти</a>
                @endguest

            </div>
        </div>
    </nav>
    @yield ('main')
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" id="notify" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Music House</strong>
                <small>сейчас</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <footer class="container-fluid" style="background: #212529; color:white">
        <br>
        <p class="text-center"> © 2017-2024 Company, Inc Music House </p>
        <br>
    </footer>
    <script src="\js\jquery-3.6.1.min.js"></script>
    <script src="\js\bootstrap.bundle.min.js"></script>
    <script src="\js\main.js"></script>

</body>

</html>
