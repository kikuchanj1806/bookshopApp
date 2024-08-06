<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Default Title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=6, user-scalable=no">
    <!-- Bao gồm các tệp CSS -->
    <script src="/public/assets/js/jquery.min.js"></script>
    <script src="/public/assets/slick/slick.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link href="/public/assets/css/Awesome_Pro_6.0.0.min.css" rel="stylesheet">
    <link href="/public/assets/slick/slick.css" rel="stylesheet">
    <link href="/public/assets/slick/slick-theme.css" rel="stylesheet">
    <link href="/public/assets/css/index.css" rel="stylesheet">
    <link href="/public/assets/css/category.css" rel="stylesheet">
    <link href="/public/assets/css/footer.css" rel="stylesheet">
    <link href="/public/assets/css/detail.css" rel="stylesheet">
    <link href="/public/assets/css/card.css" rel="stylesheet">
    <link href="/public/assets/css/styleAdmin/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/header.css">
</head>
<body>
<header>
    @include('website.partials.header')
</header>

<div class="content">
    @yield('content')
</div>

<footer>
    @include('website.partials.footer')
</footer>

<!-- Bao gồm các tệp JS -->
<script src="/public/assets/js/main.js"></script>
</body>
</html>
