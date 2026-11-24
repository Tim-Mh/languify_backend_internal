@extends('layouts.admin')

@section('title', 'Add heart refill')

@section('content')
    <x-admin.form-shell :action="route('admin.heart-refill-tiers.store')" :back="route('admin.heart-refill-tiers.index')" :return="$return" back-label="Back to heart refills" submit="Add heart refill">
        @include('admin.heart-refill-tiers._form')
    </x-admin.form-shell>
@endsection
