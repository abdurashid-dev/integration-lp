@extends('layouts.frontend')
@section('title')
    Package
@endsection
@section('content')
    <section class="m-3" style="min-height: 70vh">
        <div class="container">
            <h2>{{$package->name}}</h2>
            <hr>
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-3">
                    <p>{!! $package->description !!}</p>
                    <hr>
                    <p>IMAGES</p>
                    @if(!is_null($package->images))
                        @foreach($package->images as $image)
                            <img src="{{asset($image->image)}}" class="img-thumbnail img-responsive" alt="package" style="width: 400px">
                        @endforeach
                    @endif
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="2" class="text-center">Information</th>
                        </tr>
                        <tr>
                            <th>Authors:</th>
                            <td>John Doe</td>
                        </tr>
                        <tr>
                            <th>Platforms:</th>
                            <td>
                                @foreach($package->platforms as $platform)
                                    <a href="{{$platform->platform->link}}"
                                       title="{{$platform->platform->name}}">{{$platform->platform->name}}</a> |
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Technologies:</th>
                            <td>
                                @foreach($package->technologies as $technology)
                                    <a href="{{$technology->technology->link}}"
                                       title="{{$technology->technology->name}}">{{$technology->technology->name}}</a>
                                    |
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{$package->type}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{number_format($package->price, 0, '', ' ')}} uzs</td>
                        </tr>
                        <tr>
                            <th>Link:</th>
                            <td><a href="{{$package->link}}">Link</a></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </section>
@endsection
