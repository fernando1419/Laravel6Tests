<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <title>Testing Laravel 6 with GraphQL and LightHouse</title>
    @yield('header')
</head>
<body>
    <div class="container-fluid">
        <!-- Main content -->
        <!--Navbar-->
        <nav class="navbar navbar-dark bg-dark">
            <a class="nav-item nav-link" href="{{ route('articles.index') }} "> List Articles</a>
        </nav>
        <!--/.Navbar-->

        <div class="content">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer">
            @yield('footer')
        </div>
    </div>

    <script src="{{ mix('/js/app.js') }} "></script>
</body>
</html>
