@extends('layouts.admin')

@section('title', 'Add exercise')

@section('content')
    <x-admin.form-shell :action="route('admin.exercises.store')" :back="route('admin.exercises.index')" :return="$return" back-label="Back" submit="Add exercise">
        @include('admin.exercises._form')
    </x-admin.form-shell>
@endsection
