<div>
    @if($selTeam)
        <div class="modal fade show d-block" id="viewTeamModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="viewTeamModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" wire:ignore.self>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $selTeam->surname ?? '' }} {{ $selTeam->othernames ?? '' }}</h5>
                        <button type="button" class="btn-close" onclick="closeTeamModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="img-fluid rounded-circle mb-3" src="{{ asset('assets/img/'.$selTeam->photo) }}" alt="Team Member" style="width: 150px;">
                        <h4>{{ $selTeam->surname ?? '' }} {{ $selTeam->othernames ?? '' }}</h4>
                        <p class="text-muted">{{ $selTeam->role ?? '' }}</p>
                        <p class="text-start">{!! $selTeam->bio ?? 'No bio available' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
    <script>
        
        function closeTeamModal() {
            Livewire.dispatch('closeTeamModal'); // Tell Livewire to update modal state
        }

        window.addEventListener('modalClosed', event => {
            let modal = document.getElementById("viewTeamModal");
            if (modal) {
                modal.classList.remove("show");
                modal.style.display = "none";
                document.body.classList.remove("modal-open");
                let backdrops = document.getElementsByClassName("modal-backdrop");
                while (backdrops[0]) {
                    backdrops[0].parentNode.removeChild(backdrops[0]); // Remove the dark overlay
                }
            }
        });
    </script>
    @endpush
</div>
