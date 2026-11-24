@extends('layouts.admin')

@section('title', 'Add gem pack')

@section('content')
    <x-admin.form-shell :action="route('admin.gem-packs.store')" :back="route('admin.gem-packs.index')" :return="$return" back-label="Back to gem packs" submit="Add gem pack">
        @include('admin.gem-packs._form')
    </x-admin.form-shell>
@endsection
