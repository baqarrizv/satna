<header id="page-topbar">
    <div class8="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="80">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="100">
                    </span>
                </a>

                <a href="{{url('/')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="80">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('assets/images/settings/Setna.jpg') }}" alt="" height="100">
                    </span>
                </a>
            </div>
        </div>
    </div>
</header>