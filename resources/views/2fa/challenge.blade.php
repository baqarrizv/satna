@extends('layouts.master')

@section('title', 'Two-Factor Authentication Challenge')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="mb-4">Two-Factor Authentication Challenge</h4>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('2fa.verify') }}" method="POST">
                        @csrf

                        @if(auth()->user()->google2fa_secret)
                            <!-- Google Authenticator Code -->
                            <div class="form-group mb-3">
                                <label for="otp">Enter the 6-digit code from Google Authenticator:</label>
                                <input type="text" name="otp" id="otp" class="form-control" required autofocus>
                            </div>
                        @elseif(auth()->user()->email_2fa_enabled)
                            <!-- Email OTP -->
                            <div class="form-group mb-3">
                                <label for="otp">Enter the 6-digit code sent to your email:</label>
                                <input type="text" name="otp" id="otp" class="form-control" required autofocus>
                            </div>
                        @endif
                    </form>
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
                this.form.submit();
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