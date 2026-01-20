<div>
    <x-slot name="title"> News</x-slot>
    <x-slot name="description">Stay Updated with Our Latest Updates from Success Tech Multi-Services</x-slot>
    <x-slot name="logo">{{ asset('img/dt.png') }}</x-slot>

    @section('news') active @endsection

    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
          <h1 class="mb-2 mb-lg-0">News</h1>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="{{ route('welcome') }}">Home</a></li>
              <li class="current">News</li>
            </ol>
          </nav>
        </div>
      </div>

    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Latest News</h6>
                <h2 class="mt-2">Stay Updated with Our Latest Articles</h2>
            </div>
            <div class="row g-4">
                <!-- News Item 1 -->
                @foreach ($news as $new)
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card border-0 shadow-sm">
                            <img class="card-img-top" src="{{ asset('admin/assets/images/news/'.$new->photo) }}" alt="{{ $new->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $new->title }}</h5>
                                <p class="card-text text-muted">
                                    {{ Str::limit(strip_tags($new->description), 100) }}
                                </p>
                                <a href="{{ route('news.show', $new->slug) }}" class="btn btn-sm btn-primary rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
