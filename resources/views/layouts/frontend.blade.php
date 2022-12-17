<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @yield('styles')
</head>
<body>
<nav class="navbar sticky-top bg-dark text-white">
    <div class="container">
        <a class="navbar-brand text-white text-bold" href="/">Integration</a>
    </div>
</nav>
<section style="background-color: #f28d1a">
    <h3 class="text-center text-white p-3">Ready packages for web artisans</h3>
</section>
@yield('content')
<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-light">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        <div class="d-inline-block mx-3">
            Contact:
            <a class="text-reset" href="tel:+998331212776">+998331212776</a>
        </div>
        <div class="d-inline-block mx-3">
            Telegram:
            <a class="text-reset" href="https://t.me/shaxzodbekQ">@shaxzodbekQ</a>
        </div>
        <div class="d-inline-block mx-3">
            Email:
            <a class="text-reset" href="mailto:shaxzodbek.qambaraliyev@gmail.com">
                shaxzodbek.qambaraliyev@gmail.com</a>
        </div>
    </div>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="https://blaze.uz/">Blaze Team</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
@yield('scripts')
<script>
    window.replainSettings = {id: '112da323-efc2-41ba-91f1-84d8e04bdb1e'};
    (function (u) {
        var s = document.createElement('script');
        s.async = true;
        s.src = u;
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })('https://widget.replain.cc/dist/client.js');
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
