@extends('layouts.master')

@section('title', 'Two-Factor Authentication Setup')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="mb-4">Two-Factor Authentication (2FA) Setup</h4>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Google Authenticator Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Google Authenticator</h5>
                </div>
                <div class="card-body">
                    @if(auth()->user()->google2fa_secret)
                        <p><strong>Google Authenticator is already enabled.</strong></p>
                        <form action="{{ route('2fa.disable') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Disable Google Authenticator</button>
                        </form>
                    @else
                        <p><strong>Google Authenticator is not enabled.</strong></p>
                        <form id="2fa-form" action="{{ route('2fa.enable') }}" method="POST">
                            @csrf
                            <!-- Show the QR code if a secret is generated -->
                            @if($secret)
                                <p>Scan this QR code with your Google Authenticator app:</p>
                                <div>{!! $QR_Image !!}</div>
                                <p>Or enter this code manually: <strong>{{ $secret }}</strong></p>                                
                                <input type="hidden" name="secret" id="secret" value="{{ $secret }}">
                            @endif

                            <div class="form-group mt-4">
                                <label for="otp">Enter the 6-digit code from Google Authenticator:</label>
                                <input type="text" name="otp" id="otp" class="form-control" required autofocus>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Email 2FA Section -->
            <div class="card">
                <div class="card-header">
                    <h5>Email Authentication</h5>
                </div>
                <div class="card-body">
                    @if(auth()->user()->email_2fa_enabled)
                        <p><strong>Email-based 2FA is already enabled.</strong></p>
                        <form action="{{ route('2fa.email.disable') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Disable Email Authentication</button>
                        </form>
                    @else
                        <p><strong>Email-based 2FA is not enabled.</strong></p>
                        <form action="{{ route('2fa.email.enable') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Enable Email Authentication</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const otpInput = document.getElementById('otp');
        const form = document.getElementById('2fa-form');

        otpInput.addEventListener('input', function (e) {
            let value = otpInput.value.replace(/\D/g, ''); // Remove non-digits
            if (value.length > 6) {
                value = value.slice(0, 6); // Only allow 6 digits
            }

            if (value.length > 3) {
                value = value.slice(0, 3) + '-' + value.slice(3); // Format as XXX-XXX
            }

            otpInput.value = value;

            // Auto-submit the form when 6 digits are entered (7 characters with '-')
            if (value.length === 7) {
                form.submit();
            }
        });

        // Prevent non-numeric input
        otpInput.addEventListener('keydown', function (e) {
            const allowedKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Delete'];
            if (e.key.length === 1 && !/\d/.test(e.key) && !allowedKeys.includes(e.key)) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection