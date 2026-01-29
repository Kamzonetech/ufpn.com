<div>
    <x-slot name="title">Projects</x-slot>
    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Program</h4>

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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <x-search-bar wire:model.live="searchTerm" placeholder="Search by title or description" />
                        <x-spin-loader />
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th><b>#</b></th>
                                            <th class="desktopView"><b>Media</b></th>
                                            <th><b>Beneficiary/Host</b></th>
                                            <th><b>Program Title</b></th>
                                            <th class="desktopView"><b>Program Description</b></th>
                                            <th><b>Date</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <style>
                                            .table-responsive img {
                                                max-width: 50px;
                                                height: auto;
                                            }

                                            td {
                                                vertical-align: middle;
                                            }

                                            @media (max-width: 768px) {
                                                .desktopView {
                                                    display: none;
                                                }
                                            }
                                        </style>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td scope="row">{{ $sn = $sn + 1 }}</td>
                                                {{-- <td class="desktopView">
                                                    <img src="{{ asset('admin/assets/images/projects/' . $project->photo) }}"
                                                        class="rounded" alt="" height="48">

                                                </td> --}}
                                                <td class="desktopView">
                                                    @if ($project->photo)
                                                        @php
                                                            $extension = pathinfo($project->photo, PATHINFO_EXTENSION);
                                                            $isVideo = in_array(strtolower($extension), [
                                                                'mp4',
                                                                'webm',
                                                                'ogg',
                                                                'mov',
                                                                'avi',
                                                                'mkv',
                                                            ]);
                                                        @endphp

                                                        @if ($isVideo)
                                                            <div class="media-preview-wrapper position-relative"
                                                                style="width: 48px; height: 48px;">
                                                                <video class="rounded" height="48"
                                                                    style="object-fit: cover; width: 100%; height: 100%;">
                                                                    <source
                                                                        src="{{ asset('admin/assets/images/projects/' . $project->photo) }}"
                                                                        type="video/{{ $extension }}">
                                                                </video>
                                                                <div class="position-absolute top-0 start-0 bg-dark bg-opacity-50 text-white px-1"
                                                                    style="font-size: 25px; border-radius: 3px 0 3px 0;">
                                                                    <i class="fas fa-video"></i>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img src="{{ asset('admin/assets/images/projects/' . $project->photo) }}"
                                                                class="rounded" alt="" height="48"
                                                                style="object-fit: cover;">
                                                        @endif
                                                    @else
                                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                                            style="width: 48px; height: 48px;">
                                                            <i class="fas fa-image text-light"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $project->client }}</td>
                                                <td>{{ $project->title }}</td>
                                                <td class="desktopView">{!! Str::limit(strip_tags($project->description), 120) !!}</td>
                                                <td>{{ $project->date }}</td>
                                                <td>
                                                    <div class="dropdown"> <button class="btn btn-success"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="mdi mdi-dots-vertical m-0 text-white h5"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            {{-- <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewPblicationModal" wire:click="setproject({{ $project }})" href="#">View</a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('project.edit', $project->id) }}">Edit</a>
                                                            <a class="dropdown-item confirm-delete"
                                                                wire:click="setActionId('{{ $project->id }}')"
                                                                href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($projects) <= 0)
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
                                {{ $projects->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
