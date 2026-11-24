@extends('layouts.admin')

@section('title', 'Add subscription plan')

@section('content')
    <x-admin.form-shell :action="route('admin.subscription-plans.store')" :back="route('admin.subscription-plans.index')" :return="$return" back-label="Back to plans" submit="Add plan">
        @include('admin.subscription-plans._form')
    </x-admin.form-shell>
@endsection
