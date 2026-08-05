@extends('layouts.admin')

@section('title', 'Add Lesson')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.lessons.store') }}" method="POST">
            @include('admin.lessons._form')
        </form>
    </div>
@endsection
