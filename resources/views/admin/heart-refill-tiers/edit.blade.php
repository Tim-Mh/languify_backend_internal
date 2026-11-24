@extends('layouts.admin')

@section('title', 'Edit '.$heart_refill_tier->title)

@section('content')
    <x-admin.form-shell :action="route('admin.heart-refill-tiers.update', $heart_refill_tier)" method="PUT" :back="route('admin.heart-refill-tiers.index')" :return="$return" back-label="Back to heart refills" submit="Save changes">
        @include('admin.heart-refill-tiers._form')
    </x-admin.form-shell>
@endsection
