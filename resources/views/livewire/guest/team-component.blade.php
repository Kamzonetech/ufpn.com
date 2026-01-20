<div>
    <x-slot name="title">Our Team</x-slot>

    @section('team') active @endsection

    <main class="main">

        <!-- Page Title -->
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
    
        <!-- Team Section -->
        <section id="team" class="team section">
    
          <div class="container">
    
            <div class="row gy-4">
                @foreach ($teams as $team)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('img/members/'.$team->photo) }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <a href="{{ route('team.details', $team->id) }}" class="text-decoration-none text-dark">
                                    <h4>{{ $team->surname . ' ' . $team->othernames }}</h4>
                                    <span>{{ $team->role }}</span>
                                    <p>{!! Str::limit($team->bio, 50) !!}</p>
                                </a>
                                <div class="social position-relative">
                                    <a href="{{ $team->twitter ?? '#' }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                                    <a href="{{ $team->facebook ?? '#' }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $team->instagram ?? '#' }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="{{ $team->linkedin ?? '#' }}" target="_blank"> <i class="bi bi-linkedin"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                {{ $teams->links() }}
            </div>
    
          </div>
    
        </section>
    
      </main>
</div>
