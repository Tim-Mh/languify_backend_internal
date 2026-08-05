@extends('layouts.admin')

@section('title', 'Edit Exercise')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-3xl">
        <form action="{{ route('admin.exercises.update', $exercise) }}" method="POST">
            @include('admin.exercises._form')
        </form>
    </div>
@endsection
