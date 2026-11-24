@extends('layouts.admin')

@section('title', 'Edit chapter')

@section('content')
    <x-admin.form-shell :action="route('admin.chapters.update', $chapter)" method="PUT" :back="route('admin.chapters.index')" :return="$return" back-label="Back" submit="Save changes">
        @include('admin.chapters._form')
    </x-admin.form-shell>
@endsection
