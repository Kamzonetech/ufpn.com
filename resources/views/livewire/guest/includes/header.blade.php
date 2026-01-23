<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('welcome') }}" class="logo d-flex align-items-center me-auto">
         <img src="assets/img/LOGO UPFN.png" alt="">
        <h1 class="sitename">UPFN</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('welcome') }}" class="@yield('welcome')">Home</a></li>
          <li><a href="{{ route('about') }}" class="@yield('about')">About</a></li>
          {{-- <li><a href="{{ route('services') }}" class="@yield('service')">Projects</a></li>--}}
          <li><a href="{{ route('projects') }}" class="@yield('project')">Programs</a></li>
          <li><a href="{{ route('news') }}" class="@yield('news')">News</a></li>
          <li><a href="{{ route('team') }}" class="@yield('team')">Team</a></li>
          <li><a href="{{ route('contact') }}" class="@yield('contact')">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

    </div>
  </header>
