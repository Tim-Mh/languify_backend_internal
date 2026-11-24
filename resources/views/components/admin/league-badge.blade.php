@props(['tier', 'size' => 'h-14 w-14'])

{{-- A league's badge picture: the one an admin uploaded, else the built-in
     one from public/images/leagues. Leagues without a picture get the first
     letter of their name in a grey circle instead. --}}
@php $src = $tier->imageUrl(); @endphp

@if ($src)
    <img src="{{ $src }}" alt="" {{ $attributes->merge(['class' => $size.' shrink-0 object-contain']) }}>
@else
    <span aria-hidden="true" {{ $attributes->merge(['class' => $size.' inline-flex shrink-0 items-center justify-center rounded-full bg-gray-100 font-display text-lg font-bold text-gray-500 ring-1 ring-gray-200']) }}>{{ mb_strtoupper(mb_substr($tier->name, 0, 1)) }}</span>
@endif
