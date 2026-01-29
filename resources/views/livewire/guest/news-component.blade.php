<div>
    <x-slot name="title">News</x-slot>
    <x-slot name="description">Stay Updated with Our Latest Updates from Success Tech Multi-Services</x-slot>
    <x-slot name="logo">{{ asset('img/dt.png') }}</x-slot>

    @section('news')
        active
    @endsection

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">News</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="current">News</li>
                </ol>
            </nav>
        </div>
    </div>

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
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        @if ($isVideo)
                                            <video controls class="w-100" style="max-height: 70vh;">
                                                <source src="{{ $mediaUrl }}" type="video/{{ $extension }}">
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

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $news->links() }}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</div>



<script>
    // Auto-play video when modal opens
    document.addEventListener('DOMContentLoaded', function() {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('shown.bs.modal', function(event) {
                const video = this.querySelector('video');
                if (video) {
                    video.play().catch(e => {
                        // Autoplay prevented
                        console.log('Autoplay prevented:', e);
                    });
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
</script>
