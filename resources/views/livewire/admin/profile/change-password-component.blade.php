<div>
    <div class="main-content">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Change Password</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard')}};">Dashbaord</a></li>
                                <li class="breadcrumb-item active">Password</li>
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
                                        <a data-bs-toggle="modal" data-bs-target="#editProfilePhotoModal" wire:click="setPhoto({{ Auth::user()->id }})">
                                            <img src="{{ asset('admin/assets/images/users/'.Auth::user()->profile_photo_path) }}" alt=""
                                            class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                            <div class="online-circle">
                                            </div>
                                        </a>
                                    </div>

                                    <div class="mt-3 ">
                                        <a href="#" class="text-reset fw-medium font-size-16">{{Auth::user()->surname.' '.Auth::user()->othernames}}</a>
                                        <p class="text-body mt-1 mb-1">{{Auth::user()->user_type}}</p>
                                        <span class="@if(Auth::user()->status=='Active') badge bg-success @else badge bg-success @endif ">{{ Auth::user()->status}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#password" role="tab">
                                        <span class="d-block d-sm-none"><i class="fa fa-lock"></i></span>
                                        <span class="d-none d-sm-block"><b>Password</b></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="password" role="tabpanel">
                                    <form action="#" wire:submit.prevent="changePassword">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userbio">Old Password</label>
                                                    <input type="password" wire:model="current_passowrd" class="form-control" id="lastname" >
                                                    @error('current_passowrd')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div> <!-- end col -->
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userbio">New Password</label>
                                                    <input type="password" wire:model="password" class="form-control" id="lastname" >
                                                    @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div> <!-- end col -->
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userbio">Confirm Password</label>
                                                    <input type="password" wire:model="password_confirmation" class="form-control" id="lastname" >
                                                    @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div> <!-- end col -->
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            <i wire:loading wire:target="changePassword"
                                                class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Change Password
                                        </button>

                                    </form>
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
</div>
