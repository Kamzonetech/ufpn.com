<div>
    @include('livewire.admin.teams.modals.member-details')
    <x-slot name="title">Team Members</x-slot>

    <div class="page-content" >

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Team Members </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Members</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12" >
                <div class="card">
                    <div class="card-body">
                        <x-search-bar wire:model.live="searchTerm" placeholder="Search by team title or description" />
                        <x-spin-loader />
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th><b>#</b></th>
                                            <th><b>Photo</b></th>
                                            <th><b>Fullname</b></th>
                                            <th><b>Bio</b></th>
                                            <th><b>Role</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <style>
                                            td {
                                                vertical-align: middle;
                                                white-space: wrap;
                                            }
                                            .table-responsive img {
                                                max-width: 50px;
                                                height: auto;
                                            }
                                        </style>
                                        @foreach ($members as $member)
                                            <tr>
                                                <td scope="row">{{ $sn = $sn + 1 }}</td>
                                                <td><img src="{{ asset('img/members/'.$member->photo) }}" class="rounded-circle avatar-xs m-1" alt=""></td>
                                                <td>{{ $member->surname.' '.$member->othernames }}</td>
                                                <td>{!! Str::limit(strip_tags($member->bio), 120) !!}</td>
                                                <td>{{ $member->role }}</td>
                                                <td>
                                                    <div class="dropdown float-end">
                                                        <button class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-white h5"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewMemberModal"
                                                                wire:click="setMember({{ $member }})" href="#"><i class="fa fa-eye"></i> View</a>
                                                            <a class="dropdown-item" href="{{ route('team.edit',$member->id) }}">
                                                                <i class="fa fa-pencil"></i> Edit</a>
                                                            <a class="dropdown-item confirm-delete" wire:click="setActionId('{{ $member->id }}')"
                                                                href="#"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if(count($members) <= 0)
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    <img src="{{ asset('img/no-record.jpg') }}" alt="No results found"
                                                        style="width: 150px; height: 100px;">
                                                    <p class="mt-2 text-danger">No record found!</p>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="mt-3">
                            <ul class="pagination pagination-rounded justify-content-center mb-0">
                                {{ $members->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    // window.addEventListener('image_file', event => {
                        $('#image_modal').modal('show');
                    // });
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
@endpush
