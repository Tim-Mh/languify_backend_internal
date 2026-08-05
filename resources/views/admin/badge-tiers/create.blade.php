@extends('layouts.admin')

@section('title', 'Add Badge Tier')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.badge-tiers.store') }}" method="POST">
            @include('admin.badge-tiers._form')
        </form>
    </div>
@endsection
