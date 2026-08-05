@extends('layouts.admin')

@section('title', 'Add Trivia Topic')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.trivia-topics.store') }}" method="POST">
            @include('admin.trivia-topics._form')
        </form>
    </div>
@endsection
