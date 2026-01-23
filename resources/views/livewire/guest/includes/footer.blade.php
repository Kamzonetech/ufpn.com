<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
            <span class="sitename">UPFN</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Head Office: 7 Trademore Avenue,900107, Lugbe, Federal Capital Territory, Abuja - Nigeria.
</p>
            <p>Regional Office: Regional Office: 152 Royce Road, Owerri, Imo - State</p>
            <p class="mt-3"><strong>Phone:</strong> <span>09123969350</span></p>
            <p><strong>Email:</strong> <span>ummahpeacefoundation@gmail.com</span></p>
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
            <li><a href="{{ route('services') }}">Projects</a></li>
            <li><a href="{{ route('team') }}">Team</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Mission & Vission</h4>
          <ul>
            <li><a href="#">Empowerment</a></li>
            <li><a href="#">Comunity Development</a></li>
            <li><a href="#">Peace and unity keeping</a></li>
            <li><a href="#">Community outreach</a></li>
            <li><a href="#">Educational awarenes </a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          @livewire('guest.footer-news-letter')
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">UPFN</strong> <span>All Rights Reserved {{ date('Y') }}.</span> Powered by:Kamzone Integrated Technologies LTD.</p>
    </div>

  </footer>
