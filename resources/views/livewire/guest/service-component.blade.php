<div>
    <x-slot name="title"> Services - Daimun Technologies Ltd.</x-slot>
    <x-slot name="description">Solutions We Provide at Daimun Technologies Limited</x-slot>
    <x-slot name="logo">{{ asset('img/dt.png') }}</x-slot>
    

    @section('service') active @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Services</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="current">Services</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->
    
        <!-- Services Section -->
        <section id="services" class="services section">
    
          <div class="container">
    
            <div class="row gy-4">
                @foreach ($services as $service)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-briefcase icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="{{ route('service.show', $service->slug) }}" class="stretched-link">{{ $service->title }}</a></h4>
                            <p class="description">{{ Str::limit(strip_tags($service->description), 150) }}</p>
                        </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-3">
                    {{ $services->links() }}
                </div>

            </div>
    
          </div>
    
        </section><!-- /Services Section -->
    
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
              <h2>Our Core Services</h2>
              <p>Explore the powerful solutions we offer at Khahus ICT</p>
            </div>
            <!-- End Section Title -->
          
            <div class="container" data-aos="fade-up" data-aos-delay="100">
          
              <div class="row">
                <div class="col-lg-3">
                  <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                      <a class="nav-link active show" data-bs-toggle="tab" href="#features-tab-1">Network & Infrastructure</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#features-tab-2">Web & App Development</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#features-tab-3">ICT Training & Support</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#features-tab-4">Cybersecurity Solutions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#features-tab-5">Cloud & Hosting Services</a>
                    </li>
                  </ul>
                </div>
          
                <div class="col-lg-9 mt-4 mt-lg-0">
                  <div class="tab-content">
          
                    <!-- Tab 1 -->
                    <div class="tab-pane active show" id="features-tab-1">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Network Design & Infrastructure Deployment</h3>
                          <p class="fst-italic">We build secure and scalable IT networks for organizations of all sizes.</p>
                          <p>From structured cabling and server room setup to Wi-Fi configuration and network security, we ensure your infrastructure supports your goals. Whether it’s LAN, WAN, or enterprise-grade networking — Khahus delivers seamless connectivity.</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/tabs/tab-1.png" alt="Network services" class="img-fluid">
                        </div>
                      </div>
                    </div>
          
                    <!-- Tab 2 -->
                    <div class="tab-pane" id="features-tab-2">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Custom Web and Mobile Application Development</h3>
                          <p class="fst-italic">We bring your digital ideas to life with cutting-edge development.</p>
                          <p>From e-commerce platforms and corporate websites to Android/iOS apps and enterprise portals, Khahus designs and develops modern digital solutions tailored to your business. We prioritize performance, user experience, and future scalability.</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/tabs/tab-2.png" alt="Web & App Development" class="img-fluid">
                        </div>
                      </div>
                    </div>
          
                    <!-- Tab 3 -->
                    <div class="tab-pane" id="features-tab-3">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Professional ICT Training & Technical Support</h3>
                          <p class="fst-italic">Empowering individuals and organizations with hands-on ICT skills.</p>
                          <p>We offer practical training in computer literacy, software tools, web development, networking, and more. Khahus also provides on-demand technical support to ensure your systems run efficiently with minimal downtime.</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/tabs/tab-3.png" alt="ICT Training" class="img-fluid">
                        </div>
                      </div>
                    </div>
          
                    <!-- Tab 4 -->
                    <div class="tab-pane" id="features-tab-4">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Cybersecurity & Data Protection</h3>
                          <p class="fst-italic">Your data is your greatest asset — we help you protect it.</p>
                          <p>Khahus implements best-in-class cybersecurity measures including firewall configuration, penetration testing, antivirus deployment, secure backup systems, and user access control — to guard your digital infrastructure from threats and breaches.</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/tabs/tab-4.png" alt="Cybersecurity Services" class="img-fluid">
                        </div>
                      </div>
                    </div>
          
                    <!-- Tab 5 -->
                    <div class="tab-pane" id="features-tab-5">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <h3>Cloud Computing & Hosting Solutions</h3>
                          <p class="fst-italic">We help you scale efficiently with reliable cloud services.</p>
                          <p>From virtual servers and email hosting to cloud backup and SaaS infrastructure, Khahus provides secure, fast, and scalable hosting services. We partner with trusted providers to ensure optimal uptime and flexibility for your digital operations.</p>
                        </div>
                        <div class="col-lg-4 text-center order-1 order-lg-2">
                          <img src="assets/img/tabs/tab-5.png" alt="Cloud Hosting Services" class="img-fluid">
                        </div>
                      </div>
                    </div>
          
                  </div>
                </div>
              </div>
          
            </div>
          
          </section>
          
    
      </main>
</div>
