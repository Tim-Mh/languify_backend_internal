@extends('layouts.admin')

@section('title', 'Edit '.$quest->title)

@section('content')
    <x-admin.form-shell :action="route('admin.quests.update', $quest)" method="PUT" :back="route('admin.quests.index')" :return="$return" back-label="Back to daily quests" submit="Save changes">
        @include('admin.quests._form')
    </x-admin.form-shell>
@endsection
