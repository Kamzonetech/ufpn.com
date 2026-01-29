<div>
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome Back!</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="avatar-sm font-size-20 me-3">
                                <span class="avatar-title text-primary rounded">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="font-size-16 mt-2">Team</div>
                            </div>
                        </div>
                        <h4 class="mt-4">{{ \App\Models\Team::count() }}</h4>
                        <div class="row">
                            {{-- <div class="col-7">
                                <p class="mb-0"><span class="text-success me-2"> 0 Upcoming<i
                                            class="mdi mdi-arrow-up"></i> </span></p>
                            </div> --}}
                            <div class="col-12 align-self-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="avatar-sm font-size-20 me-3">
                                <span class="avatar-title text-primary rounded">
                                    <i class="mdi mdi-newspaper-variant-outline"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="font-size-16 mt-2">News</div>

                            </div>
                        </div>
                        <h4 class="mt-4">{{ \App\Models\News::count() }} </h4>
                        <div class="row">
                            {{-- <div class="col-7">
                                <p class="mb-0"><span class="text-success me-2"> {{ \App\Models\News::count() }} <i
                                    class="mdi mdi-arrow-up"></i> </span></p>
                            </div> --}}
                            <div class="col-12 align-self-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="avatar-sm font-size-20 me-3">
                                <span class="avatar-title text-primary rounded">
                                    <i class="mdi mdi-frequently-asked-questions"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <div class="font-size-16 mt-2">Programes</div>
                            </div>
                        </div>
                        <h4 class="mt-4">{{ \App\Models\Project::count() }}</h4>
                        <div class="row">
                            <div class="col-12 align-self-center">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
