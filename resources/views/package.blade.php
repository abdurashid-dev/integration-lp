<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Integration</title>
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
    <section>
        <section class="container">
            <div id="search-container" class="hidden">
                <div class="row">
                    <div class="search-list col-md-9"></div>

                    <div class="search-facets col-md-3">
                        <div class="search-facets-active-filters"></div>
                        <div class="search-facets-type"></div>
                        <div class="search-facets-tags"></div>
                    </div>
                </div>
            </div>

            <div class="row" id="view-package-page">
                <div class="col-xs-12 package">
                    <div class="package-header">

                        <div class="row">
                            <div class="col-md-9">
                                <h2 class="title">
                                    {{$package->name}}
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-8">
                            <h4 class="description">{{$package->description}}</h4>
                            <br>
                            @if(!is_null($package->images))
                                @foreach($package->images as $image)
                                    <img class="img-thumbnail" style="width: 700px; margin: 15px;"
                                         src="{{asset($image->image)}}" alt="package">
                                @endforeach
                            @endif
                        </div>

                        <div class="col-md-offset-1 col-md-3">
                            <div class="row package-aside">
                                <div class="details col-xs-12 col-sm-6 col-md-12">
                                    <h5>Maintainers:</h5>
                                    <p class="canonical">
                                        John Doe
                                    </p>

                                    <h5>Platforms:</h5>
                                    @foreach($package->platforms as $platform)
                                        <p class="canonical">
                                            <a href="{{$platform->platform->link}}"
                                               title="{{$platform->platform->name}}">{{$platform->platform->name}}</a>
                                        </p>
                                    @endforeach
                                    <h5>Technologies:</h5>
                                    @foreach($package->technologies as $technology)
                                        <p class="canonical">
                                            <a href="{{$technology->technology->link}}"
                                               title="{{$technology->technology->name}}">{{$technology->technology->name}}</a>
                                        </p>
                                    @endforeach
                                    <h5>Price:</h5>
                                        <p class="canonical">
                                            {{number_format($package->price, 0, '', ' ')}} uzs
                                        </p>
                                </div>

                                <div class="facts col-xs-12 col-sm-6 col-md-12">
                                    <h5 class="canonical">Statistics:</h5>
                                    <p>
                                <span>
                                    <a href="/packages/symfony/polyfill-mbstring/stats" rel="nofollow">Installs</a>:
                                </span>
                                        590&thinsp;721&thinsp;452 </p>
                                    <p>
                                    <span>
                                        <a href="/packages/symfony/polyfill-mbstring/dependents?order_by=downloads"
                                           rel="nofollow">Dependents</a>:
                                    </span>
                                        367
                                    </p>
                                    <p>
                                    <span>
                                        <a href="/packages/symfony/polyfill-mbstring/suggesters" rel="nofollow">Suggesters</a>:
                                    </span>
                                        28
                                    </p>
                                    <p>
                                    <span>
                                        <a href="/packages/symfony/polyfill-mbstring/advisories"
                                           rel="nofollow">Security</a>:
                                    </span>
                                        0
                                    </p>
                                    <p>
                                    <span>
                                        <a href="https://github.com/symfony/polyfill-mbstring/stargazers">Stars</a>:
                                    </span>
                                        7&thinsp;540
                                    </p>
                                    <p>
                                    <span>
                                        <a href="https://github.com/symfony/polyfill-mbstring/watchers">Watchers</a>:
                                    </span> 9
                                    </p>
                                    <p>
                                    <span>
                                        <a href="https://github.com/symfony/polyfill-mbstring/network">Forks</a>:
                                    </span>
                                        37
                                    </p>
                                </div>
                            </div>
                        </div>
                        <br class="clearfix">
                    </div>
                </div>
            </div>
        </section>
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

