@extends('layouts.admin')

@section('title', 'Edit '.$subscription_plan->title)

@section('content')
    <x-admin.form-shell :action="route('admin.subscription-plans.update', $subscription_plan)" method="PUT" :back="route('admin.subscription-plans.index')" :return="$return" back-label="Back to plans" submit="Save changes">
        @include('admin.subscription-plans._form')
    </x-admin.form-shell>
@endsection
