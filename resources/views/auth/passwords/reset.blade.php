@extends('layouts.master-without-nav')
@section('title')
    Reset Password
@endsection
@section('content')
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>
                        <br>
                        <a href="{{ url('/') }}" class="mb-2 d-block auth-logo">
                            <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="100"
                                 class="logo logo-dark">
                            <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="100"
                                 class="logo logo-light">
                        </a>
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Reset Password</h5>
                                    <p class="text-muted">Reset Password with {{ config('settings.title') }}.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <div class="mb-3">
                                            <label for="email">E-Mail Address</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password-confirm">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light"
                                                type="submit">Reset Password</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <p>© <script>
                                    document.write(new Date().getFullYear())

                                </script> {{config('settings.title')}}  By <a href="https://arwaj.com.pk" target="_blank" class="text-reset">Arwaj</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>
    @endsection
