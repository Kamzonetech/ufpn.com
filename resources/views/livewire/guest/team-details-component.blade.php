<div>
    <x-slot name="title">Our Team</x-slot>

    @section('team') active @endsection

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">Team</h1>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="{{ route('welcome') }}">Home</a></li>
              <li class="current">Team</li>
            </ol>
          </nav>
        </div>
    </div>

    
    <div class="container py-5">

        <!-- Back Button -->
        {{-- <div class="mb-4">
          <a href="{{ route('team') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left"></i> Back to Team
          </a>
        </div> --}}
      
        <!-- Team Member Details -->
        <div class="row justify-content-center">
          <div class="col-lg-10" data-aos="fade-up">
      
            <div class="team-member d-flex flex-column flex-md-row align-items-start shadow-lg p-4 bg-white rounded">
              
              <!-- Profile Image -->
              <div class="pic me-md-4 mb-3 mb-md-0">
                <img src="{{ asset('img/members/' . $team->photo) }}" class="img-fluid rounded" alt="{{ $team->surname }}">
              </div>
      
              <!-- Member Info -->
              <div class="member-info flex-grow-1">
      
                <h4>{{ $team->surname . ' ' . $team->othernames }}</h4>
                <span class="text-muted d-block mb-3">{{ $team->role }}</span>
      
                <!-- Full Bio -->
                <p class="mb-4" align="justify">{!! $team->bio ?? 'No bio available.' !!}</p>
      
                <!-- Contact Info -->
                <div class="mb-3">
                  <i class="bi bi-envelope text-primary me-2"></i>
                  <span>{{ $team->email ?? 'Not available' }}</span>
                </div>
      
                <div class="mb-4">
                  <i class="bi bi-telephone text-primary me-2"></i>
                  <span>{{ $team->phone ?? 'Not available' }}</span>
                </div>
      
                <!-- Social Links -->
                <div class="social mt-2">
                  <a href="{{ $team->twitter ?? '#' }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                  <a href="{{ $team->facebook ?? '#' }}" target="_blank"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $team->instagram ?? '#' }}" target="_blank"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $team->linkedin ?? '#' }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
      
              </div>
            </div>
      
          </div>
        </div>
      </div>
</div>
