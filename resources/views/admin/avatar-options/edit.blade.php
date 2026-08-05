@extends('layouts.admin')

@section('title', 'Edit Avatar Option')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.avatar-options.update', $option) }}" method="POST">
            @include('admin.avatar-options._form')
        </form>
    </div>
@endsection
