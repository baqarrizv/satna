<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('/')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('storage/settings/SetnaSmall.jpg') }}" alt="" style="height: 67px; width: 72px;">
            </span>
            <span class="logo-lg">
                <img src="{{ config('settings.logo_dark') ? config('settings.logo_dark') : asset('storage/settings/Setna.jpg') }}" alt="" style="height: 67px; width: 150px;">
            </span>
        </a>

        <a href="{{url('/')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('storage/settings/SetnaSmall.jpg') }}" alt="" style="height: 67px; width: 72px;">
            </span>
            <span class="logo-lg">
                <img src="{{ config('settings.logo_light') ? config('settings.logo_light') : asset('storage/settings/Setna.jpg') }}" alt="" style="height: 67px; width: 150px;">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        @include('layouts.menu-list')
        @can('view-doctor-daily-report')
        <li class="nav-item">
            <a href="{{ route('reports.doctor-daily') }}" class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>
                <p>Doctor Daily Report</p>
            </a>
        </li>
        @endcan
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<div class="modal fade" id="installModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="installModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="installModalLabel">Install Our App</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Get our app for a better experience. Would you like to install it?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Remind me later</button>
                <button type="button" class="btn btn-primary" id="confirmInstallBtn">Install App</button>
            </div>
        </div>
    </div>
</div>