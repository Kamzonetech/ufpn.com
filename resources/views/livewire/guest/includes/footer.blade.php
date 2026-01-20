<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
            <span class="sitename">Khahus</span>
          </a>
          <div class="footer-contact pt-3">
            <p>No. 35 Ajose Adeogun Street, </p>
            <p>Utako District, Abuja.</p>
            <p class="mt-3"><strong>Phone:</strong> <span>0803592619d, 08129 873974</span></p>
            <p><strong>Email:</strong> <span>khahusconsultingsolutionsltd@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="{{ route('welcome') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About us</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('team') }}">Team</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Consulting</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          @livewire('guest.footer-news-letter')
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Khahus</strong> <span>All Rights Reserved {{ date('Y') }}</span></p>
    </div>

  </footer>
