@extends('admin.layouts.app')
@section('title')
    Platforms
@endsection
@section('content')
    <x-header icon="fas fa-terminal" title="Platforms"/>
    <div class="d-flex justify-content-end py-2">
        <a href="{{route('admin.platforms.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
    </div>
    <livewire:platform.platform-table/>
@endsection
