@extends('layouts.admin')

@section('title', 'Edit '.$badge->title)

@section('content')
    <x-admin.form-shell enctype="multipart/form-data" :action="route('admin.badges.update', $badge)" method="PUT" :back="route('admin.badges.index')" :return="$return" back-label="Back to badges" submit="Save changes">
        @include('admin.badges._form')
    </x-admin.form-shell>
@endsection
