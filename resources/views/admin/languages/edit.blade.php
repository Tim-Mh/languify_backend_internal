@extends('layouts.admin')

@section('title', 'Edit '.$language->name)

@section('content')
    <x-admin.form-shell :action="route('admin.languages.update', $language)" method="PUT" :back="route('admin.languages.index')" back-label="Back to languages" submit="Save changes">
        @include('admin.languages._form')
    </x-admin.form-shell>
@endsection
