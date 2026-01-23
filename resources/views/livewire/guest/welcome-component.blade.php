<div>
    <x-slot name="title">UPFN</x-slot>
    <x-slot name="logo">{{ asset('img/dt.png') }}</x-slot>

    @section('welcome') active @endsection

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

          <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
              <img src="{{ asset('assets/img/hero-carousel/hero1.jpg') }}" alt="">
              <div class="carousel-container">
                <h2>Welcome to UPFN (Ummah Peace Foundation Network)</h2>
                <p>
                  (UPFN) is a non-governmental organization established to foster peace, strengthen social cohesion, and support community development through education, humanitarian assistance, advocacy, and sustainable programs. </p>
                <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
              </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
              <img src="{{ asset('assets/img/hero-carousel/hero2.png') }}" alt="">
              <div class="carousel-container">
                <h2> Community Empowerment</h2>
                <p>
UPFN supports education, humanitarian assistance, and skills development to uplift vulnerable groups and improve overall quality of life </p>
                <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
              </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
              <img src="{{ asset('assets/img/hero-carousel/hero3.jpg') }}" alt="">
              <div class="carousel-container">
                <h2>Peace, Unity &  Sustainable Impact </h2>
                <p>
Through advocacy, partnerships, and grassroots action, UPFN fosters lasting social change and builds resilient, inclusive communities.</p>
                <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
              </div>

            </div><!-- End Carousel Item -->

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

          </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>About Us</p>
          </div><!-- End Section Title -->

          <div class="container">

            <div class="row gy-4">

              <!-- Left Content -->
              <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p align="justify">
                    Ummah Peace Foundation Network (UPFN), part of our goals;</p>
                <ul>
                  <li><i class="bi bi-check2-circle"></i> <span>Promotes peace, unity, and social harmony within communities.</span></li>
                  <li><i class="bi bi-check2-circle"></i> <span>Encourages mutual understanding through dialogue and awareness programs.</span></li>
                  <li><i class="bi bi-check2-circle"></i> <span>Strengthens community engagement and cooperation through social initiatives.</span></li>
                </ul>
              </div>

              <!-- Right Content -->
              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <p align="justify">
                  With a dedicated team of experienced volunteers and professionals, Ummah Peace Foundation Network (UPFN) supports communities through people-centered initiatives. Our mission is to promote peace, unity, and social development by delivering programs that are inclusive, impactful, and sustainable for individuals and communities of all sizes. </p>
                <a href="{{ route('about') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>

            </div>

          </div>

        </section>






        <section id="about-values" class="services section bg-light py-5">

          <div class="container">

            <div class="section-title text-center" data-aos="fade-up">
              <h2>Who We Are</h2>
              <p>Our Mission, Vision & Core Values at UPFN</p>
            </div>

            <div class="row gy-4 justify-content-center">
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-bullseye icon text-primary mb-3" style="font-size: 2rem;"></i>
                    <h4 class="title">Our Mission</h4>
                    <p class="description">
                      Our mission is to foster understanding, tolerance, and cooperation among people of all faiths and cultures by promoting peace, unity, and community development through education, advocacy, and inclusive programs that create positive and lasting impact.</p>
                  </div>
                </div>

                <!-- Vision -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-eye icon text-success mb-3" style="font-size: 2rem;"></i>
                    <h4 class="title">Our Vision</h4>
                    <p class="description">
                   We envision a world where people of all faiths and culture can come together in peace and harmony, respecting each other's differences and working towards a common goal of creating a better world for all </p>
                  </div>
                </div>
            </div>

            <div class="row mt-4">
              <!-- Innovation & Creativity -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-lightbulb-fill icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Interfaith Dialogue & Workshops:</h5>
                  <p class="description">We strive in Facilitating conversations to promote understanding between different faiths. </div>
              </div>



              <!-- Integrity & Transparency -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-shield-check icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Educational Programs</h5>
                  <p class="description">We strive in Providing learning opportunities on peace, tolerance, and social harmony.</div>
              </div>



              <!-- Collaboration & Growth -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-graph-up-arrow icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Community Events</h5>
                  <p class="description">we Organize activities that bring people together to foster unity and social cohesion..</p>
                </div>
              </div>


            </div>


          </div>

        </section>


      {{--  <section id="testimonials" class="testimonials section">
          <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
              <h2>Latest Programes</h2>
              <p>Programs</p>
            </div>
            <div class="row gy-4">

              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-item">
                  <img src="{{ asset('assets/img/testimonials/user.png') }}" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Khahus Consulting Solution LTD helped us restructure our IT department, streamline operations, and implement best practices. Their consulting team gave us clarity and confidence in our tech direction.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-item">
                  <img src="{{ asset('assets/img/testimonials/user.png') }}" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>We partnered with Khahus to build a custom web portal for our staff and clients. The result was intuitive, secure, and tailored to our workflow. We highly recommend their team.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-item">
                  <img src="{{ asset('assets/img/testimonials/user.png') }}" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Khahus conducted a full security audit and implemented protective measures for our data and network. We now run safer, faster, and fully compliant with industry standards.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->
            </div>

          </div>

        </section>--}}



         <section id="about-values" class="services section bg-light py-5">
          <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
              <h2>What the World Say About Us</h2>
              <p>Hear from organizations we've empowered</p>
            </div>

            <div class="row gy-4 justify-content-center">

              <!-- Review 1: IT Consultancy -->
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-briefcase-fill icon text-primary mb-3" style="font-size: 2rem;"></i>
                  <h4 class="title">Peace Keeping</h4>
                  <p class="description">
                    "UPFN helped us restructure our IT department, streamline operations, and implement best practices. Their consulting team gave us clarity and confidence in our tech direction."
                  </p>
                </div>
              </div>

              <!-- Review 2 -->
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-code-slash icon text-success mb-3" style="font-size: 2rem;"></i>
                  <h4 class="title">Educational Support</h4>
                  <p class="description">
                    "We partnered with UNICEF to build a custom web portal for our staff and clients. The result was intuitive, secure, and tailored to our workflow. We highly recommend their team."
                  </p>
                </div>
              </div>

              <!-- Review 3 -->
              <div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-shield-check icon text-warning mb-3" style="font-size: 2rem;"></i>
                  <h4 class="title">Community Services</h4>
                  <p class="description">
                    "UPFN conducted a full security audit and implemented protective measures for our data and network. We now run safer, faster, and fully compliant with industry standards."
                  </p>
                </div>
              </div>

            </div>

          </div>

        </section>


      </main>
</div>
