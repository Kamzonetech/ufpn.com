<div>
    <x-slot name="title">Our Programs</x-slot>

    @section('project')
        active
    @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Program Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="current">Program Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <section id="portfolio-details" class="portfolio-details section">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                            {{-- Project Media (Image or Video) --}}
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
                                $modalId = 'programModal-' . $project->id;

                                // Check if file exists
                                $filePath = public_path('admin/assets/images/projects/' . $project->photo);
                                $fileExists = file_exists($filePath);
                            @endphp

                            <div class="position-relative media-display-section">
                                @if ($isVideo)
                                    <!-- Video Display -->
                                    <div class="video-display-wrapper position-relative bg-dark"
                                        style="height: 500px; overflow: hidden;">

                                        @if ($fileExists)
                                            <!-- Video with Controls -->
                                            <video id="mainVideoPlayer-{{ $project->id }}" class="w-100 h-100"
                                                style="object-fit: contain; background: #000;" controls
                                                poster="{{ asset('admin/assets/images/placeholder-video.jpg') }}">
                                                <source src="{{ $mediaUrl }}" type="video/{{ $extension }}">
                                                Your browser does not support the video tag.
                                            </video>

                                            <!-- Video Controls Overlay -->
                                            <div class="position-absolute top-0 start-0 w-100 p-4">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="badge bg-danger px-3 py-2 fs-6">
                                                        <i class="fas fa-video me-2"></i> VIDEO CONTENT
                                                    </span>
                                                    <span
                                                        class="badge bg-secondary ms-2">{{ strtoupper($extension) }}</span>

                                                    <a href="{{ $mediaUrl }}" class="btn btn-sm btn-outline-light"
                                                        download="{{ $project->photo }}">
                                                        <i class="fas fa-download me-1"></i> Download Video
                                                    </a>

                                                    <button class="btn btn-sm btn-light shadow-sm"
                                                        onclick="toggleFullscreen('mainVideoPlayer-{{ $project->id }}')">
                                                        <i class="fas fa-expand me-1"></i> Fullscreen
                                                    </button>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Video File Not Found -->
                                            <div
                                                class="h-100 d-flex flex-column align-items-center justify-content-center text-white p-5">
                                                <i class="fas fa-exclamation-triangle fa-4x text-warning mb-4"></i>
                                                <h3 class="mb-3">Video File Not Available</h3>
                                                <p class="text-center text-white-50">
                                                    The video content for this program is currently unavailable.
                                                </p>
                                                <div class="mt-3">
                                                    <span class="badge bg-danger px-3 py-2">
                                                        <i class="fas fa-video me-1"></i> Video Content (Missing)
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <!-- Image Display -->
                                    <div class="image-display-wrapper position-relative"
                                        style="height: 500px; overflow: hidden;">

                                        @if ($fileExists)
                                            <img src="{{ $mediaUrl }}" class="w-100 h-100 zoomable-image"
                                                style="object-fit: cover; cursor: zoom-in;" alt="{{ $project->title }}"
                                                data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">

                                            <!-- Image Info Overlay -->
                                            <div class="position-absolute top-0 start-0 w-100 p-4">
                                                <span class="badge bg-success px-3 py-2 fs-6">
                                                    <i class="fas fa-image me-2"></i> IMAGE CONTENT
                                                </span>
                                            </div>

                                            <!-- Image Controls -->
                                            <div
                                                class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75">
                                                <div
                                                    class="text-white d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <small class="text-white-50">Click image to zoom</small>
                                                    </div>
                                                    <div>
                                                        <a href="{{ $mediaUrl }}" target="_blank"
                                                            class="btn btn-sm btn-outline-light me-2">
                                                            <i class="fas fa-external-link-alt me-1"></i> Open
                                                        </a>
                                                        <a href="{{ $mediaUrl }}" class="btn btn-sm btn-light"
                                                            download="{{ $project->photo }}">
                                                            <i class="fas fa-download me-1"></i> Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Zoom Icon -->
                                            <div class="position-absolute top-50 start-50 translate-middle">
                                                <div class="zoom-indicator bg-white rounded-circle shadow-lg p-3"
                                                    style="width: 70px; height: 70px; opacity: 0.8;">
                                                    <i class="fas fa-search-plus fa-2x text-dark"></i>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Image File Not Found -->
                                            <div
                                                class="h-100 d-flex flex-column align-items-center justify-content-center bg-light p-5">
                                                <i class="fas fa-image fa-4x text-secondary mb-4"></i>
                                                <h3 class="mb-3 text-dark">Image Not Available</h3>
                                                <p class="text-center text-muted">
                                                    The image for this program is currently unavailable.
                                                </p>
                                                <div class="mt-3">
                                                    <span class="badge bg-secondary px-3 py-2">
                                                        <i class="fas fa-image me-1"></i> Image Content (Missing)
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            {{-- Card Body --}}
                            <div class="card-body p-5">

                                {{-- Title --}}
                                <h2 class="fw-bold text-dark mb-3">
                                    {{ $project->title }}
                                </h2>

                                {{-- Meta Info with Media Type --}}
                                <div
                                    class="d-flex flex-column flex-md-row justify-content-start align-items-start gap-4 mb-4 text-muted">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar-event me-2 text-primary fs-5"></i>
                                        <span><strong>Date:</strong> {{ $project->date }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person me-2 text-success fs-5"></i>
                                        <span><strong>Benefactor:</strong> {{ $project->client }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i
                                            class="bi bi-file-earmark me-2 {{ $isVideo ? 'text-danger' : 'text-info' }} fs-5"></i>
                                        <span>
                                            <strong>Media Type:</strong>
                                            <span class="badge {{ $isVideo ? 'bg-danger' : 'bg-info' }} ms-2">
                                                {{ $isVideo ? 'Video' : 'Image' }}
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="mb-4">
                                    <h5 class="fw-semibold text-dark mb-2">Program Description</h5>
                                    <div class="text-secondary" style="line-height: 1.7;">
                                        {!! $project->description !!}
                                    </div>
                                </div>

                                @if ($project->link)
                                    <div class="text-end mt-4 pt-4 border-top">
                                        <a href="{{ $project->link }}" target="_blank"
                                            class="btn btn-primary rounded-pill shadow-sm px-4 py-2">
                                            View Live Program <i class="bi bi-box-arrow-up-right ms-2"></i>
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>

                        {{-- Program Gallery Section --}}
                        @php
                            $galleries = $project->galleries()->orderBy('order')->get();
                        @endphp

                        @if ($galleries->count() > 0)
                            <div class="card border-0 shadow-lg rounded-4 overflow-hidden mt-5">
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h3 class="fw-bold text-dark mb-0">
                                            <i class="bi bi-images text-primary me-2"></i>
                                            Program Gallery
                                        </h3>
                                        <span class="badge bg-primary px-3 py-2">
                                            {{ $galleries->count() }} {{ Str::plural('Photo', $galleries->count()) }}
                                        </span>
                                    </div>

                                    {{-- Gallery Grid --}}
                                    <div class="row g-4">
                                        @foreach ($galleries as $gallery)
                                            @php
                                                $galleryImagePath = public_path($gallery->image_path);
                                                $galleryImageExists = file_exists($galleryImagePath);
                                                $galleryModalId = 'galleryModal-' . $gallery->id;
                                            @endphp

                                            <div class="col-md-4 col-sm-6">
                                                <div
                                                    class="gallery-item position-relative overflow-hidden rounded-3 shadow-sm">
                                                    @if ($galleryImageExists)
                                                        {{-- Featured Badge --}}
                                                        @if ($gallery->is_featured)
                                                            <div class="position-absolute top-0 start-0 p-2"
                                                                style="z-index: 10;">
                                                                <span class="badge bg-warning text-dark">
                                                                    <i class="bi bi-star-fill me-1"></i> Featured
                                                                </span>
                                                            </div>
                                                        @endif

                                                        {{-- Thumbnail Image --}}
                                                        <div class="gallery-image-wrapper"
                                                            style="height: 250px; overflow: hidden; cursor: pointer;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#{{ $galleryModalId }}">
                                                            <img src="{{ asset($gallery->thumbnail_path) }}"
                                                                class="w-100 h-100 gallery-thumbnail"
                                                                style="object-fit: cover; transition: transform 0.3s ease;"
                                                                alt="{{ $gallery->title ?? $project->title }}"
                                                                loading="lazy">

                                                            {{-- Overlay --}}
                                                            <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                                                style="background: rgba(0,0,0,0); transition: background 0.3s ease;">
                                                                <i class="bi bi-zoom-in text-white fs-1"
                                                                    style="opacity: 0; transition: opacity 0.3s ease;"></i>
                                                            </div>
                                                        </div>

                                                        {{-- Gallery Item Info --}}
                                                        @if ($gallery->title || $gallery->description)
                                                            <div class="p-3 bg-light">
                                                                @if ($gallery->title)
                                                                    <h6 class="mb-1 fw-semibold text-dark">
                                                                        {{ $gallery->title }}</h6>
                                                                @endif
                                                                @if ($gallery->description)
                                                                    <p class="mb-0 text-muted small"
                                                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                                        {{ $gallery->description }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @else
                                                        {{-- Gallery Image Not Found --}}
                                                        <div class="d-flex flex-column align-items-center justify-content-center bg-light p-4"
                                                            style="height: 250px;">
                                                            <i class="bi bi-image text-secondary fs-1 mb-2"></i>
                                                            <p class="text-muted small mb-0">Image not available</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            {{-- Gallery Image Modal --}}
                                            @if ($galleryImageExists)
                                                <div class="modal fade" id="{{ $galleryModalId }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content border-0 bg-transparent">
                                                            <div class="modal-header border-0">
                                                                <button type="button"
                                                                    class="btn-close btn-close-white bg-dark bg-opacity-50 rounded-circle p-3"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body p-0">
                                                                <img src="{{ asset($gallery->image_path) }}"
                                                                    class="img-fluid w-100 rounded-3 shadow-lg"
                                                                    alt="{{ $gallery->title ?? $project->title }}"
                                                                    style="max-height: 85vh; object-fit: contain;">
                                                            </div>
                                                            @if ($gallery->title || $gallery->description)
                                                                <div
                                                                    class="modal-footer border-0 justify-content-center">
                                                                    <div
                                                                        class="bg-dark bg-opacity-75 rounded-pill px-4 py-3 text-center">
                                                                        @if ($gallery->title)
                                                                            <div class="text-white fw-semibold mb-1">
                                                                                <i
                                                                                    class="bi bi-image me-2"></i>{{ $gallery->title }}
                                                                            </div>
                                                                        @endif
                                                                        @if ($gallery->description)
                                                                            <small
                                                                                class="text-white-50">{{ $gallery->description }}</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    {{-- View All Button (if many images) --}}
                                    @if ($galleries->count() > 6)
                                        <div class="text-center mt-4 pt-4 border-top">
                                            <button class="btn btn-outline-primary rounded-pill px-4"
                                                id="viewAllGallery">
                                                <i class="bi bi-grid-3x3 me-2"></i>
                                                View All Photos ({{ $galleries->count() }})
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal for Full-size Image View (Main Project Image) -->
    @if (!$isVideo && $fileExists)
        <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content border-0 bg-transparent">
                    <div class="modal-header border-0">
                        <button type="button"
                            class="btn-close btn-close-white bg-dark bg-opacity-50 rounded-circle p-3"
                            data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img src="{{ $mediaUrl }}" class="img-fluid w-100 rounded-3 shadow-lg"
                            alt="{{ $project->title }}" style="max-height: 85vh; object-fit: contain;">
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <div class="bg-dark bg-opacity-75 rounded-pill px-4 py-2">
                            <small class="text-white">
                                <i class="fas fa-image me-2"></i>
                                {{ $project->title }} - {{ $project->photo }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <style>
        /* Custom Styles for Media Display */
        .media-display-section {
            border-radius: 12px 12px 0 0;
            overflow: hidden;
        }

        .video-display-wrapper video::-webkit-media-controls-panel {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .video-display-wrapper video::-webkit-media-controls-play-button {
            background-color: red;
            border-radius: 50%;
        }

        .zoomable-image {
            transition: transform 0.3s ease;
        }

        .zoomable-image:hover {
            transform: scale(1.02);
        }

        .zoom-indicator {
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .image-display-wrapper:hover .zoom-indicator {
            opacity: 0.8;
            transform: scale(1.1);
        }

        /* Modal Custom Styles */
        .modal-content.bg-transparent .modal-header {
            backdrop-filter: blur(5px);
        }

        .modal-content.bg-transparent .modal-footer {
            backdrop-filter: blur(5px);
        }

        /* Gallery Styles */
        .gallery-item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .gallery-item:hover .gallery-thumbnail {
            transform: scale(1.1);
        }

        .gallery-item:hover .gallery-overlay {
            background: rgba(0, 0, 0, 0.5) !important;
        }

        .gallery-item:hover .gallery-overlay i {
            opacity: 1 !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {

            .media-display-section .video-display-wrapper,
            .media-display-section .image-display-wrapper {
                height: 300px !important;
            }

            .zoom-indicator {
                width: 50px !important;
                height: 50px !important;
            }

            .zoom-indicator i {
                font-size: 1.5rem !important;
            }

            .gallery-image-wrapper {
                height: 200px !important;
            }
        }
    </style>
</div>

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

    // Auto-pause video when modal closes (for consistency)
    document.addEventListener('DOMContentLoaded', function() {
        // Handle video controls
        const videos = document.querySelectorAll('video');
        videos.forEach(video => {
            video.addEventListener('fullscreenchange', function() {
                if (!document.fullscreenElement) {
                    this.pause();
                }
            });
        });

        // Handle image modal
        const imageModal = document.getElementById('{{ $modalId }}');
        if (imageModal) {
            imageModal.addEventListener('shown.bs.modal', function() {
                document.body.style.overflow = 'hidden';
            });

            imageModal.addEventListener('hidden.bs.modal', function() {
                document.body.style.overflow = 'auto';
            });
        }

        // Handle gallery modals
        const galleryModals = document.querySelectorAll('[id^="galleryModal-"]');
        galleryModals.forEach(modal => {
            modal.addEventListener('shown.bs.modal', function() {
                document.body.style.overflow = 'hidden';
            });

            modal.addEventListener('hidden.bs.modal', function() {
                document.body.style.overflow = 'auto';
            });
        });

        // View All Gallery Button (show hidden gallery items if you want to implement pagination)
        const viewAllBtn = document.getElementById('viewAllGallery');
        if (viewAllBtn) {
            viewAllBtn.addEventListener('click', function() {
                // You can implement show all logic here or redirect to a dedicated gallery page
                const hiddenGalleryItems = document.querySelectorAll('.gallery-item.d-none');
                hiddenGalleryItems.forEach(item => {
                    item.classList.remove('d-none');
                });
                this.style.display = 'none';
            });
        }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // ESC to close modal
        if (e.key === 'Escape') {
            const modals = document.querySelectorAll('.modal.show');
            modals.forEach(modal => {
                const modalInstance = bootstrap.Modal.getInstance(modal);
                if (modalInstance) {
                    modalInstance.hide();
                }
            });
        }

        // Space to play/pause video
        if (e.key === ' ' && !e.target.matches('input, textarea')) {
            const activeVideo = document.querySelector('video:not([style*="display: none"])');
            if (activeVideo) {
                e.preventDefault();
                if (activeVideo.paused) {
                    activeVideo.play();
                } else {
                    activeVideo.pause();
                }
            }
        }
    });
</script>
