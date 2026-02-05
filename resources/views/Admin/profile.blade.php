@extends('Admin.layout.adminlayout')
@section('title', 'Qubeta || Admin Profile')
@section('content')
<style>
    .input-group-text {
        height: 38px;
    }
    .error{
        color:red;
    }
</style>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-6">
                <div class="bg-light rounded p-4">
                    <h4 class="text-center mb-3">Profile Detail</h4>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif                   
                    <form action="{{ route('admin.update.profile') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$user->email}}">                        
                            <input type="hidden" name="id" value="{{$user->id}}">                        
                            @error('email')
                                <span class="error">{{ $message }}</span>        
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">   
                            @error('name')
                                <span class="error">{{ $message }}</span>        
                            @enderror                     
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">             
                <div class="bg-light rounded p-4">
                    <h4 class="text-center mb-3">Changed Password</h4>
                    @if(session('successpassword'))
                        <div class="alert alert-success">{{ session('successpassword') }}</div>
                    @endif 
                    <form action="{{ route('admin.update.password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <div class="input-group">
                                <input type="password" name="current_password" class="form-control" id="current_password">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye toggle-password" data-target="#current_password"></i>
                                    </span>
                                </div>
                            </div>
                            @error('current_password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye toggle-password" data-target="#password"></i>
                                    </span>
                                </div>
                            </div>
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye toggle-password" data-target="#password_confirmation"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript to toggle password visibility -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordIcons = document.querySelectorAll('.toggle-password');

        togglePasswordIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                const target = document.querySelector(this.dataset.target);

                if (target.type === 'password') {
                    target.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    target.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    });
</script>
@endsection