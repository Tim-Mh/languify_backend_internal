@extends('layouts.admin')

@section('title', 'Add daily quest')

@section('content')
    <x-admin.form-shell :action="route('admin.quests.store')" :back="route('admin.quests.index')" :return="$return" back-label="Back to daily quests" submit="Add quest">
        @include('admin.quests._form')
    </x-admin.form-shell>
@endsection
