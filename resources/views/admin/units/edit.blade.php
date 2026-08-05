@extends('layouts.admin')

@section('title', 'Edit Unit')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.units.update', $unit) }}" method="POST">
            @include('admin.units._form')
        </form>
    </div>
@endsection
