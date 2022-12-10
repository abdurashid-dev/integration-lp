@extends('layouts.frontend')
@section('title')
    Integrat
@endsection
@section('content')
    <section class="p-3 my-5">
        <div class="container">
            <div class="row">
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
