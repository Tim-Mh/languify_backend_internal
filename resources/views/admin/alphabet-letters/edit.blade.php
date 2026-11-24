@extends('layouts.admin')

@section('title', 'Edit letter')

@section('content')
    <x-admin.form-shell :action="route('admin.alphabet-letters.update', $letter)" method="PUT" :back="route('admin.alphabet-letters.index', ['language_id' => $letter->language_id])" back-label="Back to alphabet" submit="Save changes">
        @include('admin.alphabet-letters._form')
    </x-admin.form-shell>
@endsection
