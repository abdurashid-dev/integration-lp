@extends('admin.layouts.app')
@section('title')
    Edit package
@endsection
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="Edit package" parent="Package" parent-icon="fas fa-box-open"
               parent-route="admin.packages.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.packages.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.packages.form')
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#technologies').select2();
        });
        $(document).ready(function () {
            $('#platforms').select2();
        });
    </script>
@endsection
