@extends('layouts.admin')

@section('title', 'Edit Ad Image')

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-2xl">
        <form action="{{ route('admin.ad-images.update', $ad_image) }}" method="POST" enctype="multipart/form-data">
            @include('admin.ad-images._form')
        </form>
    </div>
@endsection
