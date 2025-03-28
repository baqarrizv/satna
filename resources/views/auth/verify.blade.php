@extends('layouts.master-without-nav')
@section('title')
    Verify Your Email Address
@endsection
@section('content')
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>
                        <a href="{{ url('/') }}" class="mb-2 d-block auth-logo">
                            <img src="{{ config('settings.logo_dark') }}" alt="" height="100"
                                 class="logo logo-dark">
                            <img src="{{ config('settings.logo_light') }}" alt="" height="100"
                                 class="logo logo-light">
                        </a>
                        <div class="card">
                            <div class="card-header">Verify Your Email Address</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        A fresh verification link has been sent to your email address.
                                    </div>
                                @endif

                                Before proceeding, please check your email for a verification link.
                                If you did not receive the email,
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
                                </form>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <p>© <script>
                                    document.write(new Date().getFullYear())

                                </script> {{ config('settings.title') }}. Crafted with <i class="mdi mdi-heart text-danger"></i> by Arwaj</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </div>
    </div>
@endsection
