@extends('layouts.admin')

@section('title', 'Add language')

@section('content')
    <x-admin.form-shell :action="route('admin.languages.store')" :back="route('admin.languages.index')" back-label="Back to languages" submit="Add language">
        @include('admin.languages._form')
    </x-admin.form-shell>
@endsection
