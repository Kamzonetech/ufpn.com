<div>
    <x-slot name="title">Our Services</x-slot>
    <x-slot name="title">{{ $service->title }}</x-slot>
    <x-slot name="logo">{{ asset('admin/assets/images/services/' . $service->photo) }}</x-slot>
    <x-slot name="description">{!! Str::limit(strip_tags($service->description), 100) !!}</x-slot>

    @section('service') active @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Service Details</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="current">Service Details</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->
    
        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">
    
          <div class="container">
    
            <div class="row gy-4">
    
              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <h4>Other Services</h4>
                <div class="services-list">
                    @foreach($relatedServices as $related)
                        <a href="{{ route('service.show', $related->slug) }}" class="">{{ $related->title }}</a>
                    @endforeach
                </div>
              </div>
    
              <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('admin/assets/images/services/'.$service->photo) }}" alt="{{ $service->title }}" class="img-fluid services-img">
                <h3>{{ $service->title }}</h3>
                <p>
                    {!! $service->description !!}
                </p>
                {{-- <ul>
                  <li><i class="bi bi-check-circle"></i> <span>Aut eum totam accusantium voluptatem.</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
                </ul> --}}
              </div>
    
            </div>
    
          </div>
    
        </section><!-- /Service Details Section -->
    
      </main>

</div>
