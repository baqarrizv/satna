<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('storage/settings/SetnaSmall.jpg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('storage/settings/Setna.jpg') }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{url('/')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('storage/settings/SetnaSmall.jpg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('storage/settings/Setna.jpg') }}" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <input type="checkbox" id="mode-setting-btn" switch="dark">
                <label for="mode-setting-btn" data-on-label="Dark " data-off-label="Light "></label>
            </div>       
           
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-bell"></i>
                    <span class="badge bg-danger rounded-pill">{{ $totalUnreadNotifications }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16">Notifications </h5>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('notifications.markAllAsRead') }}" class="small"> Mark read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                    @foreach ($notifications as $notification)
                        <a href="{{ $notification->data['url'] ?? route('notifications.index') }}" class="text-dark notification-item">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="uil-comment-info"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1">{{ $notification->data['title'] }}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">{{ $notification->data['message'] }}</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>                             
                    @endforeach                   
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('notifications.index') }}">
                                <i class="uil-arrow-circle-right me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('/storage/user/avatar-4.jpg') }}" alt="">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{Str::ucfirst(Auth::user()->name)}}</span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">View Profile</span></a>
                    @if (auth()->user() && auth()->user()->hasRole('Admin'))
                        <a class="dropdown-item d-block" href="{{ route('settings.edit') }}"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Settings</span></a>
                    @endif
                    <a class="dropdown-item" href="{{ route('lock') }}">
                        <i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> 
                        <span class="align-middle">Lock screen</span>
                    </a>

                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>