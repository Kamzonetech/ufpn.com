<div>
    <x-slot name="title">Cotact Us</x-slot>

    @section('contact') active @endsection

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Contact</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li class="current">Contact</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
              <iframe
                  style="border:0; width: 100%; height: 270px;"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.4879146166184!2d7.460251874926871!3d9.06994978844504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e75b6b45ed6b3%3A0x47cb33b6235e531e!2s35%20Ajose%20Adeogun%20St%2C%20Utako%2C%20Abuja!5e0!3m2!1sen!2sng!4v1712251499082!5m2!1sen!2sng"
                  frameborder="0"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade">
              </iframe>

            </div><!-- End Google Maps -->

            <div class="row gy-4">

              <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-geo-alt flex-shrink-0"></i>
                  <div>
                    <h3>Address</h3>
                    <p>No.1 Bewaji Street,Jogbe Complex, powerline,Oshogbo, Osun state.</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-telephone flex-shrink-0"></i>
                  <div>
                    <h3>Call Us</h3>
                    <p>07060475901, 08157186642</p>
                  </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                  <i class="bi bi-envelope flex-shrink-0"></i>
                  <div>
                    <h3>Email Us</h3>
                    <p> SuccessTechMultiServices@gmail.com</p>
                  </div>
                </div><!-- End Info Item -->

              </div>

              <div class="col-lg-8">
                @if (session()->has('success'))
                    <div x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 3000)"
                        class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form wire:submit.prevent="sendMessage" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                  <div class="row gy-4">

                    <div class="col-md-6">
                      <input type="text" wire:model.defer="name" id="name" class="form-control" placeholder="Your Name" required="">
                      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 ">
                      <input type="email" class="form-control"  wire:model.defer="email" placeholder="Your Email" required="">
                      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-12">
                      <input type="text" class="form-control" wire:model.defer="subject" id="subject" placeholder="Subject" required="">
                      @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-12">
                      <textarea class="form-control" wire:model.defer="message" id="message" rows="6" placeholder="Message" required=""></textarea>
                      @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary w-100 py-3" type="submit">
                            <span wire:loading.remove>Send Message</span>
                            <span wire:loading>Sending...</span>
                        </button>
                    </div>

                  </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        window.addEventListener('clearForm', function () {
                            document.getElementById('name').value = '';
                            document.getElementById('email').value = '';
                            document.getElementById('subject').value = '';
                            document.getElementById('message').value = '';
                        });
                    });
                </script>
              </div><!-- End Contact Form -->

            </div>

          </div>

        </section><!-- /Contact Section -->

      </main>

</div>
