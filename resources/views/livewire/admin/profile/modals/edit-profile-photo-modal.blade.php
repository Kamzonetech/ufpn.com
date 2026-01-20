<div class="modal fade xl" id="editProfilePhotoModal" data-bs-backdrop="static" wire:ignore.self data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" wire:ignore.self>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Update Profile Photo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closePhotoModal"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    @if($selectedPhoto)
                        <form name="edit-service" id="edit-service"
                            wire:submit.prevent="updateProfilePhoto"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            {{-- @if($photo)
                                                <img style="border-radius: 10px;" src="{{ $photo->temporaryUrl() }}" width="200" alt="Preview">
                                            @else
                                                <img style="border-radius: 10px;" src="{{ asset('admin/assets/images/users/'.Auth::user()->profile_photo_path) }}" width="200" alt="Current Photo" id="profile-image">
                                            @endif --}}
                                            @if($photo)
                                                @if($errors->has('photo'))
                                                    <img style="border-radius: 10px;" src="{{ asset('admin/assets/images/users/'.Auth::user()->profile_photo_path) }}" width="200" alt="">
                                                @else
                                                <img style="border-radius: 10px;" src="{{ $photo->temporaryUrl() }}" width="200" alt="">
                                                @endif
                                            @else
                                                <img style="border-radius: 10px;" src="{{ asset('admin/assets/images/users/'.Auth::user()->profile_photo_path) }}" width="200" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div style="margin-left: 50%; margin-top: 10%" wire:loading ><x-admin-loader/></div>

                                        <div class="form-group">
                                            <label class="form-label">Choose Photo</label>
                                            <div class="form-file">
                                                <input type="file" wire:model="photo" class="form-control" id="">
                                            </div><br><br>
                                            @error('photo')<p class="text-danger">{{ $message }}</p>@enderror

                                            <input type="button" value="{{ __('Cancel') }}" id="closePhotoModal" class="btn  btn-light" data-bs-dismiss="modal">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                <i wire:loading wire:target="updateProfilePhoto"
                                                    class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Upload Photo
                                            </button>
                                        </div>
                                </div>
                            </div>

                        </form>
                    @else
                        <x-admin-loader/>
                    @endif
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
        <!-- /.modal-content -->
    </div>

</div>
<script>
    window.addEventListener('refreshProfilePhoto', event => {
        let img = document.getElementById("profile-image");
        if (img) {
            let currentSrc = img.src;
            img.src = currentSrc.split("?")[0] + "?t=" + new Date().getTime(); // Force image refresh
        }
    });

    window.addEventListener('feedback', event => {
        document.getElementById("closePhotoModal").click();
    });
</script>
<script>
    window.addEventListener('feedback', event => {
        document.getElementById("closePhotoModal").click();
    })
</script>
