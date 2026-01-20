<div>
    @include('livewire.admin.profile.modals.edit-profile-photo-modal')
    <div class="main-content">

        <div class="page-content">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start row -->
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-widgets py-3">

                                <div class="text-center">
                                    <div class="">
                                        <a>
                                            <img src="{{ asset('admin/assets/images/users/'.Auth::user()->profile_photo_path) }}?t={{ now() }}" alt=""
                                            class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                        </a>
                                    </div>

                                    <div class="mt-3">
                                        <h5 class="fw-bold text-primary">{{ Auth::user()->surname . ' ' . Auth::user()->othernames }}</h5>
                                        <p class="text-muted">{{ Auth::user()->user_type }}</p>
                                        <span class="badge {{ Auth::user()->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ Auth::user()->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            {{-- <form name="new-blog" id="new-blog" wire:submit.prevent="updateProfilePhoto(Object.fromEntries(new FormData($event.target)))" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <div class="custom-file">
                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <input id="croped_image" name="croped_image" type="text" hidden>
                                            <input class="form-control shadow-sm" id="post_image" wire:model="photo" type="file"
                                                accept="image/*,video/*">
                                            <div class="progress mt-1" x-show.transition="isUploading">
                                                <div class="progress-bar bg-success progress-bar-striped"
                                                    aria-valuenow="5" aria-valuemin="5" aria-valuemax="100"
                                                    x-bind:style="`width:${progress}%`" role="progressbar">
                                                    <span class="sr-only">100% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="custom-file-label">
                                            @if ($photo)
                                                {{ $photo->getClientOriginalName() }}
                                            @endif
                                        </label>
                                    </div>
                                    @error('photo')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror

                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        <i wire:loading wire:target="updateProfilePhoto"
                                            class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Upload Photo
                                    </button>
                                </div>
                            </form> --}}
                        </div>
                    </div>

                </div>

                <div class="col-md-12 col-xl-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body">

                            <!-- Tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#biodata" role="tab">
                                        <i class="fas fa-user-circle me-2"></i> Bio Data
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="biodata" role="tabpanel">
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold"><i class="fas fa-user"></i> Surname</label>
                                                <input type="text" value="{{ Auth::user()->surname }}" readonly class="form-control bg-light">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold"><i class="fas fa-user"></i> Othernames</label>
                                                <input type="text" value="{{ Auth::user()->othernames }}" readonly class="form-control bg-light">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold"><i class="fas fa-envelope"></i> Email</label>
                                                <input type="text" value="{{ Auth::user()->email }}" readonly class="form-control bg-light">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Uncomment to display phone and address --}}
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold"><i class="fas fa-phone"></i> Phone Number</label>
                                                <input type="text" value="{{ Auth::user()->phoneno }}" readonly class="form-control bg-light">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold"><i class="fas fa-map-marker-alt"></i> Address</label>
                                                <textarea class="form-control bg-light" readonly rows="2">{{ Auth::user()->address }}</textarea>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- End Page-content -->
    </div>
    @include('livewire.admin.cropper-modal.image_cropper')
</div>
@push('scripts')
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
            var finalCropWidth = 611;
            var finalCropHeight = 522;
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
                    width: 611,
                    height: 522
                }).toDataURL();
                $('#image_modal').modal('hide');
                document.getElementById('croped_image').value = imgurl;
            });
            //end product image
        });
    </script>
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

    <script>
        window.addEventListener('refreshProfilePhoto', event => {
            let img = document.getElementById("profile-image");
            if (img) {
                let currentSrc = img.src;
                img.src = currentSrc.split("?")[0] + "?t=" + new Date().getTime(); // Force image refresh
            }
        });
    </script>
@endpush

