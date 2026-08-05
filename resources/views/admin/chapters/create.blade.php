@extends('layouts.admin')

@section('title', 'Add Chapter')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.chapters.store') }}" method="POST">
            @include('admin.chapters._form')
        </form>
    </div>
@endsection
