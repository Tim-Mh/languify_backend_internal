@extends('layouts.admin')

@section('title', 'Edit exercise')

@section('content')
    <x-admin.form-shell :action="route('admin.exercises.update', $exercise)" method="PUT" :back="route('admin.exercises.index', ['lesson_id' => $exercise->lesson_id])" :return="$return" back-label="Back" submit="Save changes">
        @include('admin.exercises._form')
    </x-admin.form-shell>
@endsection
