@extends('front.layout.main')
@section('title', 'User Registration')
@section('content')
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Sign Up</h1>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row justify-content-center g-5">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <form id="registrationForm" action="{{ route('register.save') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Your Name" value="{{ old('name') }}">
                                    <label for="name">Your Name</label>
                                </div>
                                <span class="text-danger small" id="error-name"></span>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Your Phone Number" value="{{ old('phone') }}">
                                    <label for="phone">Your Phone Number</label>
                                </div>
                                <span class="text-danger small" id="error-phone"></span>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Your Email" value="{{ old('email') }}">
                                    <label for="email">Your Email</label>
                                </div>
                                <span class="text-danger small" id="error-email"></span>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Your Password" value="{{ old('password') }}">
                                    <label for="password">Password</label>
                                </div>
                                <span class="text-danger small" id="error-password"></span>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="organization_name" name="organization_name"
                                        placeholder="Your Organization Name" value="{{ old('organization_name') }}">
                                    <label for="organization_name">Organization Name</label>
                                </div>
                                <span class="text-danger small" id="error-organization_name"></span>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="url" class="form-control" id="website" name="website"
                                        placeholder="Your Website" value="{{ old('website') }}">
                                    <label for="website">Your Website</label>
                                </div>
                                <span class="text-danger small" id="error-website"></span>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="partner" id="partner" class="form-select">
                                        <option value="">Partner Us</option>
                                        <option value="farmer">farmer</option>
                                        <option value="trader">trader</option>
                                        <option value="manufacturers">manufacturers</option>
                                        <option value="supplier">supplier</option>
                                        <option value="consumers">consumers</option>
                                        <option value="transporter">transporter</option>
                                        <option value="wholesaler">wholesaler</option>
                                        <option value="retailer">retailer</option>
                                    </select>
                                </div>
                                <span class="text-danger small" id="error-partner"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="service" name="service"
                                        placeholder="Your Service" value="{{ old('service') }}">
                                    <label for="service">Service Type</label>
                                </div>
                                <span class="text-danger small" id="error-service"></span>
                            </div>

                            <!-- State -->
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="state" name="state"
                                        placeholder="State" value="{{ old('state') }}">
                                    <label for="state">State</label>
                                </div>
                                <span class="text-danger small" id="error-state"></span>
                            </div>

                            <!-- City -->
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="City" value="{{ old('city') }}">
                                    <label for="city">City</label>
                                </div>
                                <span class="text-danger small" id="error-city"></span>
                            </div>

                            <!-- Zip -->
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="zip" name="zip"
                                        placeholder="Zip Code" value="{{ old('zip') }}">
                                    <label for="zip">Zip Code</label>
                                </div>
                                <span class="text-danger small" id="error-zip"></span>
                            </div>

                            <!-- Address -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Your Address" id="address" name="address" style="height: 60px">{{ old('address') }}</textarea>
                                    <label for="address">Address</label>
                                </div>
                                <span class="text-danger small" id="error-address"></span>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <div
                                    class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
                                    <button class="btn btn-primary rounded-pill py-2 px-4" type="submit">Submit</button>
                                    <p class="mb-0 text-sm-end">
                                        Already have an account? <a href="{{ route('login') }}">Sign in</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(e) {
            // Clear previous errors
            const fields = ["name", "phone", "email", "password", "state", "city", "zip","organization_name","partner"];
            fields.forEach(field => {
                document.getElementById('error-' + field).textContent = "";
            });

            let isValid = true;

            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const state = document.getElementById('state').value.trim();
            const city = document.getElementById('city').value.trim();
            const zip = document.getElementById('zip').value.trim();
            const organization_name = document.getElementById('organization_name').value.trim();
            const partner = document.getElementById('partner').value.trim();

            if (!name) {
                document.getElementById('error-name').textContent = "Name is required.";
                isValid = false;
            }

            if (!phone) {
                document.getElementById('error-phone').textContent = "Phone number is required.";
                isValid = false;
            } else if (!/^\d{10,15}$/.test(phone)) {
                document.getElementById('error-phone').textContent = "Phone must be 10 digits.";
                isValid = false;
            }

            if (!email) {
                document.getElementById('error-email').textContent = "Email is required.";
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById('error-email').textContent = "Invalid email format.";
                isValid = false;
            }

            if (!password) {
                document.getElementById('error-password').textContent = "Password is required.";
                isValid = false;
            } else if (password.length < 6) {
                document.getElementById('error-password').textContent = "Password must be at least 6 characters.";
                isValid = false;
            }

            if (!state) {
                document.getElementById('error-state').textContent = "State is required.";
                isValid = false;
            }

            if (!city) {
                document.getElementById('error-city').textContent = "City is required.";
                isValid = false;
            }

            if (!zip) {
                document.getElementById('error-zip').textContent = "Zip code is required.";
                isValid = false;
            }
            if (!organization_name) {
                document.getElementById('error-organization_name').textContent = "Organization Name is required.";
                isValid = false;
            }
            if (!partner) {
                document.getElementById('error-partner').textContent = "Partner Us is required.";
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
