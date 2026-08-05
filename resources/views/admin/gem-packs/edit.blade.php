@extends('layouts.admin')

@section('title', 'Edit Gem Pack')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.gem-packs.update', $gem_pack) }}" method="POST">
            @include('admin.gem-packs._form')
        </form>
    </div>
@endsection
