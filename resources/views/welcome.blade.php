@extends('layouts.frontend')
@section('title')
    Integrat
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
          integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')
    <section class="p-3 my-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center mb-3">Technologies</h2>
                <!-- carousel -->
                <div class="owl-carousel owl-theme">
                    @foreach($technologies as $technology)
                        <a href="{{route('filter', $technology->id)}}"
                           class="d-flex flex-column text-decoration-none text-dark">
                            <div>
                                <img src="{{asset($technology->image)}}" alt="logo" class="img-responsive img-thumbnail"
                                     style="width: 250px; height: 250px">
                            </div>
                            <div class="mt-2">
                                <h5 class="text-center">{{$technology->name}}</h5>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <hr class="my-5">
            <div class="row">
                <h2 class="text-center m-2">Packages</h2>
                @foreach($packages as $package)
                    <div class="col-md-4 col-sm-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">{{$package->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Platforms:
                                    @foreach($package->platforms as $platform)
                                        {{$platform->platform->name ?? 'null'}} |
                                    @endforeach
                                </h6>
                                <h6 class="card-subtitle mb-2 text-muted">Technologies:
                                    @foreach($package->technologies as $technology)
                                        {{$technology->technology->name ?? 'null'}} |
                                    @endforeach
                                </h6>
                                <p class="card-text">{!! Str::limit($package->description, 100, '...') !!}</p>
                                <span class="mx-2"><i class="fa-solid fa-download"></i>: 7500</span>
                                <span class="mx-2"><i class="fa-solid fa-star"></i>: 3000</span>
                                <span class="mx-2"><i class="fa-solid fa-coins"></i>: {{number_format($package->price, 0, '', ' ')}} uzs</span>
                                <span><a href="{{route('package', $package->id)}}">More</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                margin: 10,
                loop: true,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: false,
                        loop: false
                    }
                }
            });
        });
    </script>
@endsection
