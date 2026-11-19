@extends('layouts.public')

@section('title', 'News & Events | The Mountain School')
@section('meta_description', 'Stay updated with the latest news, campus events, and student achievements at The Mountain School.')

@section('content')
<section class="bg-navy text-white py-5">
    <div class="container">
        <h1 class="section-title text-white mb-2">NEWS &amp; EVENTS</h1>
        <p class="text-white-50 mb-0">Celebrating milestones, campus activities, and announcements.</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex flex-wrap gap-2 mb-4">
            <a href="{{ route('news-events.index') }}"
               class="btn btn-pill {{ empty($category) ? 'btn-pink' : 'btn-outline-navy' }}">All</a>
            @foreach(['News', 'Event', 'Achievement'] as $cat)
                <a href="{{ route('news-events.index', ['category' => $cat]) }}"
                   class="btn btn-pill {{ $category === $cat ? 'btn-pink' : 'btn-outline-navy' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <div class="row g-4">
            @forelse($newsEvents as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="stage-card">
                        <div class="position-relative">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="stage-card-img">
                            <span class="badge bg-pink text-white rounded-pill position-absolute top-0 start-0 m-3">
                                {{ $item->category }}
                            </span>
                        </div>
                        <div class="stage-card-body">
                            <div>
                                <small class="text-muted fw-bold d-block mb-1">{{ $item->event_date->format('d M Y') }}</small>
                                <h5 class="font-display text-navy mb-2" style="font-size: 1.15rem;">
                                    <a href="{{ route('news-events.show', $item->slug) }}" class="text-navy text-decoration-none">
                                        {{ $item->title }}
                                    </a>
                                </h5>
                                <p class="text-muted small mb-3">{{ $item->short_description }}</p>
                            </div>
                            <a href="{{ route('news-events.show', $item->slug) }}" class="text-pink fw-bold text-decoration-none small">
                                Read More <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No items found for this category.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $newsEvents->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
