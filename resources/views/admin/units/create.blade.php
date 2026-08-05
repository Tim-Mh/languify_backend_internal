@extends('layouts.admin')

@section('title', 'Add Unit')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.units.store') }}" method="POST">
            @include('admin.units._form')
        </form>
    </div>
@endsection
