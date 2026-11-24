@extends('layouts.admin')

@section('title', 'Add letter')

@section('content')
    <x-admin.form-shell :action="route('admin.alphabet-letters.store')" :back="route('admin.alphabet-letters.index', ['language_id' => $selectedLanguageId])" back-label="Back to alphabet" submit="Add letter">
        @include('admin.alphabet-letters._form')
    </x-admin.form-shell>
@endsection
