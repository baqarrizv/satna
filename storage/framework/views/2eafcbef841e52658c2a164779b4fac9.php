<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(config('settings.logo_dark') ? config('settings.logo_dark') : asset('/assets/images/settings/SetnaSmall.jpg')); ?>" alt="" style="height: 67px; width: 72px;">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(config('settings.logo_dark') ? config('settings.logo_dark') : asset('/assets/images/settings/Setna.jpg')); ?>" alt="" style="height: 67px; width: 150px;">
            </span>
        </a>

        <a href="<?php echo e(url('/')); ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(config('settings.logo_light') ? config('settings.logo_light') : asset('/assets/images/settings/SetnaSmall.jpg')); ?>" alt="" style="height: 67px; width: 72px;">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(config('settings.logo_light') ? config('settings.logo_light') : asset('/assets/images/settings/Setna.jpg')); ?>" alt="" style="height: 67px; width: 150px;">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <?php echo $__env->make('layouts.menu-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-doctor-daily-report')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('reports.doctor-daily')); ?>" class="nav-link">
                <i class="nav-icon fas fa-file-medical"></i>
                <p>Doctor Daily Report</p>
            </a>
        </li>
        <?php endif; ?>
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
</div><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>