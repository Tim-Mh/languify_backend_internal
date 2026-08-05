@extends('layouts.admin')

@section('title', 'Add Alphabet Letter')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.alphabet-letters.store') }}" method="POST">
            @include('admin.alphabet-letters._form')
        </form>
    </div>
@endsection
