@extends('layouts.admin')

@section('title', 'Add Chest Reward Config')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.chest-reward-configs.store') }}" method="POST">
            @include('admin.chest-reward-configs._form')
        </form>
    </div>
@endsection
