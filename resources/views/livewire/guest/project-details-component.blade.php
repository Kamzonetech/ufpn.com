<div>
    <x-slot name="title">Our Programs</x-slot>

    @section('project') active @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Program Details</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="current">Program Details</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->

        <section id="portfolio-details" class="portfolio-details section">
          <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                        {{-- Project Image --}}
                        <div class="position-relative">
                            <img src="{{ asset('admin/assets/images/projects/' . $project->photo) }}"
                                 class="w-100"
                                 style="object-fit: cover; height: 400px;"
                                 alt="{{ $project->title }}">
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body p-5">

                            {{-- Title --}}
                            <h2 class="fw-bold text-dark mb-3">
                                {{ $project->title }}
                            </h2>

                            {{-- Meta Info --}}
                            <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start gap-4 mb-4 text-muted">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-event me-2 text-primary fs-5"></i>
                                    <span><strong>Date:</strong> {{ $project->date }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person me-2 text-success fs-5"></i>
                                    <span><strong>Benefactor:</strong> {{ $project->client }}</span>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="mb-4">
                                <h5 class="fw-semibold text-dark mb-2">Program Description</h5>
                                <p class="text-secondary" style="line-height: 1.7;">
                                    {!! $project->description !!}
                                </p>
                            </div>

                            {{-- External Link / CTA --}}
                            @if($project->link)
                                <div class="text-end">
                                    <a href="{{ $project->link }}"
                                       target="_blank"
                                       class="btn btn-primary rounded-pill shadow-sm">
                                        View Live Program <i class="bi bi-box-arrow-up-right ms-2"></i>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
        </section>
      </main>



</div>
