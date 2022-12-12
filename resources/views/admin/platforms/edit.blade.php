@extends('admin.layouts.app')
@section('title')
    Edit platform
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="Edit platform" parent="Platform" parent-icon="fas fa-parking"
               parent-route="admin.platforms.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.platforms.update', $item)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.platforms.form')
            </form>
        </div>
    </div>
@endsection
