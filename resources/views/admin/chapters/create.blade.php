@extends('layouts.admin')

@section('title', 'Add chapter')

@section('content')
    <x-admin.form-shell :action="route('admin.chapters.store')" :back="route('admin.chapters.index')" :return="$return" back-label="Back" submit="Add chapter">
        @include('admin.chapters._form')
    </x-admin.form-shell>
@endsection
