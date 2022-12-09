@extends('admin.layouts.app')
@section('title')
    Create package
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="Create package" parent="Package" parent-icon="fas fa-box-open"
               parent-route="admin.packages.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.packages.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.packages.form')
            </form>
        </div>
    </div>
@endsection
