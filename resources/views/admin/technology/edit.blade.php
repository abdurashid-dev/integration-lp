@extends('admin.layouts.app')
@section('title')
    Edit technology
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="Edit technology" parent="Technologies" parent-icon="fas fa-terminal"
               parent-route="admin.technologies.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.technologies.update', $technology)}}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.technology.form')
            </form>
        </div>
    </div>
@endsection
