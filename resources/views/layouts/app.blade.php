<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
</head>
<body>


<div class="container body">
    <h1>@yield('title')</h1>
    @yield('content')
</div>
</body>
</html>
