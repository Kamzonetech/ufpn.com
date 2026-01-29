<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('admin/assets/images/users/' . Auth::user()->profile_photo_path) }}?t={{ now() }}"
                            alt="Header Avatar" id="profile-image">
                        <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->surname }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('profile') }}"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i>Profile
                        </a>
                        <a class="dropdown-item d-block" href="{{ route('password.change') }}"><span
                                class="badge bg-success float-end"></span><i
                                class="bx bx-wrench font-size-16 align-middle me-1"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger confirm-logout" href="#"
                            onclick="event.preventDefault(); "><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf</form>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <div class="navbar-brand-box">


                    <a href="{{ route('admin.dashboard') }}" class="logo logo-light mt-2">
                        {{-- <span class="logo-sm">
                            <img src="{{ asset('admin/assets/images/LOGO UPFN.png') }}" class="logo-main" alt="Logo" height="20">
                        </span> --}}

                        <h1 class="text-white"><span class="logo-lg">
                                <img src="{{ asset('admin/assets/images/logo2.png') }}" class="logo-main" alt="Logo"
                                    height="70">UPFN

                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                    id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>

        </div>
    </div>
</header>
