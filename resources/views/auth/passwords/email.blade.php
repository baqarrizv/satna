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
                            <img src="{{ config('settings.logo_dark') }}" alt="" height="80" width="220"
                                 class="logo logo-dark">
                            <img src="{{ config('settings.logo_light') }}" alt="" height="80" width="220"
                                 class="logo logo-light">
                        </a>
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Reset Password</h5>
                                    <p class="text-muted">Reset Password with {{ config('settings.title') }}.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    @if (session('status'))
                                        <div class="alert alert-success mb-4" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" id="email"
                                                placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light"
                                                type="submit">Reset</button>
                                        </div>


                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Remember It ? <a href="{{ url('login') }}"
                                                    class="fw-medium text-primary"> Sign in </a></p>
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
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
