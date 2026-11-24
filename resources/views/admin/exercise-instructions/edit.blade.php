@extends('layouts.admin')

@section('title', 'Edit instruction')

@section('content')
    <x-admin.form-shell :action="route('admin.exercise-instructions.update', $instruction)" method="PUT" :back="route('admin.exercise-instructions.index', ['language_id' => $instruction->language_id])" :return="$return" back-label="Back to instructions" submit="Save changes">
        @include('admin.exercise-instructions._form')
    </x-admin.form-shell>
@endsection
