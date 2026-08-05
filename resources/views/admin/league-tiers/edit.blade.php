@extends('layouts.admin')

@section('title', 'Edit League Tier')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.league-tiers.update', $tier) }}" method="POST">
            @include('admin.league-tiers._form')
        </form>
    </div>
@endsection
