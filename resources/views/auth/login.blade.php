@extends('layouts.master-without-nav')
@section('title')
    Login
@endsection
@section('css')
    <!-- Password toggle CSS -->
    <link href="{{ URL::asset('assets/css/password-toggle.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="account-pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <br>
                        <a href="{{ url('/') }}" class="mb-2 d-block auth-logo">
                            <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="80" width="220"
                                 class="logo logo-dark">
                            <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="80" width="220"
                                 class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to {{ config('app.name') }}.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="email"
                                            placeholder="Enter Email address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                                    password?</a>
                                            @endif
                                        </div>
                                        <label class="form-label" for="userpassword">Password</label>
                                        <div class="password-field">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                value="{{ old('password') }}" name="password" id="userpassword" placeholder="Enter password">
                                            <i class="fas fa-eye-slash password-toggle" onclick="togglePassword('userpassword', this)"></i>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log
                                            In</button>
                                    </div>                                  
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="mt-2 text-center">
                        <p>© <script>
                                document.write(new Date().getFullYear())
                            </script> {{config('settings.title')}} By <a href="https://arwaj.com.pk" target="_blank" class="text-reset">Arwaj</a></p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection

@section('script')
    <!-- Password toggle JS -->
    <script src="{{ URL::asset('assets/js/password-toggle.js') }}"></script>
@endsection
