@extends('layouts.admin')

@section('title', 'Write an instruction')

@section('content')
    <x-admin.form-shell :action="route('admin.exercise-instructions.store')" :back="route('admin.exercise-instructions.index', ['language_id' => $defaults['language_id']])" :return="$return" back-label="Back to instructions" submit="Save instruction">
        @include('admin.exercise-instructions._form')
    </x-admin.form-shell>
@endsection
