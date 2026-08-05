@extends('layouts.admin')

@section('title', 'Add Badge')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.badges.store') }}" method="POST">
            @include('admin.badges._form')
        </form>
    </div>
@endsection
