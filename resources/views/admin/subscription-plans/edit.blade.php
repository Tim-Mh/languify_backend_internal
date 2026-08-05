@extends('layouts.admin')

@section('title', 'Edit Subscription Plan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.subscription-plans.update', $subscription_plan) }}" method="POST">
            @include('admin.subscription-plans._form')
        </form>
    </div>
@endsection
