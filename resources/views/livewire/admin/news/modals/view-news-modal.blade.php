<div class="modal fade" id="viewNewsModal" data-bs-backdrop="static" wire:ignore.self data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" wire:ignore.self>
        <div class="modal-content shadow-lg rounded">
            <div class="modal-header text-white" style="background-color: #040525">
                <h5 class="modal-title" id="viewNewsModalLabel" style="color: white;">
                    <i class="fas fa-newspaper me-2"></i> News Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-0">

                    @if($selNews)
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <img src="{{ asset('admin/assets/images/news/'.$selNews->photo) }}"
                                    class="rounded img-fluid shadow-sm" alt="News Image"
                                    style="max-width: 100%; height: 300px; object-fit: cover;">
                            </div>
                            <h2 class="text-center fw-bold mb-3" style="color: #040525">{{ $selNews->title }}</h2>
                            <p class="text-muted" style="line-height: 1.6;">
                                {!! $selNews->description !!}
                            </p>
                        </div>
                    @else
                        <div class="text-center p-3">
                            <x-auth-loader />
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
