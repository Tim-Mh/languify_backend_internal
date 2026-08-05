@extends('layouts.admin')

@section('title', 'Add Exercise')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-3xl">
        <form action="{{ route('admin.exercises.store') }}" method="POST">
            @include('admin.exercises._form')
        </form>
    </div>
@endsection
