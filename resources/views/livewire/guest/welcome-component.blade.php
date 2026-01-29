<div>
    <x-slot name="title">UPFN</x-slot>
    <x-slot name="logo">{{ asset('img/dt.png') }}</x-slot>

    @section('welcome')
        active
    @endsection

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/hero-carousel/hero.jpg') }}" alt="">
                    <div class="carousel-container">
                        <h2>Welcome to UPFN (Ummah Peace Foundation Network)</h2>
                        <p>
                            (UPFN) is a non-governmental organization established to foster peace, strengthen social
                            cohesion, and support community development through education, humanitarian assistance,
                            advocacy, and sustainable programs. </p>
                        <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{ asset('assets/img/hero-carousel/hero2.jpg') }}" alt="">
                    <div class="carousel-container">
                        <h2> Community Empowerment</h2>
                        <p>
                            UPFN supports education, humanitarian assistance, and skills development to uplift
                            vulnerable groups and improve overall quality of life </p>
                        <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
                    </div>
                </div><!-- End Carousel Item -->

                <div class="carousel-item">
                    <img src="{{ asset('assets/img/hero-carousel/hero3.jpg') }}" alt="">
                    <div class="carousel-container">
                        <h2>Peace, Unity & Sustainable Impact </h2>
                        <p>
                            Through advocacy, partnerships, and grassroots action, UPFN fosters lasting social change
                            and builds resilient, inclusive communities.</p>
                        <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
                    </div>

                </div><!-- End Carousel Item -->

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section>
        <!-- /Hero Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p>About Us</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <!-- Left Content -->
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p align="justify">
                            Ummah Peace Foundation Network (UPFN), part of our goals;</p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Promotes peace, unity, and social harmony
                                    within communities.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Encourages mutual understanding through
                                    dialogue and awareness programs.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Strengthens community engagement and
                                    cooperation through social initiatives.</span></li>
                        </ul>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p align="justify">
                            With a dedicated team of experienced volunteers and professionals, Ummah Peace Foundation
                            Network (UPFN) supports communities through people-centered initiatives. Our mission is to
                            promote peace, unity, and social development by delivering programs that are inclusive,
                            impactful, and sustainable for individuals and communities of all sizes. </p>
                        <a href="{{ route('about') }}" class="read-more"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                </div>

            </div>

        </section>

        <section id="portfolio" class="portfolio section py-5">
            <div class="container">

                <!-- Section Title -->
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary">Our Programs</h2>
                    <p class="text-muted">Explore our recent Programs — from Empowerment to Peace keeping.</p>
                </div>

                @if ($projects->count())
                    <!-- Portfolio Grid -->
                    <div class="row g-4">
                        @foreach ($projects as $project)
                            @php
                                $extension = pathinfo($project->photo, PATHINFO_EXTENSION);
                                $isVideo = in_array(strtolower($extension), [
                                    'mp4',
                                    'webm',
                                    'ogg',
                                    'mov',
                                    'avi',
                                    'mkv',
                                    'm4v',
                                    'wmv',
                                    'flv',
                                    '3gp',
                                    'mpg',
                                    'mpeg',
                                ]);
                                $mediaUrl = asset('admin/assets/images/projects/' . $project->photo);
                                $modalId = 'mediaModal-' . $project->id;
                            @endphp

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card border-0 shadow-lg h-100 rounded-3 overflow-hidden">

                                    <!-- Media Preview -->
                                    <div class="position-relative"
                                        style="height: 220px; overflow: hidden; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#{{ $modalId }}">

                                        @if ($isVideo)
                                            <!-- Video Thumbnail -->
                                            <video class="w-100 h-100" style="object-fit: cover;" muted>
                                                <source src="{{ $mediaUrl }}#t=0.5"
                                                    type="video/{{ $extension }}">
                                            </video>

                                            <!-- Video Overlay -->
                                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                                style="background: rgba(0,0,0,0.3);">
                                                <div class="text-center">
                                                    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center"
                                                        style="width: 60px; height: 60px;">
                                                        <i class="bi bi-play-circle text-success fs-4"></i>
                                                    </div>
                                                    <p class="text-white mt-2 mb-0 small">Click to play</p>
                                                </div>
                                            </div>

                                            <!-- Video Badge -->
                                            <span class="position-absolute top-0 start-0 m-2 badge bg-danger">
                                                <i class="fas fa-video me-1"></i> VIDEO
                                            </span>
                                        @else
                                            <!-- Image -->
                                            <div class="image-wrapper h-100 position-relative" data-bs-toggle="modal"
                                                data-bs-target="#{{ $modalId }}" style="cursor: pointer;">

                                                <img src="{{ $mediaUrl }}" class="card-img-top zoom-on-hover"
                                                    alt="{{ $project->title }}"
                                                    style="object-fit: cover; height: 100%; width: 100%; 
                                                                transition: transform 0.5s ease, filter 0.3s ease;"
                                                    onerror="this.onerror=null; this.src='{{ asset('admin/assets/images/placeholder.jpg') }}'">

                                                <!-- Image Overlay -->
                                                <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 
                                                                d-flex flex-column justify-content-between p-3 opacity-0"
                                                    style="transition: opacity 0.3s ease;
                                                                background: linear-gradient(to bottom, 
                                                                    rgba(0,0,0,0.3) 0%,
                                                                    rgba(0,0,0,0.1) 50%,
                                                                    rgba(0,0,0,0.3) 100%);">

                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <span class="badge bg-success px-2 py-1">
                                                            <i class="fas fa-image me-1"></i> IMAGE
                                                        </span>
                                                        <span class="badge bg-dark px-2 py-1">
                                                            {{ strtoupper($extension) }}
                                                        </span>
                                                    </div>

                                                    <div class="text-center">
                                                        <div class="zoom-button bg-white rounded-circle d-inline-flex 
                                                                        align-items-center justify-content-center shadow"
                                                            style="width: 50px; height: 50px;">
                                                            <i class="bi bi-zoom-in text-success"></i>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-end">
                                                        <span class="badge bg-dark bg-opacity-75 px-2 py-1">
                                                            <i class="bi bi-zoom-in text-success me-1"></i> View
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body d-flex flex-column px-4 py-4">
                                        <h5 class="card-title fw-bold text-primary mb-2">
                                            {{ Str::limit($project->title, 50) }}
                                        </h5>

                                        <div class="d-flex flex-wrap gap-3 text-muted small mb-3">
                                            <div>
                                                <i class="bi bi-calendar-event me-1 text-primary"></i>
                                                {{ $project->date }}
                                            </div>
                                            <div>
                                                <i class="bi bi-person me-1 text-success"></i>
                                                {{ Str::limit($project->client, 20) }}
                                            </div>
                                        </div>

                                        <p class="text-secondary small flex-grow-1 mb-3">
                                            {!! Str::limit(strip_tags($project->description), 100) !!}
                                        </p>

                                        <a href="{{ route('project.details', $project->slug) }}"
                                            class="btn btn-sm btn-outline-success w-100">
                                            View Details <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Simplified Modal -->
                            <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $project->title }}</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-0 bg-dark">
                                            @if ($isVideo)
                                                <video id="videoPlayer-{{ $project->id }}" controls class="w-100"
                                                    style="max-height: 75vh;">
                                                    <source src="{{ $mediaUrl }}"
                                                        type="video/{{ $extension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ $mediaUrl }}" class="w-100"
                                                    alt="{{ $project->title }}"
                                                    style="max-height: 75vh; object-fit: contain;">
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <div class="text-muted small me-auto">
                                                <strong>Beneficiary:</strong> {{ $project->client }} •
                                                <strong>Date:</strong> {{ $project->date }}
                                            </div>
                                            <a href="{{ $mediaUrl }}" class="btn btn-sm btn-primary"
                                                download="{{ $project->photo }}">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <h4 class="text-danger">No Program available at the moment.</h4>
                    </div>
                @endif
            </div>
        </section>

        <style>
            /* Hover effect for images */
            .image-overlay:hover {
                background: rgba(0, 0, 0, 0.5) !important;
            }

            .image-overlay:hover i {
                opacity: 1 !important;
            }

            /* Card hover effect */
            .card {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
            }

            /* Prevent modal flickering */
            .modal.fade .modal-dialog {
                transition: transform 0.2s ease-out;
            }

            .modal-backdrop {
                background-color: rgba(0, 0, 0, 0.5);
            }

            /* Video thumbnail */
            video::-webkit-media-controls {
                display: none !important;
            }
        </style>



        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary">Latest News</h2>
                    <p class="text-muted">Stay Updated with Our Latest News Articles</p>
                </div>

                @if ($news->count())
                    <div class="row g-4">
                        @foreach ($news as $new)
                            @php
                                $extension = pathinfo($new->photo, PATHINFO_EXTENSION);
                                $isVideo = in_array(strtolower($extension), [
                                    'mp4',
                                    'avi',
                                    'mov',
                                    'wmv',
                                    'flv',
                                    'mkv',
                                    'webm',
                                    'm4v',
                                    '3gp',
                                ]);
                                $mediaUrl = asset('admin/assets/images/news/' . $new->photo);
                                $uniqueId = 'news-' . $new->id;
                            @endphp

                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="card border-0 shadow-sm h-100">

                                    <!-- Media Display -->
                                    <div class="position-relative" style="height: 220px; overflow: hidden;">
                                        @if ($isVideo)
                                            <!-- Video Thumbnail with Play Button -->
                                            <div class="h-100 bg-dark position-relative" data-bs-toggle="modal"
                                                data-bs-target="#{{ $uniqueId }}" style="cursor: pointer;">

                                                <div class="h-100 d-flex align-items-center justify-content-center">
                                                    <div class="text-center text-white">
                                                        <div class="play-button bg-danger rounded-circle d-inline-flex 
                                                                        align-items-center justify-content-center shadow-lg"
                                                            style="width: 60px; height: 60px; transition: all 0.3s ease;">
                                                            <i class="bi bi-play-circle text-white fs-4"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Video Type Badge -->
                                                <div class="position-absolute top-0 end-0 m-2">
                                                    <span class="badge bg-dark">
                                                        <i class="bi bi-play-circle me-1"></i>
                                                        {{ strtoupper($extension) }}
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Image Display -->
                                            <img class="card-img-top h-100 w-100" src="{{ $mediaUrl }}"
                                                alt="{{ $new->title }}" style="object-fit: cover; cursor: pointer;"
                                                data-bs-toggle="modal" data-bs-target="#{{ $uniqueId }}">
                                        @endif

                                        <!-- Media Type Indicator -->
                                        <div class="position-absolute top-0 start-0 m-2">
                                            <span class="badge {{ $isVideo ? 'bg-danger' : 'bg-success' }} px-3 py-1">
                                                <i class="fas {{ $isVideo ? 'fa-video' : 'fa-image' }} me-1"></i>
                                                {{ $isVideo ? 'Video' : 'Image' }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $new->title }}</h5>
                                        <p class="card-text text-muted">
                                            {{ Str::limit(strip_tags($new->description), 100) }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('news.show', $new->slug) }}"
                                                class="btn btn-sm btn-outline-success">
                                                Read More
                                            </a>
                                            <small class="text-muted">
                                                {{ $new->created_at->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal for Media Preview -->
                            <div class="modal fade" id="{{ $uniqueId }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $new->title }}</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body p-0">
                                            @if ($isVideo)
                                                <video controls class="w-100" style="max-height: 70vh;">
                                                    <source src="{{ $mediaUrl }}"
                                                        type="video/{{ $extension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <img src="{{ $mediaUrl }}" class="img-fluid w-100"
                                                    alt="{{ $new->title }}">
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="{{ $mediaUrl }}" class="btn btn-primary"
                                                download="{{ $new->photo }}">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- No News Message -->
                    <div class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-newspaper fa-4x mb-3"></i>
                            <h4>No news articles yet</h4>
                            <p>Check back soon for updates!</p>
                        </div>
                    </div>
                @endif

            </div>
            <style>
                .card {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
                }

                /* Modal styling */
                .modal-content {
                    border-radius: 10px;
                    overflow: hidden;
                }

                .modal-body video {
                    background-color: #000;
                }

                /* Responsive adjustments */
                @media (max-width: 768px) {
                    .position-relative[style*="height: 220px"] {
                        height: 180px !important;
                    }
                }
            </style>
        </div>

    </main>
</div>
<script>
    // Ensure Bootstrap Carousel initializes properly
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the carousel with JavaScript as backup
        var heroCarousel = document.getElementById('hero-carousel');
        if (heroCarousel) {
            var carousel = new bootstrap.Carousel(heroCarousel, {
                interval: 5000, // 5 seconds
                wrap: true, // Loop back to first slide
                pause: 'hover' // Only pause on hover
            });

            // Optional: Force autoplay start
            carousel.cycle();
        }
    });
</script>

<script>
    // Fullscreen toggle for videos
    function toggleFullscreen(videoId) {
        const video = document.getElementById(videoId);
        if (!document.fullscreenElement) {
            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.webkitRequestFullscreen) {
                video.webkitRequestFullscreen();
            } else if (video.msRequestFullscreen) {
                video.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    }

    // Auto-play video when modal opens
    document.addEventListener('DOMContentLoaded', function() {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('shown.bs.modal', function(event) {
                const video = this.querySelector('video');
                if (video) {
                    video.play().catch(e => console.log('Autoplay prevented:', e));
                }
            });

            modal.addEventListener('hide.bs.modal', function(event) {
                const video = this.querySelector('video');
                if (video) {
                    video.pause();
                    video.currentTime = 0;
                }
            });
        });
    });

    // Add hover effects with JavaScript for better control
    document.querySelectorAll('.media-card-container').forEach(container => {
        container.addEventListener('mouseenter', function() {
            const video = this.querySelector('video');
            if (video && video.paused) {
                video.play().catch(e => {
                    // Autoplay prevented, continue silently
                });
            }
        });

        container.addEventListener('mouseleave', function() {
            const video = this.querySelector('video');
            if (video && !video.paused) {
                video.pause();
                video.currentTime = 0.5;
            }
        });
    });
</script>
