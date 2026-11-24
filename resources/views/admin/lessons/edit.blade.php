@extends('layouts.admin')

@section('title', 'Edit lesson')

@section('content')
    <x-admin.form-shell :action="route('admin.lessons.update', $lesson)" method="PUT" :back="route('admin.lessons.index')" :return="$return" back-label="Back" submit="Save changes">
        @include('admin.lessons._form')
    </x-admin.form-shell>
@endsection
