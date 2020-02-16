<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/app.js') }} "></script>
    <title>Testing Laravel 6 with GraphQL and LightHouse</title>
    @yield('header')
</head>
<body>
    <div class="container-fluid">
        <!-- Main content -->
        <h2> NavBarPlaceholder </h2>
        <div class="content">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer">
            @yield('footer')
        </div>
    </div>
</body>
</html>
