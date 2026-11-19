@extends('layouts.public')

@section('title', $item->title . ' | The Mountain School')
@section('meta_description', Str::limit(strip_tags($item->short_description), 160))

@section('content')
<section class="py-5 bg-white">
    <div class="container" style="max-width: 860px;">
        <a href="{{ route('news-events.index') }}" class="text-pink fw-bold text-decoration-none small d-inline-block mb-3">
            <i class="bi bi-arrow-left me-1"></i> Back to All News &amp; Events
        </a>

        <div class="d-flex align-items-center gap-3 mb-2">
            <span class="badge bg-pink rounded-pill px-3 py-1">{{ $item->category }}</span>
            <span class="text-muted small fw-semibold"><i class="bi bi-calendar3 me-1"></i> {{ $item->event_date->format('F d, Y') }}</span>
        </div>

        <h1 class="font-display text-navy mb-4" style="font-size: clamp(1.8rem, 3.5vw, 2.6rem);">
            {{ $item->title }}
        </h1>

        <div class="rounded-4 overflow-hidden shadow-sm mb-4">
            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-100" style="max-height: 440px; object-fit: cover;">
        </div>

        <p class="lead text-navy fw-semibold mb-4">{{ $item->short_description }}</p>

        <div class="text-dark" style="line-height: 1.8;">
            {!! $item->content !!}
        </div>
    </div>
</section>
@endsection
