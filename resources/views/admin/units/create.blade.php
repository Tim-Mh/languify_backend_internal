@extends('layouts.admin')

@section('title', 'Add unit')

@section('content')
    <x-admin.form-shell :action="route('admin.units.store')" :back="route('admin.units.index')" :return="$return" back-label="Back" submit="Add unit">
        @include('admin.units._form')
    </x-admin.form-shell>
@endsection
