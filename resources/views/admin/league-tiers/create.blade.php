@extends('layouts.admin')

@section('title', 'Add league')

@section('content')
    <x-admin.form-shell enctype="multipart/form-data" :action="route('admin.league-tiers.store')" :back="route('admin.league-tiers.index')" :return="$return" back-label="Back to leagues" submit="Add league">
        @include('admin.league-tiers._form')
    </x-admin.form-shell>
@endsection
