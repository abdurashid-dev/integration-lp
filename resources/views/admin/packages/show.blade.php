@extends('admin.layouts.app')
@section('title')
    Package
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="{{$item->name}}" parent="Package" parent-icon="fas fa-box-open"
               parent-route="admin.packages.index"/>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th colspan="2" class="text-center">Package info</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <td>{{$item->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$item->name}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{number_format((int)$item->price, 0, '', ' ')}} uzs</td>
                </tr>
                <tr>
                    <th>Link</th>
                    <td><a href="{{$item->link}}">{{$item->link}}</a></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{$item->type}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$item->description}}</td>
                </tr>
                <tr>
                    <th>Technologies</th>
                    <td>
                        @foreach($item->technologies as $technology)
                            <a href="{{$technology->technology->link}}">{{$technology->technology->name}}</a> |
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Platforms</th>
                    <td>
                        @foreach($item->platforms as $platform)
                            <a href="{{$platform->platform->link}}">{{$platform->platform->name}}</a> |
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Images</th>
                    <td>
                        @foreach($item->images as $image)
                            <img src="{{asset($image->image)}}" alt="photo" class="img-thumbnail" style="width: 200px">
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
    </div>

@endsection
