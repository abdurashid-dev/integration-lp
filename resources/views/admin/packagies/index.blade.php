@extends('admin.layouts.app')
@section('title')
    Packagies
@endsection
@section('content')
    <x-header icon="fas fa-box-open" title="Packagies"/>
    <div class="d-flex justify-content-end py-2">
        <a href="{{route('admin.packagies.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
    </div>
    <livewire:package.package-table>
@endsection
