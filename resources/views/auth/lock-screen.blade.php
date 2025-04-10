@extends('layouts.master-without-nav')
@section('title')
    Lock Screen
@endsection
@section('content')
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div>
                        <br>
                        <a href="{{ url('/') }}" class="mb-2 d-block auth-logo">
                            <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="80" width="220"
                                 class="logo logo-dark">
                            <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="80" width="220"
                                 class="logo logo-light">
                        </a>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Lock Screen</h5>
                                    <p class="text-muted">Enter your password to unlock the screen!</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <div class="user-thumb text-center mb-4">
                                        <!-- Dynamic user avatar -->
                                        <img src="{{ Auth::user()->image ? Storage::url(Auth::user()->image) : URL::asset('/assets/images/users/avatar-4.jpg') }}"
                                             class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                        <!-- Dynamic username -->
                                        <h5 class="font-size-15 mt-3">{{ Auth::user()->name }}</h5>
                                    </div>
                                    <!-- Unlock form -->
                                    <form action="{{ route('unlock') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <div class="password-field">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                       id="userpassword" name="password" placeholder="Enter password" required>
                                                <i class="fas fa-eye-slash password-toggle" onclick="togglePassword('userpassword', this)"></i>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light"
                                                    type="submit">Unlock</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Not you? <a href="{{ route('logout') }}" class="fw-medium text-primary"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign In</a></p>
                                        </div>
                                    </form>

                                    <!-- Logout form -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> {{config('settings.title')}}  By <a href="https://arwaj.com.pk" target="_blank" class="text-reset">Arwaj</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection

<style>
    .password-field {
        position: relative;
    }
    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6c757d;
    }
</style>

<script>
    function togglePassword(inputId, icon) {
        const passwordInput = document.getElementById(inputId);
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }

    // Check session status every second
    document.addEventListener('DOMContentLoaded', function() {
        // Function to check session status
        function checkSessionStatus() {
            fetch('{{ route("check.session") }}', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.expired) {
                    // Redirect to login page if session expired
                    window.location.href = '{{ route("login") }}';
                }
            })
            .catch(error => {
                console.error('Error checking session status:', error);
            });
        }

        // Check session status immediately and then every second
        checkSessionStatus();
        setInterval(checkSessionStatus, 1000);
    });
</script>
