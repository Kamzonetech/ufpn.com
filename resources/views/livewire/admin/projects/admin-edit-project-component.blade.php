<div>
    <x-slot name="title">Modify Program</x-slot>

    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Modify Program</h4>

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
                        <form name="news-post" id="news-post" wire:submit.prevent="updateProject(Object.fromEntries(new FormData($event.target)))" enctype="multipart/form-data">
                            <div>
                                <div class="form-floating mb-3">
                                    <input class="form-control shadow-sm" wire:model="title" type="text" placeholder="Project Title">
                                    <label class="form-label"><b>Program Title</b></label>
                                    @error('title')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label"><b>Image</b></label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('admin/assets/images/projects/'.$selProject->photo)}}" class="rounded" alt="" height="48">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="custom-file">
                                                <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                                    x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                                    x-on:livewire-upload-error="isUploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress">

                                                    <input id="croped_image" name="croped_image" type="text" hidden>
                                                    <input class="form-control shadow-sm py-3" id="post_image" wire:model="photo" type="file"
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
                                        </div>
                                    </div>

                                    @error('photo')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
                                    <input class="form-control shadow-sm" wire:model="client" type="text" placeholder="Client">
                                    <label class="form-label"><b>Client</b></label>
                                    @error('client')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control shadow-sm" wire:model="date" type="date" placeholder="Date">
                                    <label class="form-label"><b>Date</b></label>
                                    @error('date')
                                        <p class="text-danger small mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light shadow-lg">
                                    <i wire:loading wire:target="updateProject"
                                        class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Update Program
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/zw57y70pvsw1yyt6l6etfw152l8w6a7m81cechi2jlw40uuh/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


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
@endpush
