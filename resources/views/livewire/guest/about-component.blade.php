<div>
    <x-slot name="title">About Us</x-slot>

    @section('about')
        active
    @endsection

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
                            <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid"
                                alt="Success Tech Multi-Services Team">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h4 class="pt-0 pt-lg-5">About Ummah Peace Foundation Network (UPFN) </h4>
                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#about-2-tab1">Founding and
                                    Identity</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab2">Vision and Mission</a>
                            </li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-2-tab3">Growth, Structure, and
                                    Programs</a></li>
                        </ul>
                        <!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <!-- Services Tab -->
                            <div class="tab-pane fade show active" id="about-2-tab1">

                                <p class="fst-italic">Ummah Peace Foundation Network (UPFN) was established to provide a
                                    platform for grassroots interfaith engagement and peacebuilding initiatives..</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Year Established</h4>
                                </div>
                                <p align="justify">Established in 2021 as a non-governmental organization committed to
                                    peace, interfaith harmony, and social cohesion..</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Grassroots Focus</h4>
                                </div>
                                <p align="justify">Founded from a strong grassroots passion for interfaith dialogue and
                                    understanding..</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Founding Leadership</h4>
                                </div>
                                <p align="justify">Championed by Hajiya Rakiya Munkailu Ahmed, pioneer Financial
                                    Secretary of the Interfaith Dialogue Forum for Peace (IDFP), Nigeria.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Global Inspiration</h4>
                                </div>
                                <p align="justify">Inspired by the International Dialogue Centre (KAICIID), formerly
                                    based in Vienna, Austria, now in Lisbon, Portugal.</p>

                            </div>
                            <!-- End Services Tab -->

                            <!-- Why Choose Us Tab -->
                            <div class="tab-pane fade" id="about-2-tab2">

                                <p class="fst-italic">UPFN is guided by a clear vision and mission that promote peaceful
                                    coexistence and shared values across faiths and cultures.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Shared Vision</h4>
                                </div>
                                <p align="justify">Envisions a world where people of all faiths and cultures live
                                    together in peace and harmony.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Mutual Respect</h4>
                                </div>
                                <p align="justify">Promotes respect for differences while encouraging collaboration for
                                    the common good.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Interfaith Engagement</h4>
                                </div>
                                <p align="justify">Advances interfaith harmony through education, dialogue, and
                                    community building.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Inclusive Spaces</h4>
                                </div>
                                <p align="justify">Creates safe and inclusive spaces to promote peace and social
                                    justice.</p>

                            </div>
                            <!-- End Why Choose Us Tab -->

                            <!-- What We Value Tab -->
                            <div class="tab-pane fade" id="about-2-tab3">

                                <p class="fst-italic">The organization operates through inclusive membership, strong
                                    governance, and impactful community programs.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Inclusive Membership</h4>
                                </div>
                                <p align="justify">Has grown to include members from Muslim and Christian communities
                                    and welcomes adherents of other religions..</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Organizational Structure</h4>
                                </div>
                                <p align="justify">Operates through a structured system comprising a Board of Trustees,
                                    Board of Directors, stakeholders, office staff, and volunteers.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Program Delivery</h4>
                                </div>
                                <p align="justify">Implements programs such as interfaith dialogue and workshops,
                                    community events, educational programs, and advocacy and outreach initiatives.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Grassroots Impact</h4>
                                </div>
                                <p align="justify">Focuses on strengthening understanding, unity, and peaceful
                                    coexistence at the grassroots level..</p>


                            </div>
                            <!-- End What We Value Tab -->

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- Team Section -->
        <section id="team" class="team section">

            <div class="container">

                <div class="row gy-4">
                    @foreach ($teams as $team)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member d-flex align-items-start">
                                <div class="pic"><img src="{{ asset('img/members/' . $team->photo) }}"
                                        class="img-fluid" alt=""></div>
                                <div class="member-info">
                                    <a href="{{ route('team.details', $team->id) }}"
                                        class="text-decoration-none text-dark">
                                        <h4>{{ $team->surname . ' ' . $team->othernames }}</h4>
                                        <span>{{ $team->role }}</span>
                                        <p>{!! Str::limit($team->bio, 50) !!}</p>
                                    </a>
                                    <div class="social position-relative">
                                        <a href="{{ $team->twitter ?? '#' }}" target="_blank"><i
                                                class="bi bi-twitter-x"></i></a>
                                        <a href="{{ $team->facebook ?? '#' }}" target="_blank"><i
                                                class="bi bi-facebook"></i></a>
                                        <a href="{{ $team->instagram ?? '#' }}" target="_blank"><i
                                                class="bi bi-instagram"></i></a>
                                        <a href="{{ $team->linkedin ?? '#' }}" target="_blank"> <i
                                                class="bi bi-linkedin"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section>

        <section id="about-values" class="services section bg-light py-5">

            <div class="container">

                <div class="section-title text-center" data-aos="fade-up">
                    <h2>Mission & Vision</h2>
                    <p>Our Mission & Vision</p>
                </div>

                <div class="row gy-4 justify-content-center">
                    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                            <i class="bi bi-bullseye icon text-primary mb-3" style="font-size: 2rem;"></i>
                            <h4 class="title">Our Mission</h4>
                            <p class="description">
                                Our mission is to foster understanding, tolerance, and cooperation among people of all
                                faiths and cultures by promoting peace, unity, and community development through
                                education, advocacy, and inclusive programs that create positive and lasting impact.</p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex flex-column text-center h-100 p-4 shadow-sm bg-white rounded">
                            <i class="bi bi-eye icon text-success mb-3" style="font-size: 2rem;"></i>
                            <h4 class="title">Our Vision</h4>
                            <p class="description">
                                We envision a world where people of all faiths and culture can come together in peace
                                and harmony, respecting each other's differences and working towards a common goal of
                                creating a better world for all </p>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </main>

</div>
