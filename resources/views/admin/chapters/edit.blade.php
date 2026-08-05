@extends('layouts.admin')

@section('title', 'Edit Chapter')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.chapters.update', $chapter) }}" method="POST">
            @include('admin.chapters._form')
        </form>
    </div>
@endsection
