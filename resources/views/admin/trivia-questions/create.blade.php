@extends('layouts.admin')

@section('title', 'Add Trivia Question')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.trivia-questions.store') }}" method="POST">
            @include('admin.trivia-questions._form')
        </form>
    </div>
@endsection
