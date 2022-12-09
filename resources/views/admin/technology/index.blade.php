@extends('admin.layouts.app')
@section('title')
    Technology
@endsection
@section('content')
    <x-header icon="fas fa-terminal" title="Technology"/>
    <div class="d-flex justify-content-end py-2">
        <a href="{{route('admin.technologies.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
    </div>
    <livewire:technology.technology-table>
@endsection
