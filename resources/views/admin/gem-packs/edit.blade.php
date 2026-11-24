@extends('layouts.admin')

@section('title', 'Edit '.$gem_pack->title)

@section('content')
    <x-admin.form-shell :action="route('admin.gem-packs.update', $gem_pack)" method="PUT" :back="route('admin.gem-packs.index')" :return="$return" back-label="Back to gem packs" submit="Save changes">
        @include('admin.gem-packs._form')
    </x-admin.form-shell>
@endsection
