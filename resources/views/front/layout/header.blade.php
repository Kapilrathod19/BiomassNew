 <!-- =========================
        Header
    =========================== -->

 <!-- Navbar Start -->
 <div class="container-fluid bg-white sticky-top">
     @php
         $WebsiteLogo = \App\Models\WebsiteLogo::first();
     @endphp
     <div class="container">
         <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
             <a href="{{ route('home') }}" class="navbar-brand">
                 @if ($WebsiteLogo && $WebsiteLogo->logo)
                     <img class="img-fluid mt-1" src="{{ asset('WebsiteLogo/' . $WebsiteLogo->logo) }}" alt="Logo">
                 @endif
             </a>
             <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                 data-bs-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <div class="navbar-nav ms-auto">
                     <a href="{{route('home')}}" class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                     <a href="{{route('about_us')}}" class="nav-item nav-link {{ Route::is('about_us') ? 'active' : '' }}">About</a>
                     <a href="{{route('products')}}" class="nav-item nav-link {{ Route::is('products') ? 'active' : '' }}">Products</a>
                     <a href="{{route('price.list')}}" class="nav-item nav-link {{ Route::is('price.list') ? 'active' : '' }}">Plans</a>
                     <a href="{{route('contact_us')}}" class="nav-item nav-link {{ Route::is('contact_us') ? 'active' : '' }}">Contact</a>
                 </div>
                 <div class="border-start ps-4 ">
                    <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user"></i></a>
                         <div class="dropdown-menu bg-light rounded-0 m-0">
                                @if (Auth::check())
                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item">Dashboard</a>
                                    <a href="{{ route('user.products') }}" class="dropdown-item">My Products</a>
                                    <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                    {{-- <a href="{{ route('profile') }}" class="dropdown-item">Profile</a> --}}
                                @else
                                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                    <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                                @endif
                         </div>
                     </div>
                 </div>
             </div>
         </nav>
     </div>
 </div>
 <!-- Navbar End -->