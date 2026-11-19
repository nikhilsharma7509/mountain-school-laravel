<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'The Mountain School')</title>
    <meta name="description" content="@yield('meta_description', 'The Mountain School - Early Childhood Excellence')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --brand-pink: #E91E7E; --brand-navy: #083B73; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Fredoka', sans-serif; text-transform: uppercase; }
        .section-title { font-family: 'Fredoka', sans-serif; font-weight: 700; font-size: clamp(1.45rem, 2.6vw, 2.15rem); text-transform: uppercase; }
        .text-pink { color: var(--brand-pink) !important; }
        .text-navy { color: var(--brand-navy) !important; }
        .bg-pink { background-color: var(--brand-pink) !important; }
        .bg-navy { background-color: var(--brand-navy) !important; }
        .btn-pill { border-radius: 50rem; font-weight: 700; font-size: 0.82rem; padding: 0.55rem 1.35rem; }
        .btn-pink { background: var(--brand-pink); color: #fff; border: 2px solid var(--brand-pink); }
        .btn-pink:hover { background: #c91469; color: #fff; }
        .btn-outline-navy { border: 2px solid var(--brand-navy); color: var(--brand-navy); }
        .btn-outline-navy:hover { background: var(--brand-navy); color: #fff; }
        .stage-card { background: #fff; border-radius: 18px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.08); height: 100%; display: flex; flex-direction: column; }
        .stage-card-img { height: 200px; width: 100%; object-fit: cover; }
        .stage-card-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; justify-content: space-between; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-2">
        <div class="container">
            <a class="navbar-brand fw-bold text-navy" href="{{ route('home') }}">
                <span class="text-pink font-display">THE MOUNTAIN</span> SCHOOL
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-navy rounded-pill px-3">Home</a>
                <a href="{{ route('news-events.index') }}" class="btn btn-sm btn-outline-navy rounded-pill px-3">News &amp; Events</a>
                <a href="{{ route('home') }}#enquiry-section" class="btn btn-sm btn-pink rounded-pill px-3">Enquire Now</a>
            </div>
        </div>
    </nav>

    <main>@yield('content')</main>

    <footer class="bg-navy text-white py-4 mt-5">
        <div class="container text-center small text-white-50">
            © 2026 The Mountain School. All Rights Reserved.
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
