@extends('layouts.admin')

@section('title', 'Add Quest')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.quests.store') }}" method="POST">
            @include('admin.quests._form')
        </form>
    </div>
@endsection
