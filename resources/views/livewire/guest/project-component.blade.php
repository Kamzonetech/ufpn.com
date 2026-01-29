<div>
    <x-slot name="title">Our Programs</x-slot>

    @section('project')
        active
    @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Programs</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="current">Portfolio</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <style>
            /* Add these styles to your CSS file */
            .media-card-container {
                transition: transform 0.3s ease;
            }

            .media-card-container:hover {
                transform: translateY(-5px);
            }

            .video-overlay {
                background: linear-gradient(to bottom,
                        rgba(0, 0, 0, 0.7) 0%,
                        rgba(0, 0, 0, 0.3) 50%,
                        rgba(0, 0, 0, 0.7) 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .video-wrapper:hover .video-overlay {
                opacity: 1;
            }

            .video-thumbnail {
                filter: brightness(0.9);
            }

            .video-wrapper:hover .video-thumbnail {
                filter: brightness(1.1);
                transform: scale(1.05);
                transition: transform 0.5s ease, filter 0.3s ease;
            }

            .zoom-on-hover:hover {
                transform: scale(1.1);
            }

            .play-video-btn {
                transition: all 0.3s ease;
            }

            .play-video-btn:hover {
                transform: scale(1.1);
                opacity: 1 !important;
            }

            .media-thumbnail-trigger {
                transition: all 0.3s ease;
            }

            .media-thumbnail-trigger:hover {
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }
        </style>

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
                                                        <div class="bg-primary" style="width: 30%; height: 100%;"></div>
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

                                    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content border-0">
                                                <div class="modal-header bg-dark text-white py-3">
                                                    <h6 class="modal-title d-flex align-items-center">
                                                        <i
                                                            class="fas {{ $isVideo ? 'fa-video' : 'fa-image' }} me-2"></i>
                                                        {{ $project->title }}
                                                    </h6>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <small class="text-white-50">
                                                            {{ $isVideo ? 'Video' : 'Image' }} •
                                                            {{ Carbon\Carbon::parse($project->created_at)->format('M d, Y') }}
                                                        </small>
                                                        <button type="button" class="btn-close btn-close-white"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                </div>
                                                <div class="modal-body p-0 bg-black position-relative">
                                                    @if ($isVideo)
                                                        <video id="videoPlayer-{{ $project->id }}" controls
                                                            class="w-100" style="max-height: 70vh; background: #000;"
                                                            poster="{{ $thumbnailUrl }}">
                                                            <source src="{{ $mediaUrl }}"
                                                                type="video/{{ $extension }}">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <div
                                                            class="position-absolute bottom-0 start-0 w-100 p-3 
                                                                    bg-gradient-to-top from-black/80 to-transparent">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="text-white">
                                                                    <small>
                                                                        <i class="fas fa-file-video me-1"></i>
                                                                        {{ $project->photo }}
                                                                    </small>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-outline-light me-2"
                                                                        onclick="toggleFullscreen('videoPlayer-{{ $project->id }}')">
                                                                        <i class="fas fa-expand"></i>
                                                                    </button>
                                                                    <a href="{{ $mediaUrl }}"
                                                                        class="btn btn-sm btn-light"
                                                                        download="{{ $project->photo }}">
                                                                        <i class="fas fa-download me-1"></i> Download
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <img src="{{ $mediaUrl }}" class="img-fluid w-100"
                                                            alt="{{ $project->title }}"
                                                            style="max-height: 70vh; object-fit: contain;">
                                                        <div
                                                            class="position-absolute bottom-0 start-0 w-100 p-3 
                                                                    bg-gradient-to-top from-black/80 to-transparent">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="text-white">
                                                                    <small>
                                                                        <i class="fas fa-file-image me-1"></i>
                                                                        {{ $project->photo }}
                                                                    </small>
                                                                </div>
                                                                <div>
                                                                    <a href="{{ $mediaUrl }}" target="_blank"
                                                                        class="btn btn-sm btn-outline-light me-2">
                                                                        <i class="fas fa-external-link-alt me-1"></i>
                                                                        Open
                                                                    </a>
                                                                    <a href="{{ $mediaUrl }}"
                                                                        class="btn btn-sm btn-light"
                                                                        download="{{ $project->photo }}">
                                                                        <i class="fas fa-download me-1"></i> Download
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if ($project->description || $project->client)
                                                    <div class="modal-footer bg-dark text-white py-3">
                                                        @if ($project->client)
                                                            <div class="me-3">
                                                                <small class="text-white-50">Host/Beneficiary:</small>
                                                                <div class="fw-medium">{{ $project->client }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($project->description)
                                                            <div class="flex-grow-1">
                                                                <small class="text-white-50">Description:</small>
                                                                <div class="text-truncate">
                                                                    {!! Str::limit($project->description, 100) !!}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
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

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $projects->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <h4 class="text-muted text-danger">No Program available at the moment.</h4>
                    </div>
                @endif

            </div>
        </section>


    </main>
    <style>
        /* Hover Effects */
        .media-card-container:hover .video-overlay {
            opacity: 1 !important;
        }

        .image-wrapper:hover .image-overlay {
            opacity: 1 !important;
        }

        .image-wrapper:hover .zoom-on-hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }

        .video-wrapper:hover .play-button {
            transform: scale(1.1);
            background-color: red !important;
        }

        .video-overlay {
            opacity: 0;
            transition: opacity 0.3s ease;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.7) 0%,
                    rgba(0, 0, 0, 0.3) 50%,
                    rgba(0, 0, 0, 0.7) 100%);
        }

        .play-button:hover {
            transform: scale(1.15) !important;
        }

        /* Modal Custom Styles */
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .modal-body video::-webkit-media-controls-panel {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-body video::-webkit-media-controls-play-button {
            background-color: red;
            border-radius: 50%;
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
