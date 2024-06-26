<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="{{ route('book.index') }} ">Книги</a>
                            <a class="nav-link" href="{{ route('book.create') }}">Добавить книгу</a>
                            <a class="nav-link" href="{{ route('author.create') }}">Добавить автора</a>
                            <a class="nav-link" href="#">Отключенная</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        @yield('content')
    </div>
    @vite(['resources/js/app.js'])
</body>
</html>
