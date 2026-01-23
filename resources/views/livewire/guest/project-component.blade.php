<div>
    <x-slot name="title">Our Programs</x-slot>

    @section('project') active @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Programs</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="current">Portfolio</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->

        <section id="portfolio" class="portfolio section py-5">
          <div class="container">

            <!-- Section Title -->
            <div class="text-center mb-5">
              <h2 class="fw-bold text-primary">Our Programs</h2>
              <p class="text-muted">Explore our recent Programs — from Empowerment to Peace keeping.</p>
            </div>

            @if($projects->count())
              <!-- Portfolio Grid -->
              <div class="row g-4">
                @foreach ($projects as $project)


                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card border-0 shadow-lg h-100 transition-transform hover:-translate-y-1 hover:shadow-xl rounded-3 overflow-hidden">

                      {{-- Project Image --}}
                      <div class="position-relative">
                          <img src="{{ asset('admin/assets/images/projects/' . $project->photo) }}"
                               class="card-img-top"
                               alt="{{ $project->title }}"
                               style="object-fit: cover; height: 220px; width: 100%;">
                      </div>

                      {{-- Card Body --}}
                      <div class="card-body d-flex flex-column px-4 py-4">

                          {{-- Title --}}
                          <h5 class="card-title fw-bold text-primary mb-2 text-truncate">
                              {{ Str::limit($project->title, 25) }}
                          </h5>

                          {{-- Meta Section --}}
                          <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start text-muted small mb-3 gap-2">
                              <div class="d-flex align-items-center">
                                  <i class="bi bi-calendar-event me-2 text-primary fs-6"></i>
                                  <span><strong>Date:</strong> {{ $project->date }}</span>
                              </div>
                              <div class="d-flex align-items-center">
                                  <i class="bi bi-person me-2 text-success fs-6"></i>
                                  <span><strong>Beneficiary:</strong> {{ $project->client }}</span>
                              </div>
                          </div>

                          {{-- Description --}}
                          <p class="text-secondary small flex-grow-1 mb-3">
                              {!! Str::limit($project->description, 150) !!}
                          </p>

                          {{-- Action Button --}}
                          <a href="{{ route('project.details',$project->slug) }}"
                             class="btn btn-sm btn-outline-danger w-100 d-flex justify-content-between align-items-center rounded-pill shadow-sm">
                              <span>View Details</span>
                              <i class="bi bi-arrow-right"></i>
                          </a>
                      </div>
                  </div>
              </div>


                @endforeach
              </div>

              <!-- Pagination -->
              <div class="d-flex justify-content-center mt-5">
                {{ $projects->links() }}
              </div>
            @else
              <!-- Empty State -->
              <div class="text-center py-5">
                <h4 class="text-muted text-danger">No Program available at the moment.</h4>
              </div>
            @endif

          </div>
        </section>


      </main>

</div>
