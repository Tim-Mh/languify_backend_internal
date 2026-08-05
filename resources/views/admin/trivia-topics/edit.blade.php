@extends('layouts.admin')

@section('title', 'Edit Trivia Topic')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.trivia-topics.update', $topic) }}" method="POST">
            @include('admin.trivia-topics._form')
        </form>
    </div>
@endsection
