<div>
    <x-slot name="title">About Us</x-slot>

    @section('about') active @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">About</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="current">About</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->

        <!-- About 2 Section -->
        <section id="about-2" class="about-2 section">

            <div class="container" data-aos="fade-up">

              <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-5">
                  <div class="about-img">
                    <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="Success Tech Multi-Services Team">
                  </div>
                </div>

                <div class="col-lg-7">
                  <h4 class="pt-0 pt-lg-5">Empowering the Future with Comprehensive ICT Solutions</h4>
                  <!-- Tabs -->
                  <ul class="nav nav-pills mb-3">
                    <li><a class="nav-link active" data-bs-toggle="pill" href="#about-2-tab1">Our Services</a></li>
                    <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab2">Why Choose Us</a></li>
                    <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab3">What We Value</a></li>
                  </ul>
                  <!-- End Tabs -->

                  <!-- Tab Content -->
                  <div class="tab-content">

                    <!-- Services Tab -->
                    <div class="tab-pane fade show active" id="about-2-tab1">

                      <p class="fst-italic">Success Tech Multi-Services delivers innovative, reliable, and scalable technology services tailored to meet your needs.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Network Design & Infrastructure</h4>
                      </div>
                      <p align="justify">We plan, install, and maintain secure and efficient wired and wireless network systems for businesses, schools, and institutions.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Website & Software Development</h4>
                      </div>
                      <p align="justify">From corporate websites to custom applications, our development team builds responsive and user-friendly platforms that drive results.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Cybersecurity Solutions</h4>
                      </div>
                      <p align="justify">Protect your business with advanced firewall, antivirus, data protection, and security auditing services to keep threats at bay.</p>

                    </div>
                    <!-- End Services Tab -->

                    <!-- Why Choose Us Tab -->
                    <div class="tab-pane fade" id="about-2-tab2">

                      <p class="fst-italic">We don’t just provide ICT services — we build technology partnerships.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Experienced & Certified Experts</h4>
                      </div>
                      <p align="justify">Our team consists of certified professionals with years of hands-on experience in ICT service delivery across various sectors.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Client-Centered Approach</h4>
                      </div>
                      <p align="justify">We listen, understand your unique goals, and customize our solutions to ensure optimal performance and satisfaction.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>End-to-End ICT Support</h4>
                      </div>
                      <p align="justify">From consultation to deployment and maintenance, we offer complete ICT solutions — allowing you to focus on what matters most.</p>

                    </div>
                    <!-- End Why Choose Us Tab -->

                    <!-- What We Value Tab -->
                    <div class="tab-pane fade" id="about-2-tab3">

                      <p class="fst-italic">At Khahus, we’re driven by values that shape how we serve and innovate.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Innovation</h4>
                      </div>
                      <p align="justify">We constantly explore new technologies and solutions to ensure our clients stay ahead in a fast-paced digital world.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Integrity</h4>
                      </div>
                      <p align="justify">Trust is the core of every successful relationship. We uphold transparency, honesty, and accountability in everything we do.</p>

                      <div class="d-flex align-items-center mt-4">
                        <i class="bi bi-check2"></i>
                        <h4>Excellence</h4>
                      </div>
                      <p align="justify">We’re committed to delivering quality services that exceed expectations — no shortcuts, no compromises.</p>

                    </div>
                    <!-- End What We Value Tab -->

                  </div>

                </div>

              </div>

            </div>

          </section>

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Clients</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Projects</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Hours Of Support</p>
                </div>
              </div><!-- End Stats Item -->

              <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Workers</p>
                </div>
              </div><!-- End Stats Item -->

            </div>

          </div>

        </section><!-- /Stats Section -->

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

          </div>

        </section>

      </main>

</div>
