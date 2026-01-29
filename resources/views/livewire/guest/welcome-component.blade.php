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

        <section id="portfolio" class="portfolio section bg-light py-5">
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
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div
                                    class="card border-0 shadow-lg h-100 transition-transform hover:-translate-y-1 hover:shadow-xl rounded-3 overflow-hidden">

                                    <div class="position-relative media-card-container">
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
                                            $thumbnailUrl = $mediaUrl;

                                            // Generate unique ID for modal
                                            $modalId = 'mediaModal-' . $project->id;

                                            // Try to find video thumbnail
                                            if ($isVideo) {
                                                $baseName = pathinfo($project->photo, PATHINFO_FILENAME);
                                                $possibleThumbnails = [
                                                    $baseName . '.jpg',
                                                    $baseName . '.jpeg',
                                                    $baseName . '.png',
                                                    $baseName . '_thumb.jpg',
                                                    $baseName . '_thumbnail.jpg',
                                                    $baseName . '_preview.jpg',
                                                ];

                                                foreach ($possibleThumbnails as $thumb) {
                                                    $thumbPath = public_path('admin/assets/images/projects/' . $thumb);
                                                    if (file_exists($thumbPath)) {
                                                        $thumbnailUrl = asset('admin/assets/images/projects/' . $thumb);
                                                        break;
                                                    }
                                                }
                                            }
                                        @endphp

                                        <div class="media-display-wrapper"
                                            style="height: 220px; overflow: hidden; border-radius: 8px 8px 0 0; background: #f8f9fa;">

                                            @if ($isVideo)
                                                <!-- Video Display -->
                                                <div class="video-wrapper h-100 position-relative"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $modalId }}"
                                                    style="cursor: pointer;">

                                                    @if ($thumbnailUrl !== $mediaUrl)
                                                        <!-- Use thumbnail if available -->
                                                        <img src="{{ $thumbnailUrl }}"
                                                            class="card-img-top video-thumbnail"
                                                            alt="{{ $project->title }}"
                                                            style="object-fit: cover; height: 100%; width: 100%;">
                                                    @else
                                                        <!-- Fallback to video element -->
                                                        <video class="card-img-top video-thumbnail" muted
                                                            preload="metadata"
                                                            style="object-fit: cover; height: 100%; width: 100%;">
                                                            <source src="{{ $mediaUrl }}#t=0.5"
                                                                type="video/{{ $extension }}">
                                                        </video>
                                                    @endif

                                                    <!-- Video Overlay -->
                                                    <div
                                                        class="video-overlay position-absolute top-0 start-0 w-100 h-100 
                                                                d-flex flex-column justify-content-between p-3">
                                                        <div class="d-flex justify-content-between align-items-start">
                                                            <span class="badge bg-danger px-2 py-1">
                                                                <i class="fas fa-video me-1"></i> VIDEO
                                                            </span>
                                                            <span class="badge bg-dark px-2 py-1">
                                                                {{ strtoupper($extension) }}
                                                            </span>
                                                        </div>

                                                        <div class="text-center">
                                                            <div class="play-button bg-white rounded-circle d-inline-flex 
                                                                        align-items-center justify-content-center shadow-lg"
                                                                style="width: 60px; height: 60px; transition: all 0.3s ease;">
                                                                <i class="fas fa-play text-dark fs-4"
                                                                    style="margin-left: 3px;"></i>
                                                            </div>
                                                            <p class="text-white mt-2 mb-0 small fw-medium">
                                                                Click to play
                                                            </p>
                                                        </div>

                                                        <div class="d-flex justify-content-end">
                                                            <span class="badge bg-dark bg-opacity-75 px-2 py-1">
                                                                <i class="fas fa-expand-alt me-1"></i> Fullscreen
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!-- Progress indicator for loading -->
                                                    <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-25"
                                                        style="height: 4px;">
                                                        <div class="bg-primary" style="width: 30%; height: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <!-- Image Display -->
                                                <div class="image-wrapper h-100 position-relative"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $modalId }}"
                                                    style="cursor: pointer;">

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
                                                                <i class="fas fa-search-plus text-dark"></i>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-end">
                                                            <span class="badge bg-dark bg-opacity-75 px-2 py-1">
                                                                <i class="fas fa-expand-alt me-1"></i> View
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Media Type Indicator (Corner) -->
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <div class="media-type-indicator rounded-circle shadow-sm 
                                                            {{ $isVideo ? 'bg-danger' : 'bg-success' }}"
                                                    style="width: 30px; height: 30px; 
                                                            display: flex; align-items: center; justify-content: center;">
                                                    <i
                                                        class="fas {{ $isVideo ? 'fa-play' : 'fa-image' }} text-white fs-6"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Card Body --}}
                                    <div class="card-body d-flex flex-column px-4 py-4">

                                        {{-- Title --}}
                                        <h5 class="card-title fw-bold text-primary mb-2 text-truncate">
                                            {{ Str::limit($project->title, 25) }}
                                        </h5>

                                        {{-- Meta Section --}}
                                        <div
                                            class="d-flex flex-column flex-sm-row justify-content-between align-items-start text-muted small mb-3 gap-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-calendar-event me-2 text-primary fs-6"></i>
                                                <span><strong>Date:</strong> {{ $project->date }}</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person me-2 text-success fs-6"></i>
                                                <span><strong>Beneficiary:</strong> {{ $project->client }}</span>
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        <p class="text-secondary small flex-grow-1 mb-3">
                                            {!! Str::limit($project->description, 150) !!}
                                        </p>

                                        {{-- Action Button --}}
                                        <a href="{{ route('project.details', $project->slug) }}"
                                            class="btn btn-sm btn-outline-success w-100 d-flex justify-content-between align-items-center shadow-sm">
                                            <span>View Details</span>
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <h4 class="text-muted text-danger">No Program available at the moment.</h4>
                    </div>
                @endif

            </div>
        </section>

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
                                                        <i class="fas fa-play-circle fa-3x mb-3"></i>
                                                        <div class="badge bg-danger px-3 py-1">
                                                            VIDEO CONTENT
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Video Type Badge -->
                                                <div class="position-absolute top-0 end-0 m-2">
                                                    <span class="badge bg-dark">
                                                        <i class="fas fa-video me-1"></i>
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
