@extends('layouts.admin')

@section('title', 'Edit '.$tier->name.' league')

@section('content')
    <x-admin.form-shell enctype="multipart/form-data" :action="route('admin.league-tiers.update', $tier)" method="PUT" :back="route('admin.league-tiers.index')" :return="$return" back-label="Back to leagues" submit="Save changes">
        <div class="flex items-center gap-3 border-b border-gray-100 pb-5">
            <x-admin.league-badge :tier="$tier" size="h-12 w-12" />
            <p class="font-display text-lg font-bold text-ink-900">{{ $tier->name }} league</p>
        </div>
        @include('admin.league-tiers._form')
    </x-admin.form-shell>
@endsection
