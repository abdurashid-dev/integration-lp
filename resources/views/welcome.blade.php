<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Integration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('includes/frontend/app.css')}}">
</head>
<body>
<section class="wrap">
    <header class="navbar-wrapper navbar-fixed-top">
        <nav class="container">
            <div class="navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1 class="navbar-brand"><a href="{!!env('APP_URL')!!}">Integration</a> <em
                            class="hidden-sm hidden-xs">The Package Market</em></h1>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/">Browse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="wrapper wrapper-search">
        <div class="container with-description text-center">
            <h1>Integration</h1>
        </div>
    </section>
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <ul class="packages list-unstyled">
                    <li class="row" style="width: auto">
                        @foreach($packages as $package)
                            <div class="col-md-5 col-sm-12 package-item" style="margin: 25px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Package name: {{$package->name}}</h3>
                                        <h5 class="card-title">Platforms:
                                            @foreach($package->platforms as $platform)
                                                {{$platform->platform->name ?? 'null'}} |
                                            @endforeach
                                        </h5>
                                        <h5 class="card-title">Technologies:
                                            @foreach($package->technologies as $technology)
                                                {{$technology->technology->name ?? 'null'}} |
                                            @endforeach
                                        </h5>
                                        <p class="card-text">{!! Str::limit($package->description, 50, '...') !!}</p>
                                        <div class="row m-3">
                                            <div class="col-md-3">
                                                <i class="fa-solid fa-download"></i>: 7500
                                            </div>
                                            <div class="col-md-3">
                                                <i class="fa-solid fa-star"></i>: 3000
                                            </div>
                                            <div class="col-md-3" style="width: 30%">
                                                <i class="fa-solid fa-coins"></i>: {{number_format($package->price, 0, '', ' ')}}
                                                uzs
                                            </div>
                                            <div class="col-md-3" style="width: 20%">
                                                <a href="{{route('package', $package->id)}}"
                                                   class="">More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </section>
</section>
<script nonce="">
    var algoliaConfig = {
        "app_id": "M58222SH95",
        "search_key": "5ae4d03c98685bd7364c2e0fd819af05",
        "index_name": "packagist"
    };
    window.process = {
        env: {DEBUG: undefined},
    };
</script>
<script src="{{asset('includes/frontend/app.js')}}"></script>
</body>
</html>
