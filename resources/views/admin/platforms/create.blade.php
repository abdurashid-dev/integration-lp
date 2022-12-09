@extends('admin.layouts.app')
@section('title')
    Create platform
@endsection
@section('content')
    <x-headers icon="fas fa-plus" title="Create platform" parent="Platform" parent-icon="fas fa-parking"
               parent-route="admin.platforms.index"/>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.platforms.store')}}" method="POST">
                @csrf
                @include('admin.platforms.form')
            </form>
        </div>
    </div>
@endsection
