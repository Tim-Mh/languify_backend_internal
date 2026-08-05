@extends('layouts.admin')

@section('title', 'Edit Language')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.languages.update', $language) }}" method="POST">
            @include('admin.languages._form')
        </form>
    </div>
@endsection
