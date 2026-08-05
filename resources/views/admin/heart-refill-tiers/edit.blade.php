@extends('layouts.admin')

@section('title', 'Edit Heart Refill Tier')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.heart-refill-tiers.update', $heart_refill_tier) }}" method="POST">
            @include('admin.heart-refill-tiers._form')
        </form>
    </div>
@endsection
