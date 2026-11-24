@extends('layouts.admin')

@section('title', 'Edit '.$chest_reward_config->label)

@section('content')
    <x-admin.form-shell :action="route('admin.chest-reward-configs.update', $chest_reward_config)" method="PUT" :back="route('admin.chest-reward-configs.index')" :return="$return" back-label="Back to chest rewards" submit="Save changes">
        @include('admin.chest-reward-configs._form')
    </x-admin.form-shell>
@endsection
