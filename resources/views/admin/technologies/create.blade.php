@extends('admin.layouts.app')
@section('title')
    Create technology
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="Create technology" parent="Technologies" parent-icon="fas fa-terminal"
               parent-route="admin.technologies.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.technologies.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.technologies.form')
            </form>
        </div>
    </div>
@endsection
