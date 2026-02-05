@extends('front.layout.main')
@section('title', 'User Login')
@section('content')
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-6">Sign In</h1>
            </div>

            <div class="row justify-content-center g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
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
                    <form id="loginForm" action="{{ route('login.submit') }}" method="POST" novalidate>
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Your Email" required value="{{ old('email') }}">
                                    <label for="email">Your Email</label>
                                </div>
                                <span class="text-danger small" id="error-email"></span>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <span class="text-danger small" id="error-password"></span>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div
                                    class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
                                    <button class="btn btn-primary rounded-pill py-2 px-4" type="submit">Sign In</button>
                                    <p class="mb-0 text-sm-end">I have not an account? <a
                                            href="{{ route('register') }}">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            // Clear previous errors
            const fields = ["email", "password"];
            fields.forEach(field => {
                document.getElementById('error-' + field).textContent = "";
            });

            let isValid = true;

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

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
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
@endsection
