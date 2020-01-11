<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- common css -->
    <link rel="stylesheet" href="/css/front.css">
</head>
<body>

<nav class="main-header">
    <div class="nav navbar fixed-top navbar-expand-lg">
        <a class="navbar-brand page-scroll" href="/">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link page-scroll" href="/books">{{__('Книги')}}</a></li>
                <li class="nav-item"><a class="nav-link page-scroll" href="/authors">{{__('Авторы')}}</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.navbar-expand-->
</nav>

<!-- content -->
<div class="container">
    <div id="js-content">
        @yield('content')
    </div>
</div>
<!-- ./content -->

<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="text-center">&copy; 2020 <a href="#">{{config('app.name')}}, </a>
            Designed by <a href="#">shylosa</a>
        </div>
    </div>
</footer>
<!-- ./footer -->

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- js files -->
<script src="/js/front.js"></script>
</body>
</html>
