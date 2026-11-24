@extends('layouts.admin')

@section('title', 'Add chest reward')

@section('content')
    <x-admin.form-shell :action="route('admin.chest-reward-configs.store')" :back="route('admin.chest-reward-configs.index')" :return="$return" back-label="Back to chest rewards" submit="Add chest reward">
        @include('admin.chest-reward-configs._form')
    </x-admin.form-shell>
@endsection
