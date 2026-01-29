<div>
    <x-slot name="title">{{ $news->title }}</x-slot>
    <x-slot name="logo">{{ asset('admin/assets/images/news/' . $news->photo) }}</x-slot>
    <x-slot name="description">{!! Str::limit(strip_tags($news->description), 100) !!}</x-slot>

    @section('news')
        active
    @endsection

    <main class="main">

        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">News Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="current">News Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container py-5">
            <div class="row">

                <div class="col-lg-8">

                    <!-- News Details Section -->
                    <div class="card border-0 shadow-sm mb-4">

                        @php
                            $extension = pathinfo($news->photo, PATHINFO_EXTENSION);
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
                            $mediaUrl = asset('admin/assets/images/news/' . $news->photo);
                            $modalId = 'newsModal-' . $news->id;
                        @endphp

                        <!-- Media Display -->
                        <div class="position-relative">
                            @if ($isVideo)
                                <!-- Video Display -->
                                <div class="video-container bg-dark rounded-top"
                                    style="height: 450px; overflow: hidden;">
                                    <video controls class="w-100 h-100" style="object-fit: contain; background: #000;">
                                        <source src="{{ $mediaUrl }}" type="video/{{ $extension }}">
                                        Your browser does not support the video tag.
                                    </video>

                                    <!-- Video Controls Overlay -->
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-danger px-3 py-2">
                                            <i class="fas fa-video me-1"></i> VIDEO CONTENT
                                        </span>
                                    </div>
                                </div>

                                <!-- Video Info Bar -->
                                <div class="bg-dark text-white p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <small class="text-white-50">Video Format:</small>
                                            <span class="badge bg-secondary ms-2">{{ strtoupper($extension) }}</span>
                                        </div>
                                        <a href="{{ $mediaUrl }}" class="btn btn-sm btn-light"
                                            download="{{ $news->photo }}">
                                            <i class="fas fa-download me-1"></i> Download Video
                                        </a>
                                    </div>
                                </div>
                            @else
                                <!-- Image Display -->
                                <div class="image-container position-relative">
                                    <img src="{{ $mediaUrl }}" alt="{{ $news->title }}"
                                        class="img-fluid w-100 rounded-top"
                                        style="max-height: 450px; object-fit: cover; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">

                                    <!-- Image Badge -->
                                    <div class="position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-success px-3 py-2">
                                            <i class="fas fa-image me-1"></i> IMAGE CONTENT
                                        </span>
                                    </div>

                                    <!-- Zoom Icon -->
                                    <div class="position-absolute bottom-0 end-0 m-3">
                                        <button class="btn btn-light rounded-circle shadow" data-bs-toggle="modal"
                                            data-bs-target="#{{ $modalId }}" style="width: 45px; height: 45px;">
                                            <i class="fas fa-search-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- News Content -->
                        <div class="card-body p-4">
                            <h1 class="card-title mb-3">{{ $news->title }}</h1>

                            <!-- Meta Info -->
                            <div class="d-flex flex-wrap gap-3 mb-4 text-muted">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user me-2"></i>
                                    <span>By {{ $news->user->name ?? 'Admin' }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar me-2"></i>
                                    <span>{{ $news->created_at->format('F d, Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas {{ $isVideo ? 'fa-video' : 'fa-image' }} me-2"></i>
                                    <span>{{ $isVideo ? 'Video News' : 'Image News' }}</span>
                                </div>
                            </div>

                            <!-- News Description -->
                            <div class="news-content">
                                {!! $news->description !!}
                            </div>

                            <!-- Media Info -->
                            {{-- <div class="mt-4 pt-3 border-top">
                                <h5 class="mb-3">
                                    <i class="fas fa-info-circle me-2 text-primary"></i>
                                    Media Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border-light">
                                            <div class="card-body">
                                                <h6 class="fw-semibold mb-3">File Details</h6>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="mb-2">
                                                        <strong>File Name:</strong>
                                                        <span class="text-muted">{{ $news->photo }}</span>
                                                    </li>
                                                    <li class="mb-2">
                                                        <strong>File Type:</strong>
                                                        <span
                                                            class="badge {{ $isVideo ? 'bg-danger' : 'bg-success' }}">
                                                            {{ $isVideo ? 'Video' : 'Image' }}
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <strong>Format:</strong>
                                                        <span class="badge bg-secondary">
                                                            {{ strtoupper($extension) }}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-light">
                                            <div class="card-body">
                                                <h6 class="fw-semibold mb-3">Actions</h6>
                                                <div class="d-grid gap-2">
                                                    @if ($isVideo)
                                                        <a href="{{ $mediaUrl }}" class="btn btn-danger"
                                                            download="{{ $news->photo }}">
                                                            <i class="fas fa-download me-2"></i>
                                                            Download Video
                                                        </a>
                                                        <button class="btn btn-outline-primary"
                                                            onclick="toggleFullscreen()">
                                                            <i class="fas fa-expand me-2"></i>
                                                            Fullscreen Mode
                                                        </button>
                                                    @else
                                                        <a href="{{ $mediaUrl }}" class="btn btn-success"
                                                            download="{{ $news->photo }}">
                                                            <i class="fas fa-download me-2"></i>
                                                            Download Image
                                                        </a>
                                                        <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                                            data-bs-target="#{{ $modalId }}">
                                                            <i class="fas fa-search-plus me-2"></i>
                                                            View Full Size
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h3 class="card-title mb-3">
                                <i class="fas fa-newspaper me-2 text-primary"></i>
                                Recent News
                            </h3>

                            @foreach ($relatedNews as $related)
                                @php
                                    $relatedExtension = pathinfo($related->photo, PATHINFO_EXTENSION);
                                    $relatedIsVideo = in_array(strtolower($relatedExtension), [
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
                                @endphp

                                <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <div class="row g-2">
                                        <div class="col-4">
                                            @if ($relatedIsVideo)
                                                <div class="bg-dark rounded d-flex align-items-center justify-content-center"
                                                    style="height: 70px;">
                                                    <i class="fas fa-play text-white"></i>
                                                </div>
                                            @else
                                                <img src="{{ asset('admin/assets/images/news/' . $related->photo) }}"
                                                    alt="{{ $related->title }}" class="img-fluid rounded"
                                                    style="height: 70px; object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="col-8">
                                            <h6 class="mb-1">
                                                <a href="{{ route('news.show', $related->slug) }}"
                                                    class="text-dark text-decoration-none">
                                                    {{ Str::limit($related->title, 40) }}
                                                </a>
                                            </h6>
                                            <div class="d-flex align-items-center">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                    {{ $related->created_at->format('M d') }}
                                                </small>
                                                <span
                                                    class="ms-2 badge {{ $relatedIsVideo ? 'bg-danger' : 'bg-success' }} px-1 py-0"
                                                    style="font-size: 10px;">
                                                    {{ $relatedIsVideo ? 'VIDEO' : 'IMAGE' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="text-center mt-3">
                                <a href="{{ route('news.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-list me-1"></i> View All News
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- Modal for Full-size Image View -->
    @if (!$isVideo)
        <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">
                            <i class="fas fa-image me-2"></i>
                            {{ $news->title }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img src="{{ $mediaUrl }}" class="img-fluid w-100" alt="{{ $news->title }}"
                            style="max-height: 80vh; object-fit: contain;">
                    </div>
                    <div class="modal-footer bg-dark text-white">
                        <small class="me-auto">
                            <i class="fas fa-file-image me-1"></i>
                            {{ $news->photo }}
                        </small>
                        <a href="{{ $mediaUrl }}" class="btn btn-sm btn-light" download="{{ $news->photo }}">
                            <i class="fas fa-download me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Custom Styles */
        .video-container video::-webkit-media-controls-panel {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .video-container video::-webkit-media-controls-play-button {
            background-color: red;
            border-radius: 50%;
        }

        .image-container img {
            transition: transform 0.3s ease;
        }

        .image-container:hover img {
            transform: scale(1.02);
        }

        .news-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .news-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 1rem 0;
        }

        .news-content p {
            margin-bottom: 1.5rem;
        }

        .news-content h2,
        .news-content h3,
        .news-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        /* Sidebar improvements */
        .sidebar .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .sidebar a:hover {
            color: #0d6efd !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .video-container {
                height: 300px !important;
            }

            .news-content {
                font-size: 1rem;
            }

            .d-flex.flex-wrap.gap-3 {
                justify-content: center;
            }
        }
    </style>
</div>

<script>
    // Fullscreen toggle for videos
    function toggleFullscreen() {
        const video = document.querySelector('video');
        if (video) {
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
    }

    // Handle video fullscreen change
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.querySelector('video');
        if (video) {
            video.addEventListener('fullscreenchange', function() {
                if (!document.fullscreenElement) {
                    this.pause();
                }
            });
        }
    });

    // Auto-play video when page loads (muted for autoplay policies)
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.querySelector('video');
        if (video) {
            video.muted = true; // Mute for autoplay
            video.play().catch(e => {
                console.log('Autoplay prevented, user interaction required');
            });
        }
    });
</script>
