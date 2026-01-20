<div>
    <x-slot name="title">News Letter Subscribers</x-slot>
    <div class="page-content" >

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">News Letter Subscribers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Subscribers</li>
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
                        <x-search-bar wire:model.live="searchTerm" placeholder="Search by email" />
                        <x-spin-loader />
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">

                                    <thead>
                                        <tr>
                                            <th><b>#</b></th>
                                            <th  class="desktopView"><b>Email</b></th>
                                            <th  class="desktopView"><b>Subscribed On</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscribers as $sn => $subscriber)
                                            <tr>
                                                <td scope="row">{{ $sn + 1 }}</td>
                                                <td class="desktopView">{{ $subscriber->email}}</td>
                                                <td  >{{ $subscriber->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="dropdown"> <button  class="btn btn-success" data-bs-toggle="dropdown"  aria-expanded="false"><i class="mdi mdi-dots-vertical m-0 text-white h5"></i> </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            {{-- <a class="dropdown-item" href="{{ route('subscriber.edit',$subscriber->id)}}">Edit</a> --}}
                                                            <a class="dropdown-item confirm-delete" wire:click="setActionId('{{ $subscriber->id }}')" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if(count($subscribers)<=0)
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <img src="{{ asset('img/no-record.jpg')}}"
                                                alt="No results found" style="width: 150px; height: 100px;">
                                                <p class="mt-2 text-danger">No subscribers yet!</p>
                                            </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-3">
                            <ul class="pagination pagination-rounded justify-content-center mb-0">
                                {{ $subscribers->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

