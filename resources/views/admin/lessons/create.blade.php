@extends('layouts.admin')

@section('title', 'Add lesson')

@section('content')
    <x-admin.form-shell :action="route('admin.lessons.store')" :back="route('admin.lessons.index')" :return="$return" back-label="Back" submit="Add lesson">
        @include('admin.lessons._form')
    </x-admin.form-shell>
@endsection
