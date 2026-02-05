    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        @php
            $ContactUs = \App\Models\ContactUs::first();
            $WebsiteLogo = \App\Models\WebsiteLogo::first();
        @endphp
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        @if ($WebsiteLogo && $WebsiteLogo->logo)
                            <img class="img-fluid" src="{{ asset('WebsiteLogo/' . $WebsiteLogo->logo) }}" alt="Logo">
                        @endif
                    </a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Business Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Our Office</h4>
                    @if ($ContactUs && $ContactUs->address)
                        <p class="mb-2"><i
                                class="fa fa-map-marker-alt text-primary me-3"></i>{{ $ContactUs->address ?? '' }}</p>
                    @endif
                    @if ($ContactUs && $ContactUs->mobile)
                        <p class="mb-2"><i
                                class="fa fa-phone-alt text-primary me-3"></i>{{ $ContactUs->mobile ?? '' }}
                        </p>
                    @endif
                    @if ($ContactUs && $ContactUs->email)
                        <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>{{ $ContactUs->email ?? '' }}
                        </p>
                    @endif
                    <div class="d-flex pt-3">
                        @if ($ContactUs && $ContactUs->twitter_link)
                            <a class="btn btn-square btn-primary rounded-circle me-2"
                                href="{{ $ContactUs->twitter_link ?? '' }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if ($ContactUs && $ContactUs->facebook_link)
                            <a class="btn btn-square btn-primary rounded-circle me-2"
                                href="{{ $ContactUs->facebook_link ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($ContactUs && $ContactUs->youtube_link)
                            <a class="btn btn-square btn-primary rounded-circle me-2"
                                href="{{ $ContactUs->youtube_link ?? '' }}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if ($ContactUs && $ContactUs->linkedin_link)
                            <a class="btn btn-square btn-primary rounded-circle me-2"
                                href="{{ $ContactUs->linkedin_link ?? '' }}"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    Copyright © <a class="fw-medium"
                        href="{{ route('home') }}">{{ $ContactUs->name ?? '' }}</a> {{ date('Y') }} , All Right
                    Reserved.
                </div>
                <div class="col-md-6 text-end">
                    <ul class="footer-copyright-links list-unstyled d-flex justify-content-end flex-wrap gap-3 my-2">
                        <li><a href="{{ route('termsconditions') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->
