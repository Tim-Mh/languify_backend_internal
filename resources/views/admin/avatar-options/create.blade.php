@extends('layouts.admin')

@section('title', 'Add Avatar Option')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.avatar-options.store') }}" method="POST">
            @include('admin.avatar-options._form')
        </form>
    </div>
@endsection
