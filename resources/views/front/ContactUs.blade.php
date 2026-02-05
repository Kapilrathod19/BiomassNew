@extends('front.layout.main')
@section('title', 'Contact Us')
@section('content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">If You Have Any Query, Please Contact Us</h1>
            </div>
            <div class="row justify-content-center g-5 mb-5">
                @if ($ContactUs->email)
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="btn-square mx-auto mb-3">
                            <i class="fa fa-envelope fa-2x text-white"></i>
                        </div>
                        <p class="mb-2">{{ $ContactUs->email ?? '' }}</p>
                    </div>
                @endif
                @if ($ContactUs->mobile)
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="btn-square mx-auto mb-3">
                            <i class="fa fa-phone fa-2x text-white"></i>
                        </div>
                        <p class="mb-2">{{ $ContactUs->mobile }}</p>
                    </div>
                @endif
                @if ($ContactUs->address)
                    <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="btn-square mx-auto mb-3">
                            <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                        </div>
                        <p class="mb-2">{{ $ContactUs->address }}</p>
                    </div>
                @endif
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-result"></div>

                    <p class="fs-5 fw-medium fst-italic text-primary">Inquire Now</p>
                    <h3 class="mb-4">Let us know what you're interested in</h3>
                    <form class="contact-panel-form" method="post" action="{{ route('save_contact') }}">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your Name" required value="{{ old('name') }}">
                                    <label for="name">Your Name</label>
                                </div>
                                @error('name')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Your Email" required value="{{ old('email') }}">
                                    <label for="email">Your Email</label>
                                </div>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="contact-Phone" name="phone"
                                        placeholder="Your Phone Number" required value="{{ old('phone') }}">
                                    <label for="contact-Phone">Your Phone Number</label>
                                </div>
                                @error('phone')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required value="{{ old('subject') }}">
                                    <label for="subject">Subject</label>
                                </div>
                                @error('subject')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="role" class="form-select" id="role" required>
                                        <option value="">Select Your Role</option>
                                        <option value="Farmer" {{ old('role') == 'Farmer' ? 'selected' : '' }}>Farmer
                                        </option>
                                        <option value="Trader" {{ old('role') == 'Trader' ? 'selected' : '' }}>Trader
                                        </option>
                                        <option value="Manufacturer" {{ old('role') == 'Manufacturer' ? 'selected' : '' }}>
                                            Manufacturer</option>
                                        <option value="Consumer" {{ old('role') == 'Consumer' ? 'selected' : '' }}>Consumer
                                        </option>
                                        <option value="Transporter" {{ old('role') == 'Transporter' ? 'selected' : '' }}>
                                            Transporter</option>
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="interest" class="form-select" id="interest" required>
                                        <option value="">Select Your Interest</option>
                                        <option value="Raw Material"
                                            {{ old('interest') == 'Raw Material' ? 'selected' : '' }}>Raw Material</option>
                                        <option value="Biomass Briquettes"
                                            {{ old('interest') == 'Biomass Briquettes' ? 'selected' : '' }}>Biomass
                                            Briquettes</option>
                                        <option value="Biomass Pellets"
                                            {{ old('interest') == 'Biomass Pellets' ? 'selected' : '' }}>Biomass Pellets
                                        </option>
                                        <option value="Logistics Services"
                                            {{ old('interest') == 'Logistics Services' ? 'selected' : '' }}>Logistics
                                            Services</option>
                                    </select>
                                </div>
                                @error('interest')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="message" id="message"
                                        style="height: 120px" required>{{ old('message') }}</textarea>
                                    <label for="message">Message</label>
                                </div>
                                @error('message')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    @if ($ContactUs->map_link)
                        <div class="h-100">
                            {!! $ContactUs->map_link !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
