@extends('layouts.admin')

@section('title', 'Edit Exercise Instruction')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.exercise-instructions.update', $instruction) }}" method="POST">
            @include('admin.exercise-instructions._form')
        </form>
    </div>
@endsection
