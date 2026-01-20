<div class="modal fade xl" id="viewMemberModal" data-bs-backdrop="static" wire:ignore.self data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" wire:ignore.self>
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #040525">
                <h5 class="modal-title" id="viewMemberModalLabel" style="color: white;"><i class="fa fa-user-circle"></i> Team Member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                @if($selMember)
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">

                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img/members/'.$selMember->photo) }}" class="rounded-circle border shadow-lg" alt="Team Member Photo" height="150" width="150">
                                </div>

                                <div class="col-md-8">
                                    <h3 class="fw-bold">{{ $selMember->surname.' '.$selMember->othernames }}</h3>
                                    <span class="badge" style="background-color: #040525">{{ ucfirst($selMember->role) }}</span>
                                    <p class="mt-2 text-justify">{!! $selMember->bio !!}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <p><i class="bi bi-envelope-fill text-primary"></i> <strong>Email:</strong> {{ $selMember->email }}</p>
                                    <p><i class="bi bi-telephone-fill text-primary"></i> <strong>Phone:</strong> {{ $selMember->phone }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="bi bi-briefcase-fill text-primary"></i> <strong>Role:</strong> {{ ucfirst($selMember->role) }}</p>
                                    <p><i class="bi bi-briefcase-fill text-primary"></i> <strong>Status:</strong> {{ ucfirst($selMember->member_status) }}</p>
                                </div>
                            </div>
                            <!-- Social Media Links -->
                            <div class="row mt-3">
                                <div class="col text-center">
                                    @if($selMember->linkedin)
                                        <a href="{{ $selMember->linkedin }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fa fa-linkedin"></i> LinkedIn
                                        </a>
                                    @endif
                                    @if($selMember->twitter)
                                        <a href="{{ $selMember->twitter }}" target="_blank" class="btn btn-sm btn-outline-dark me-2">
                                            <i class="fa fa-twitter"></i> Twitter (X)
                                        </a>
                                    @endif
                                    @if($selMember->instagram)
                                        <a href="{{ $selMember->instagram }}" target="_blank" class="btn btn-sm btn-outline-danger me-2">
                                            <i class="fa fa-instagram"></i> Instagram
                                        </a>
                                    @endif
                                    @if($selMember->facebook)
                                        <a href="{{ $selMember->facebook }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fa fa-facebook"></i> Facebook
                                        </a>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <x-auth-loader/>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
