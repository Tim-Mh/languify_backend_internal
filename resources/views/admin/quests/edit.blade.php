@extends('layouts.admin')

@section('title', 'Edit Quest')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.quests.update', $quest) }}" method="POST">
            @include('admin.quests._form')
        </form>
    </div>
@endsection
