<div>
    <x-slot name="title">Add Program</x-slot>

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Add Program</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Program</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <form name="news-post" id="news-post"
                            wire:submit.prevent="addProject(Object.fromEntries(new FormData($event.target)))"
                            enctype="multipart/form-data">
                            <div>
                                <div class="form-floating mb-3">
                                    <input class="form-control shadow-sm" wire:model="title" type="text"
                                        placeholder="Project Title">
                                    <label class="form-label"><b>Program Title</b></label>
                                    @error('title')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- <div class="mb-3 position-relative">
                                    <label class="form-label" for="post_image"><b>Media</b></label>

                                    <!-- Livewire Upload Progress -->
                                    <div x-data="{ isUploading: false, progress: 5 }"
                                         x-on:livewire-upload-start="isUploading = true"
                                         x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                         x-on:livewire-upload-error="isUploading = false"
                                         x-on:livewire-upload-progress="progress = $event.detail.progress">

                                        <!-- File Input Styled Like Text Input -->
                                        <input id="croped_image" name="croped_image" type="text" hidden>
                                        <input type="file" class="form-control shadow-sm py-3" id="post_image"
                                               wire:model="photo" accept="image/*,video/*">

                                        <!-- Upload Progress Bar -->
                                        <div class="progress mt-1" x-show.transition="isUploading">
                                            <div class="progress-bar bg-success progress-bar-striped"
                                                 aria-valuenow="5" aria-valuemin="5" aria-valuemax="100"
                                                 x-bind:style="`width:${progress}%`" role="progressbar">
                                                <span class="sr-only">Uploading...</span>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($photo)
                                        <small class="text-muted d-block mt-1">{{ $photo->getClientOriginalName() }}</small>
                                    @endif

                                    @error('photo')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div> --}}

                                <div class="mb-3 position-relative">
                                    <label class="form-label" for="post_image"><b>Media (Image or Video)</b></label>

                                    <!-- Livewire Upload Progress -->
                                    <div x-data="{
                                        isUploading: false,
                                        progress: 5,
                                        mediaType: null,
                                        showCropper: false
                                    }" x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                        x-on:media-type-detected.window="mediaType = $event.detail.type; showCropper = mediaType === 'image'">

                                        <!-- Hidden inputs -->
                                        <input id="croped_image" name="croped_image" type="text" hidden>

                                        <!-- File Input Styled Like Text Input -->
                                        <input type="file" class="form-control shadow-sm py-3" id="post_image"
                                            wire:model.live="photo" accept="image/*,video/*"
                                            @change="
                                                const file = $event.target.files[0];
                                                if (file) {
                                                    const extension = file.name.split('.').pop().toLowerCase();
                                                    const isImage = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'].includes(extension);
                                                    const isVideo = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'].includes(extension);
                                                    if (isImage) {
                                                        mediaType = 'image';
                                                        showCropper = true;
                                                        $dispatch('media-type-detected', {type: 'image'});
                                                    } else if (isVideo) {
                                                        mediaType = 'video';
                                                        showCropper = false;
                                                        $dispatch('media-type-detected', {type: 'video'});
                                                    }
                                                }
                                            ">

                                        <!-- Upload Progress Bar -->
                                        <div class="progress mt-2" x-show.transition="isUploading">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
                                                aria-valuenow="5" aria-valuemin="5" aria-valuemax="100"
                                                x-bind:style="`width:${progress}%`" role="progressbar">
                                                <span class="sr-only">Uploading...</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Media Information and Preview -->
                                    @if ($photo)
                                        @php
                                            $extension = strtolower($photo->getClientOriginalExtension());
                                            $isImage = in_array($extension, [
                                                'jpg',
                                                'jpeg',
                                                'png',
                                                'gif',
                                                'webp',
                                                'bmp',
                                            ]);
                                            $isVideo = in_array($extension, [
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

                                        <div class="mt-3 p-3 border rounded bg-light">
                                            <!-- File Info -->
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <small class="text-muted">
                                                        <i
                                                            class="fas {{ $isImage ? 'fa-image' : 'fa-video' }} me-1"></i>
                                                        <strong>{{ $isImage ? 'Image' : 'Video' }} File:</strong>
                                                        {{ $photo->getClientOriginalName() }}
                                                    </small>
                                                </div>
                                                <div>
                                                    <span class="badge {{ $isImage ? 'bg-success' : 'bg-primary' }}">
                                                        {{ strtoupper($extension) }}
                                                    </span>
                                                    <span class="badge bg-secondary ms-1">
                                                        {{ number_format($photo->getSize() / 1024, 1) }} KB
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Preview -->
                                            <div class="media-preview mt-2">
                                                @if ($isImage)
                                                    <div class="border rounded p-2 bg-white">
                                                        <p class="small text-muted mb-1">Preview:</p>
                                                        <img src="{{ $photo->temporaryUrl() }}"
                                                            class="img-fluid rounded shadow-sm"
                                                            style="max-height: 200px; object-fit: contain;"
                                                            alt="Image preview">
                                                    </div>
                                                    {{-- <div class="mt-2">
                                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                            wire:click="$dispatch('open-cropper')">
                                                            <i class="fas fa-crop me-1"></i> Crop Image
                                                        </button>
                                                        <small class="text-muted ms-2">
                                                            Click to crop or edit the image
                                                        </small>
                                                    </div> --}}
                                                @elseif($isVideo)
                                                    <div class="border rounded p-2 bg-dark">
                                                        <p class="small text-white mb-1">Video Preview:</p>
                                                        <video controls class="rounded shadow-sm w-100"
                                                            style="max-height: 200px; background: #000;">
                                                            <source src="{{ $photo->temporaryUrl() }}"
                                                                type="video/{{ $extension }}">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <div class="text-center mt-2">
                                                            <span class="badge bg-info">
                                                                <i class="fas fa-play-circle me-1"></i>
                                                                Click play to preview video
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="alert alert-warning">
                                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                                        Unsupported file format. Please upload an image or video.
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Remove button -->
                                            <div class="mt-3 text-end">
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    wire:click="$set('photo', null)">
                                                    <i class="fas fa-trash me-1"></i> Remove Media
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Upload guidelines -->
                                        <div class="mt-2">
                                            <div class="alert alert-info py-2">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <i class="fas fa-info-circle"></i>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <small>
                                                            <strong>Accepted formats:</strong><br>
                                                            • Images: JPG, PNG, GIF, WebP, BMP (max 50MB)<br>
                                                            • Videos: MP4, AVI, MOV, WMV, FLV, MKV, WebM (max 50MB)
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @error('photo')
                                        <div class="alert alert-danger py-2 mt-2">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <style>
                                        .media-preview video::-webkit-media-controls-panel {
                                            background-color: rgba(0, 0, 0, 0.5);
                                        }

                                        .media-preview video::-webkit-media-controls-play-button {
                                            background-color: #fff;
                                            border-radius: 50%;
                                        }

                                        [x-cloak] {
                                            display: none !important;
                                        }

                                        .progress-bar-animated {
                                            animation: progress-bar-stripes 1s linear infinite;
                                        }

                                        @keyframes progress-bar-stripes {
                                            from {
                                                background-position: 1rem 0;
                                            }

                                            to {
                                                background-position: 0 0;
                                            }
                                        }
                                    </style>

                                    <!-- Image Cropper Modal (only for images) -->
                                    {{-- @if ($photo && $isImage)
                                        <div x-data="{ showCropper: false }" x-on:open-cropper.window="showCropper = true"
                                            x-on:cropper-closed.window="showCropper = false">

                                            <!-- Trigger could be handled by the preview button above -->

                                            <!-- Cropper Modal -->
                                            <div x-show="showCropper" 
                                                x-transition:enter="transition ease-out duration-300"
                                                x-transition:enter-start="opacity-0"
                                                x-transition:enter-end="opacity-100"
                                                x-transition:leave="transition ease-in duration-200"
                                                x-transition:leave-start="opacity-100"
                                                x-transition:leave-end="opacity-0"
                                                class="modal fade show" 
                                                style="display: block; background-color: rgba(0,0,0,0.5);"
                                                x-cloak>
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-crop me-1"></i>
                                                                Crop Image
                                                            </h5>
                                                            <button type="button" class="btn-close" 
                                                                    @click="showCropper = false; $dispatch('cropper-closed')"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($photo)
                                                                <!-- You can integrate your existing image cropper component here -->
                                                                <div class="text-center">
                                                                    <img src="{{ $photo->temporaryUrl() }}" 
                                                                        id="imageToCrop" 
                                                                        class="img-fluid" 
                                                                        style="max-height: 400px;">
                                                                </div>
                                                                <div class="mt-3">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                                                            <i class="fas fa-search-plus"></i> Zoom In
                                                                        </button>
                                                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                                                            <i class="fas fa-search-minus"></i> Zoom Out
                                                                        </button>
                                                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                                                            <i class="fas fa-rotate-left"></i> Rotate
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" 
                                                                    @click="showCropper = false; $dispatch('cropper-closed')">
                                                                Cancel
                                                            </button>
                                                            <button type="button" class="btn btn-primary"
                                                                    wire:click="$dispatch('crop-image')">
                                                                <i class="fas fa-check me-1"></i> Apply Crop
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif --}}
                                </div>

                                <div class="mb-3 shadow-sm">
                                    <label class="form-label" for="description"><b>Program Description</b></label>
                                    <div wire:ignore>
                                        <textarea id="message" wire:model="description" class="form-control tinymce-basic shadow-sm" name="description"></textarea>
                                    </div>
                                    @error('description')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control shadow-sm" wire:model="client" type="text"
                                        placeholder="Client">
                                    <label class="form-label"><b>Host/Beneficiary</b></label>
                                    @error('client')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control shadow-sm" wire:model="date" type="date"
                                        placeholder="Date">
                                    <label class="form-label"><b>Date</b></label>
                                    @error('date')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light shadow-lg">
                                    <i wire:loading wire:target="addProject"
                                        class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Add Program
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.cropper-modal.image_cropper')
</div>

<script>
    document.addEventListener('livewire:init', () => {
        // Listen for file input changes
        document.getElementById('post_image')?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const extension = file.name.split('.').pop().toLowerCase();
                const imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
                const videoTypes = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'mkv', 'webm', 'm4v', '3gp'];

                if (imageTypes.includes(extension)) {
                    Livewire.dispatch('media-detected', {
                        type: 'image'
                    });
                } else if (videoTypes.includes(extension)) {
                    Livewire.dispatch('media-detected', {
                        type: 'video'
                    });
                } else {
                    // Show error for unsupported format
                    alert('Unsupported file format. Please upload an image or video.');
                    e.target.value = '';
                }
            }
        });
    });
</script>

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/zw57y70pvsw1yyt6l6etfw152l8w6a7m81cechi2jlw40uuh/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '#message',
            height: 300,
            width: '100%',
            branding: false,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('description', editor.getContent());
                });
            }
        });


        window.addEventListener('feedback', event => {
            tinyMCE.activeEditor.setContent("");
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        window.addEventListener('feedback', event => {
            document.getElementById('croped_image').value = "";
            document.getElementById('previewImage').innerHTML = '<img src=""/>';
        });
    </script>
    <script>
        $(document).ready(function() {
            //start cover photo
            let cropper;
            var finalCropWidth = 1250;
            var finalCropHeight = 850;
            var finalAspectRatio = finalCropWidth / finalCropHeight;

            // Initialize the Cropper.js instance when the modal is shown
            $('#image_modal').on('shown.bs.modal', function() {
                cropper = new Cropper($('#ImageToCrop')[0], {
                    aspectRatio: finalAspectRatio,
                    viewMode: 1,
                    autoCropArea: 0.8,
                    dragMode: 'move',
                    zoomable: true,
                });
            });

            // Destroy the Cropper.js instance when the modal is hidden
            $('#image_modal').on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            // Show the image cropping modal when an image is selected
            $('#post_image').on('change', function(event) {
                const file = event.target.files[0];
                const fileReader = new FileReader();

                fileReader.onload = function(e) {
                    $('#ImageToCrop').attr('src', e.target.result);
                    window.addEventListener('image_file', event => {
                        $('#image_modal').modal('show');
                    });
                };

                fileReader.readAsDataURL(file);
            });

            // Handle the "Crop and Upload" button click
            $('#cropImage').on('click', function(ev) {
                var imgurl = cropper.getCroppedCanvas({
                    width: 1250,
                    height: 850
                }).toDataURL();
                $('#image_modal').modal('hide');
                document.getElementById('croped_image').value = imgurl;
            });
            //end product image
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <style>
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: auto;
            height: 400px;
            background-color: #f7f7f7;
            overflow: hidden;
        }
    </style>
@endpush
