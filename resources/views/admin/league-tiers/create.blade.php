@extends('layouts.admin')

@section('title', 'Add League Tier')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.league-tiers.store') }}" method="POST">
            @include('admin.league-tiers._form')
        </form>
    </div>
@endsection
