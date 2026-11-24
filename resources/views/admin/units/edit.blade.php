@extends('layouts.admin')

@section('title', 'Edit unit')

@section('content')
    <x-admin.form-shell :action="route('admin.units.update', $unit)" method="PUT" :back="route('admin.units.index')" :return="$return" back-label="Back" submit="Save changes">
        @include('admin.units._form')
    </x-admin.form-shell>
@endsection
