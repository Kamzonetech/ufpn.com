<div>
    <x-slot name="title">Khahus</x-slot>
    <x-slot name="logo">{{ asset('img/dt.png') }}</x-slot>

    @section('welcome') active @endsection

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

          <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
              <img src="{{ asset('assets/img/hero-carousel/hero1.jpg') }}" alt="">
              <div class="carousel-container">
                <h2>Welcome to Khahus Consulting Solution LTD</h2>
                <p>
                  Khahus is your trusted partner in delivering innovative and end-to-end ICT solutions. From custom software development and network infrastructure to cybersecurity, cloud services, and IT training — we empower businesses, institutions, and individuals to thrive in a digital-first world.
                </p>
                <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
              </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
              <img src="{{ asset('assets/img/hero-carousel/hero2.png') }}" alt="">
              <div class="carousel-container">
                <h2>Smart Solutions for a Connected Future</h2>
                <p>
                  At Khahus Consulting Solution LTD, we harness technology to simplify how people connect, work, and grow. Whether you're building a digital business, modernizing infrastructure, or securing data, our team is here to provide innovative solutions that drive real impact.
                </p>
                <a href="{{ route('contact') }}" class="btn-get-started">Get Started</a>
              </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
              <img src="{{ asset('assets/img/hero-carousel/hero3.jpg') }}" alt="">
              <div class="carousel-container">
                <h2>Reliable ICT Services Backed by Expertise</h2>
                <p>
                  With a team of certified professionals and a customer-first approach, Khahus delivers quality ICT services tailored to your goals. From cloud computing to software support, we’re committed to excellence, security, and long-term value.
                </p>
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
                    Khahus Consulting Solution LTD is a leading technology solutions provider committed to delivering innovative, secure, and scalable ICT services. We work with businesses, institutions, and individuals to build efficient systems, improve connectivity, and drive digital transformation.
                </p>
                <ul>
                  <li><i class="bi bi-check2-circle"></i> <span>Custom software, website, and mobile app development tailored to your goals.</span></li>
                  <li><i class="bi bi-check2-circle"></i> <span>Reliable IT infrastructure, networking, and cloud-based services.</span></li>
                  <li><i class="bi bi-check2-circle"></i> <span>Hands-on ICT training and responsive technical support for all users.</span></li>
                </ul>
              </div>

              <!-- Right Content -->
              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <p align="justify">
                  With a team of experienced professionals and a customer-centric approach, Consulting Solution LTD has helped organizations across sectors embrace the power of technology. Our mission is to simplify ICT for everyone — from small startups to large enterprises — by offering solutions that are practical, efficient, and future-ready.
                </p>
                <a href="{{ route('about') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>

            </div>

          </div>

        </section>


        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">

          <div class="container" data-aos="fade-up">

            <div class="row gy-4">

              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
              </div><!-- End Client Item -->

              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
              </div><!-- End Client Item -->

              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
              </div><!-- End Client Item -->

              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="{{ asset('assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
              </div><!-- End Client Item -->

              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="{{ asset('assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
              </div><!-- End Client Item -->

              <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="{{ asset('assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
              </div>

            </div>

          </div>

        </section><!-- /Clients Section -->


        <section id="about-values" class="services section bg-light py-5">

          <div class="container">

            <div class="section-title text-center" data-aos="fade-up">
              <h2>Who We Are</h2>
              <p>Our Mission, Vision & Core Values at Consulting Solution LTD</p>
            </div>

            <div class="row gy-4 justify-content-center">
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-bullseye icon text-primary mb-3" style="font-size: 2rem;"></i>
                    <h4 class="title">Our Mission</h4>
                    <p class="description">
                      To empower businesses, institutions, and individuals with cutting-edge ICT solutions that drive innovation, simplify operations, and enable sustainable growth.
                    </p>
                  </div>
                </div>

                <!-- Vision -->
                <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                    <i class="bi bi-eye icon text-success mb-3" style="font-size: 2rem;"></i>
                    <h4 class="title">Our Vision</h4>
                    <p class="description">
                      To be a leading ICT company recognized for transforming ideas into intelligent digital solutions that connect people and power progress across Africa and beyond.
                    </p>
                  </div>
                </div>
            </div>

            <div class="row mt-4">
              <!-- Innovation & Creativity -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-lightbulb-fill icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Innovation & Creativity</h5>
                  <p class="description">We strive to think beyond boundaries and drive creative solutions.</p>
                </div>
              </div>
            
              <!-- Excellence & Professionalism -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-award-fill icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Excellence & Professionalism</h5>
                  <p class="description">We uphold the highest standards in everything we do.</p>
                </div>
              </div>
            
              <!-- Integrity & Transparency -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-shield-check icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Integrity & Transparency</h5>
                  <p class="description">We build trust through honesty and openness.</p>
                </div>
              </div>
            
              <!-- Client-Centered Service -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-people-fill icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Client-Centered Service</h5>
                  <p class="description">Your satisfaction is our top priority — always.</p>
                </div>
              </div>
            
              <!-- Collaboration & Growth -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-graph-up-arrow icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Collaboration & Growth</h5>
                  <p class="description">Together, we grow stronger and achieve more.</p>
                </div>
              </div>
            
              <!-- Adaptability & Learning -->
              <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-arrow-repeat icon text-danger mb-3" style="font-size: 2rem;"></i>
                  <h5 class="title">Adaptability & Learning</h5>
                  <p class="description">We evolve, adapt, and embrace continuous learning.</p>
                </div>
              </div>
            </div>
            

          </div>

        </section>


        <section id="testimonials" class="testimonials section">
          <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
              <h2>What Our Clients Say</h2>
              <p>Hear from organizations we've empowered with smart ICT solutions</p>
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

        </section>


        {{-- <section id="about-values" class="services section bg-light py-5">
          <div class="container">
            <div class="section-title text-center" data-aos="fade-up">
              <h2>What Our Clients Say</h2>
              <p>Hear from organizations we've empowered with smart ICT solutions</p>
            </div>

            <div class="row gy-4 justify-content-center">

              <!-- Review 1: IT Consultancy -->
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-briefcase-fill icon text-primary mb-3" style="font-size: 2rem;"></i>
                  <h4 class="title">IT Consultancy</h4>
                  <p class="description">
                    "Khahus helped us restructure our IT department, streamline operations, and implement best practices. Their consulting team gave us clarity and confidence in our tech direction."
                  </p>
                </div>
              </div>

              <!-- Review 2 -->
              <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-code-slash icon text-success mb-3" style="font-size: 2rem;"></i>
                  <h4 class="title">Web Application Development</h4>
                  <p class="description">
                    "We partnered with Khahus to build a custom web portal for our staff and clients. The result was intuitive, secure, and tailored to our workflow. We highly recommend their team."
                  </p>
                </div>
              </div>

              <!-- Review 3 -->
              <div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                  <i class="bi bi-shield-check icon text-warning mb-3" style="font-size: 2rem;"></i>
                  <h4 class="title">Cybersecurity Services</h4>
                  <p class="description">
                    "Khahus conducted a full security audit and implemented protective measures for our data and network. We now run safer, faster, and fully compliant with industry standards."
                  </p>
                </div>
              </div>

            </div>

          </div>

        </section> --}}


      </main>
</div>
