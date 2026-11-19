<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>The Mountain School | A Little World of Big Beginnings</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-pink: #E91E7E;
            --brand-pink-dark: #c91469;
            --brand-navy: #083B73;
            --brand-navy-dark: #052852;
            --brand-teal: #00B4D8;
            --brand-yellow: #FFB703;
            --surface-white: #FFFFFF;
            --surface-soft: #F8FAFC;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --border-light: #E2E8F0;
            --font-display: 'Fredoka', sans-serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }
        html { scroll-behavior: smooth; }
        body { font-family: var(--font-body); color: var(--text-dark); background-color: var(--surface-white); overflow-x: hidden; margin: 0; padding: 0; }
        .font-display { font-family: var(--font-display); letter-spacing: 0.02em; text-transform: uppercase; line-height: 1.15; }
        .section-title { font-family: var(--font-display); font-weight: 700; font-size: clamp(1.45rem, 2.6vw, 2.15rem); text-transform: uppercase; letter-spacing: 0.03em; margin-bottom: 0; }
        .text-pink { color: var(--brand-pink) !important; }
        .text-navy { color: var(--brand-navy) !important; }
        .bg-pink { background-color: var(--brand-pink) !important; }
        .bg-navy { background-color: var(--brand-navy) !important; }

        .btn-pill { border-radius: 50rem; font-weight: 700; font-size: 0.82rem; letter-spacing: 0.04em; text-transform: uppercase; padding: 0.6rem 1.45rem; transition: all 0.25s ease; display: inline-flex; align-items: center; gap: 0.5rem; border: 2px solid transparent; }
        .btn-pink { background-color: var(--brand-pink); color: #FFFFFF; box-shadow: 0 4px 14px rgba(233, 30, 126, 0.35); }
        .btn-pink:hover { background-color: var(--brand-pink-dark); color: #FFFFFF; transform: translateY(-2px); }
        .btn-white { background-color: #FFFFFF; color: var(--brand-navy); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12); }
        .btn-white:hover { background-color: #F1F5F9; color: var(--brand-pink); transform: translateY(-2px); }
        .btn-outline-white { background-color: transparent; color: #FFFFFF; border-color: rgba(255, 255, 255, 0.85); }
        .btn-outline-white:hover { background-color: #FFFFFF; color: var(--brand-pink); border-color: #FFFFFF; }
        .btn-outline-navy { background-color: transparent; color: var(--brand-navy); border-color: var(--brand-navy); }
        .btn-outline-navy:hover { background-color: var(--brand-navy); color: #FFFFFF; }

        .doodle-bg-white-lines { background-image: url("data:image/svg+xml,%3Csvg width='180' height='180' viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23FFFFFF' stroke-opacity='0.09' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M25 35 L32 20 L39 35 L54 37 L42 47 L45 62 L32 54 L19 62 L22 47 L10 37 Z'/%3E%3Ccircle cx='135' cy='40' r='14'/%3E%3Cpath d='M127 40 Q135 48 143 40'/%3E%3Cpath d='M120 130 L150 118 L142 148 L133 136 Z'/%3E%3C/g%3E%3C/svg%3E"); background-repeat: repeat; }
        .cloud-wave-top, .cloud-wave-bottom { width: 100%; overflow: hidden; line-height: 0; position: relative; z-index: 2; }
        .cloud-wave-top svg, .cloud-wave-bottom svg { display: block; width: calc(100% + 2px); height: 56px; }

        .utility-bar { background-color: var(--brand-pink); color: #FFFFFF; font-size: 0.78rem; font-weight: 600; padding: 0.4rem 0; }
        .utility-bar a { color: #FFFFFF; text-decoration: none; }
        .main-navbar { background-color: #FFFFFF; box-shadow: 0 4px 20px rgba(8, 59, 115, 0.08); padding: 0.55rem 0; z-index: 1030; }
        .brand-badge { background: #FFFFFF; border: 2px solid var(--brand-navy); border-radius: 12px; padding: 6px 12px; display: inline-flex; align-items: center; gap: 8px; }
        .nav-link-custom { color: var(--brand-navy) !important; font-weight: 700; font-size: 0.86rem; padding: 0.5rem 0.85rem !important; }
        .nav-link-custom:hover { color: var(--brand-pink) !important; }

        .hero-section { position: relative; min-height: 500px; display: flex; align-items: center; background: url('https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1920&q=80') center center / cover no-repeat; padding: 5rem 0 6rem; }
        .hero-overlay { position: absolute; inset: 0; background: linear-gradient(90deg, rgba(15, 23, 42, 0.84) 0%, rgba(15, 23, 42, 0.58) 48%, rgba(15, 23, 42, 0.22) 100%); }
        .hero-title { font-family: var(--font-display); font-size: clamp(2.3rem, 4.8vw, 3.85rem); font-weight: 700; color: #FFFFFF; text-transform: uppercase; line-height: 1.08; }

        .stage-card { background: #FFFFFF; border-radius: 18px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12); transition: transform 0.3s ease; height: 100%; display: flex; flex-direction: column; }
        .stage-card:hover { transform: translateY(-6px); }
        .stage-card-img { height: 195px; width: 100%; object-fit: cover; }
        .stage-card-body { padding: 1.25rem; flex: 1; display: flex; flex-direction: column; justify-content: space-between; }

        .pink-faq .accordion-item { background: transparent; border: none; border-bottom: 1px solid rgba(255, 255, 255, 0.35); border-radius: 0; }
        .pink-faq .accordion-button { background: transparent; color: #FFFFFF; font-weight: 600; font-size: 0.92rem; padding: 1rem 0.25rem; box-shadow: none; }
        .pink-faq .accordion-button::after { background-image: none; content: '+'; font-size: 1.35rem; font-weight: 700; color: #FFFFFF; width: auto; height: auto; transform: none !important; }
        .pink-faq .accordion-button:not(.collapsed)::after { content: '−'; }
        .pink-faq .accordion-body { color: rgba(255, 255, 255, 0.92); font-size: 0.86rem; padding: 0 0.25rem 1rem; }

        .enquiry-form-card { background: #FFFFFF; border-radius: 22px; padding: 1.85rem; box-shadow: 0 18px 40px rgba(0, 0, 0, 0.18); }
        .enquiry-form-card .form-control, .enquiry-form-card .form-select { border-radius: 10px; border: 1.5px solid #E2E8F0; font-size: 0.85rem; padding: 0.6rem 0.85rem; }
        .enquiry-form-card .form-control:focus, .enquiry-form-card .form-select:focus { border-color: var(--brand-pink); box-shadow: 0 0 0 0.2rem rgba(233, 30, 126, 0.15); }
    </style>
</head>
<body>

    <div class="utility-bar">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-3">
                <a href="tel:+919876543210"><i class="bi bi-telephone-fill me-1"></i> +91 98765 43210</a>
                <span class="opacity-50 d-none d-sm-inline">|</span>
                <a href="mailto:admissions@themountainschool.edu" class="d-none d-sm-inline"><i class="bi bi-envelope-fill me-1"></i> admissions@themountainschool.edu</a>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-white text-pink rounded-pill px-2 py-1 fw-bold" style="font-size: 0.7rem;">Admissions Open 2026-27</span>
                @auth
                    <a href="{{ route('admin.news-events.index') }}" class="fw-bold"><i class="bi bi-speedometer2 me-1"></i> Admin Panel</a>
                @else
                    <a href="{{ route('login') }}"><i class="bi bi-lock-fill me-1"></i> Admin Login</a>
                @endauth
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg sticky-top main-navbar">
        <div class="container">
            <a class="navbar-brand p-0" href="{{ route('home') }}">
                <div class="brand-badge">
                    <svg width="34" height="34" viewBox="0 0 40 40" fill="none">
                        <rect width="40" height="40" rx="8" fill="#083B73"/>
                        <path d="M7 29L16 14L22 23L27 17L33 29H7Z" fill="#E91E7E"/>
                        <circle cx="28" cy="11" r="3.5" fill="#FFB703"/>
                    </svg>
                    <div class="lh-1">
                        <span class="d-block fw-extrabold text-navy" style="font-size: 0.72rem; letter-spacing: 0.05em;">THE</span>
                        <span class="d-block font-display text-pink" style="font-size: 0.98rem;">MOUNTAIN</span>
                        <span class="d-block fw-bold text-navy" style="font-size: 0.65rem; letter-spacing: 0.14em;">SCHOOL</span>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="{{ route('news-events.index') }}">News &amp; Events</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom" href="#enquiry-section">Admissions</a></li>
                </ul>
                <div class="d-flex">
                    <a href="#enquiry-section" class="btn btn-pill btn-pink">Enquire Now</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container position-relative z-3">
            <div class="row">
                <div class="col-lg-7 col-xl-6 text-white">
                    <span class="badge bg-pink text-white rounded-pill px-3 py-2 mb-3 fw-bold text-uppercase" style="letter-spacing: 0.06em; font-size: 0.72rem;">
                        Early Childhood Excellence
                    </span>
                    <h1 class="hero-title mb-3">A LITTLE WORLD OF BIG BEGINNINGS</h1>
                    <p class="lead text-white-50 mb-4 fw-medium" style="font-size: 1.05rem; max-width: 500px;">
                        Nurturing curiosity, confidence, and joyful discovery in a warm, child-centric environment designed for ages 1.8 to 6 years.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#enquiry-section" class="btn btn-pill btn-white">
                            Apply for Admission <i class="bi bi-arrow-right-circle-fill text-pink"></i>
                        </a>
                        <a href="{{ route('news-events.index') }}" class="btn btn-pill btn-outline-white">
                            News &amp; Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="cloud-wave-top" style="margin-top: -45px; background: transparent;">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none">
            <path fill="#E91E7E" d="M0,45 C40,15 95,15 135,45 C175,10 245,10 285,45 C330,12 395,12 440,45 C485,8 560,8 605,45 C650,15 715,15 760,45 C805,10 875,10 920,45 C965,14 1035,14 1080,45 C1125,8 1195,8 1240,45 C1290,15 1370,15 1440,42 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <section id="events" class="bg-pink doodle-bg-white-lines text-white py-5 position-relative">
        <div class="container position-relative">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="section-title text-white">NEWS &amp; EVENT DIARY</h2>
                <a href="{{ route('news-events.index') }}" class="btn btn-pill btn-white">View All</a>
            </div>

            <div class="row g-4 mb-5 pb-3">
                @forelse($latestNewsEvents as $item)
                    <div class="col-md-4">
                        <div class="stage-card">
                            <div class="position-relative">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="stage-card-img">
                                <span class="badge bg-navy text-white rounded-pill position-absolute top-0 start-0 m-3">
                                    {{ $item->category }}
                                </span>
                            </div>
                            <div class="stage-card-body">
                                <div>
                                    <small class="text-pink fw-bold d-block mb-1">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $item->event_date->format('d M Y') }}
                                    </small>
                                    <h5 class="font-display text-navy mb-2" style="font-size: 1.1rem;">
                                        <a href="{{ route('news-events.show', $item->slug) }}" class="text-navy text-decoration-none">
                                            {{ $item->title }}
                                        </a>
                                    </h5>
                                    <p class="text-muted small mb-3">{{ Str::limit($item->short_description, 110) }}</p>
                                </div>
                                <a href="{{ route('news-events.show', $item->slug) }}" class="text-pink fw-bold text-decoration-none small">
                                    Read Full Story <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-white-50">No news or events published yet.</p>
                    </div>
                @endforelse
            </div>

            <div id="enquiry-section" class="row g-5 pt-2 align-items-start">
                <div class="col-lg-6">
                    <h2 class="section-title text-white mb-4">CLEAR YOUR DOUBTS HERE</h2>
                    <div class="accordion pink-faq" id="schoolFaqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What is the age criteria for admission in 2026-27?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Playgroup welcomes children aged 1.8 to 2.5 years, Nursery from 2.5 to 3.5 years, Junior KG from 3.5 to 4.5 years, and Senior KG from 4.5 to 6.0 years.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is the student-to-teacher ratio in each classroom?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    We maintain a 10:1 student-to-educator ratio in Playgroup and 12:1 in Kindergarten, supported by a dedicated female teaching assistant.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Is school transport available with GPS tracking?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#schoolFaqAccordion">
                                <div class="accordion-body">
                                    Yes! Air-conditioned, GPS-enabled school buses cover all major residential areas with live parent tracking and a trained female bus attendant.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h2 class="section-title text-white mb-4">ADMISSION ENQUIRY</h2>
                    <div class="enquiry-form-card text-dark">
                        <div class="text-center mb-3">
                            <h5 class="font-display text-navy mb-1">START YOUR CHILD'S JOURNEY</h5>
                            <p class="text-muted small mb-0">Fill in the details below and our admissions team will reach out shortly.</p>
                        </div>

                        <div id="enquiryAlertBox" class="alert d-none py-2 px-3 small rounded-3 mb-3"></div>

                        <form id="admissionEnquiryForm" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Parent's Name *</label>
                                    <input type="text" name="parent_name" id="parent_name" class="form-control" placeholder="e.g. Rajesh Verma">
                                    <div class="invalid-feedback" id="error-parent_name"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Student's Name *</label>
                                    <input type="text" name="student_name" id="student_name" class="form-control" placeholder="e.g. Aarav Verma">
                                    <div class="invalid-feedback" id="error-student_name"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Class Applying For *</label>
                                    <select name="class_applying_for" id="class_applying_for" class="form-select">
                                        <option value="" selected disabled>Choose Class / Stage...</option>
                                        <option value="Playgroup">Playgroup (1.8 – 2.5 Years)</option>
                                        <option value="Nursery">Nursery (2.5 – 3.5 Years)</option>
                                        <option value="Junior KG">Junior KG (3.5 – 4.5 Years)</option>
                                        <option value="Senior KG">Senior KG (4.5 – 6.0 Years)</option>
                                    </select>
                                    <div class="invalid-feedback" id="error-class_applying_for"></div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label small fw-bold text-navy mb-1">Mobile Number (10-digit) *</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" maxlength="10" placeholder="e.g. 9876543210">
                                    <div class="invalid-feedback" id="error-mobile"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-navy mb-1">Email Address (Optional)</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="parent@example.com">
                                    <div class="invalid-feedback" id="error-email"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-bold text-navy mb-1">Message (Optional)</label>
                                    <textarea name="message" id="message" class="form-control" rows="2" placeholder="Any specific questions or preferred campus visit date..."></textarea>
                                    <div class="invalid-feedback" id="error-message"></div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" id="enquirySubmitBtn" class="btn btn-pill btn-pink w-100 justify-content-center py-2">
                                        <span>Submit Enquiry</span> <i class="bi bi-send-fill ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-navy text-white py-4">
        <div class="container d-flex flex-wrap justify-content-between align-items-center small text-white-50">
            <div>© 2026 The Mountain School. All Rights Reserved.</div>
            <div><a href="{{ route('news-events.index') }}" class="text-white-50 text-decoration-none">News &amp; Events</a></div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('admissionEnquiryForm')?.addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = this;
        const submitBtn = document.getElementById('enquirySubmitBtn');
        const alertBox = document.getElementById('enquiryAlertBox');

        alertBox.className = 'alert d-none py-2 px-3 small rounded-3 mb-3';
        form.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Submitting...';

        try {
            const formData = new FormData(form);
            const response = await fetch("{{ route('enquiries.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                alertBox.className = 'alert alert-success py-2 px-3 small rounded-3 mb-3';
                alertBox.innerHTML = `<i class="bi bi-check-circle-fill me-1"></i> ${data.message}`;
                form.reset();
            } else if (response.status === 422 && data.errors) {
                Object.entries(data.errors).forEach(([field, messages]) => {
                    const input = document.getElementById(field);
                    const errorDiv = document.getElementById(`error-${field}`);
                    if (input) input.classList.add('is-invalid');
                    if (errorDiv) errorDiv.textContent = messages[0];
                });
            } else {
                alertBox.className = 'alert alert-warning py-2 px-3 small rounded-3 mb-3';
                alertBox.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-1"></i> ${data.message || 'Unable to process your enquiry.'}`;
            }
        } catch (error) {
            alertBox.className = 'alert alert-danger py-2 px-3 small rounded-3 mb-3';
            alertBox.textContent = 'Network error. Please check your connection and try again.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>Submit Enquiry</span> <i class="bi bi-send-fill ms-1"></i>';
        }
    });
    </script>
</body>
</html>
