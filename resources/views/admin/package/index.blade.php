@extends('admin.layouts.app')
@section('title')
    Packagies
@endsection
@section('content')
    <x-header icon="fas fa-box-open" title="Packagies"/>
    <livewire:package.package-table>
@endsection
