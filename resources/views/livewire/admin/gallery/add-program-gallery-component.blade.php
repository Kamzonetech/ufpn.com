<div>
    <x-slot name="title">Program Gallery</x-slot>

    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Program Gallery</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Programs</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="save">
                            <!-- Program Selection -->
                            <div class="form-floating mb-3">
                                <select wire:model.live="project_id" class="form-select shadow-sm" id="projectSelect">
                                    <option value="">-- Select a Program --</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                <label for="projectSelect" class="form-label"><b>Select Program</b></label>
                                @error('project_id')
                                    <p class="text-danger small mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            @if ($project_id)
                                <!-- Multiple Image Upload -->
                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="imagesInput"><b>Upload Images</b></label>

                                    <!-- Livewire Upload Progress -->
                                    <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                                        <!-- File Input -->
                                        <input type="file" class="form-control shadow-sm py-3" id="imagesInput"
                                            wire:model="images" multiple accept="image/*">

                                        <!-- Upload Progress Bar -->
                                        <div class="progress mt-1" x-show.transition="isUploading">
                                            <div class="progress-bar bg-success progress-bar-striped" aria-valuenow="5"
                                                aria-valuemin="5" aria-valuemax="100"
                                                x-bind:style="`width:${progress}%`" role="progressbar">
                                                <span class="sr-only">Uploading...</span>
                                            </div>
                                        </div>
                                    </div>

                                    <small class="text-muted d-block mt-1">
                                        You can select multiple images (Max 5MB each)
                                    </small>
                                    @error('images.*')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image Previews with Titles and Descriptions -->
                                @if ($images && count($images) > 0)
                                    <div class="mb-4 border rounded p-3 shadow-sm">
                                        <h5 class="font-weight-bold mb-3">Image Previews ({{ count($images) }})</h5>
                                        <div class="row g-3">
                                            @foreach ($images as $index => $image)
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="border rounded p-3 h-100">
                                                        <img src="{{ $image->temporaryUrl() }}"
                                                            class="w-100 rounded mb-3"
                                                            style="height: 180px; object-fit: cover;">

                                                        <div class="form-floating mb-2">
                                                            <input type="text"
                                                                class="form-control form-control-sm shadow-sm"
                                                                wire:model="titles.{{ $index }}"
                                                                placeholder="Image Title"
                                                                id="title_{{ $index }}">
                                                            <label for="title_{{ $index }}" class="small">Title
                                                                (optional)
                                                            </label>
                                                        </div>

                                                        <div class="form-floating">
                                                            <textarea class="form-control form-control-sm shadow-sm" wire:model="descriptions.{{ $index }}"
                                                                placeholder="Description" id="desc_{{ $index }}" style="height: 80px"></textarea>
                                                            <label for="desc_{{ $index }}"
                                                                class="small">Description (optional)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" wire:loading.attr="disabled"
                                        class="btn btn-success waves-effect waves-light shadow-lg">
                                        <i wire:loading wire:target="save"
                                            class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>
                                        <span wire:loading.remove>Upload Images</span>
                                        <span wire:loading>Uploading...</span>
                                    </button>
                                </div>
                            @endif
                        </form>

                        <!-- Existing Gallery Images -->
                        @if ($project_id && $existingGalleries && $existingGalleries->count() > 0)
                            <div class="mt-5 pt-4 border-top">
                                <h5 class="font-weight-bold mb-4">
                                    Existing Gallery Images
                                    <span class="badge bg-primary">{{ $existingGalleries->count() }}</span>
                                </h5>

                                <div class="row g-3">
                                    @foreach ($existingGalleries as $gallery)
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="card border shadow-sm">
                                                <div class="position-relative overflow-hidden" style="height: 180px;">
                                                    <img src="{{ $gallery->thumbnail_url }}"
                                                        alt="{{ $gallery->title }}" class="card-img-top w-100 h-100"
                                                        style="object-fit: cover;">

                                                    @if ($gallery->is_featured)
                                                        <span
                                                            class="position-absolute top-0 start-0 bg-warning text-white px-2 py-1 small">
                                                            <i class="bx bx-star"></i> Featured
                                                        </span>
                                                    @endif

                                                    <div
                                                        class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-2">
                                                        <p class="small mb-0 text-truncate">
                                                            {{ $gallery->title ?? 'No title' }}</p>
                                                    </div>
                                                </div>

                                                <div class="card-body p-2">
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <button wire:click="setFeatured({{ $gallery->id }})"
                                                            class="btn btn-sm btn-warning px-2 py-1"
                                                            title="Set as Featured">
                                                            <i class="bx bx-star font-size-12"></i>
                                                        </button>
                                                        <button wire:click="deleteImage({{ $gallery->id }})"
                                                            onclick="return confirm('Are you sure you want to delete this image?')"
                                                            class="btn btn-sm btn-danger px-2 py-1"
                                                            title="Delete Image">
                                                            <i class="bx bx-trash font-size-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @elseif ($project_id && $existingGalleries && $existingGalleries->count() == 0)
                            <div class="mt-5 pt-4 border-top">
                                <div class="alert alert-info mb-0">
                                    <i class="bx bx-info-circle me-2"></i>
                                    No gallery images found for this program. Upload images using the form above.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('message') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Add confirmation for delete action
        document.addEventListener('livewire:initialized', () => {
            @this.on('confirm-delete', (id) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('deleteImage', id);
                    }
                });
            });
        });

        // Success message handler
        Livewire.on('galleryUpdated', (message) => {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message,
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
@endpush
