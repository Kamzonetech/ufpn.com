<div>
    <x-slot name="title">{{ $news->title }}</x-slot>
    <x-slot name="logo">{{ asset('admin/assets/images/news/' . $news->photo) }}</x-slot>
    <x-slot name="description">{!! Str::limit(strip_tags($news->description),100) !!}</x-slot>

    @section('news') active @endsection
    

    <main class="main">

        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
              <h1 class="mb-2 mb-lg-0">News Details</h1>
              <nav class="breadcrumbs">
                <ol>
                  <li><a href="{{ route('welcome') }}">Home</a></li>
                  <li class="current">News Details</li>
                </ol>
              </nav>
            </div>
        </div>
    
        <div class="container">
          <div class="row">
    
            <div class="col-lg-8">
    
              <!-- Blog Posts Section -->
              <section id="blog-posts" class="blog-posts section">
    
                <div class="container">
    
                  <div class="row gy-4">
    
                    <div class="col-lg-12">
                      <article>
    
                        <div class="post-img">
                          <img src="{{ asset('admin/assets/images/news/'.$news->photo) }}" alt="{{ $news->title }}" class="img-fluid">
                        </div>
    
                        <h2 class="title">
                          <a href="#">{{ $news->title }}</a>
                        </h2>
    
                        <div class="meta-top">
                          <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">John Doe</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ $news->created_at->format('F d, Y') }}">{{ $news->created_at->format('F d, Y') }}</time></a></li>
                          </ul>
                        </div>
    
                        <div class="content">
                          <p>
                            {!! $news->description !!}
                          </p>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>
    
              </section><!-- /Blog Posts Section -->
            </div>
    
            <div class="col-lg-4 sidebar">
    
              <div class="widgets-container">
    
                <div class="recent-posts-widget widget-item">
    
                  <h3 class="widget-title">Recent News</h3>
                  @foreach($relatedNews as $related)
                    <div class="post-item">
                        <img src="{{ asset('admin/assets/images/news/'.$news->photo) }}" alt="" class="flex-shrink-0">
                        <div>
                        <h4><a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a></h4>
                        <time datetime="{{ $news->created_at->format('F d, Y') }}">{{ $news->created_at->format('F d, Y') }}</time>
                        </div>
                    </div>
                  @endforeach
    
                </div>
              </div>
    
            </div>
    
          </div>
        </div>
    
      </main>

</div>
