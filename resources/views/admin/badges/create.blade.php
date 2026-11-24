@extends('layouts.admin')

@section('title', 'Add badge')

@section('content')
    <x-admin.form-shell enctype="multipart/form-data" :action="route('admin.badges.store')" :back="route('admin.badges.index')" :return="$return" back-label="Back to badges" submit="Add badge">
        @include('admin.badges._form')
    </x-admin.form-shell>
@endsection
