@extends('layouts.admin')

@section('title', 'Edit Alphabet Letter')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.alphabet-letters.update', $letter) }}" method="POST">
            @include('admin.alphabet-letters._form')
        </form>
    </div>
@endsection
