@extends('layouts.admin')

@section('title', 'Edit Chest Reward Config')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.chest-reward-configs.update', $chest_reward_config) }}" method="POST">
            @include('admin.chest-reward-configs._form')
        </form>
    </div>
@endsection
