<!-- Left Menu Start -->
<div id="sidebar-menu">
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="<?php echo e(url('/')); ?>">
                <i class="uil-home-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-title">Setup</li>

        <li>
            <a href="<?php echo e(route('departments.index')); ?>">
                <i class="uil-building"></i>
                <span>Departments</span>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('services.index')); ?>">
                <i class="uil-constructor"></i>
                <span>Services</span>
            </a>
        </li>
        
        <li class="menu-title">Profiling</li>

        <li>
            <a href="<?php echo e(route('doctors.index')); ?>">
                <i class="uil-user-md"></i>
                <span>Doctors</span>
            </a>
        </li>

        <li class="menu-title">Patient Management</li>

        <li>
            <a href="<?php echo e(route('patients.index')); ?>">
                <i class="uil-file-medical-alt"></i>
                <span>Patients</span>
            </a>
        </li>

        <li class="menu-title">Payment Management</li>

        <li>
            <a href="<?php echo e(route('payments.addCharges')); ?>">
                <i class="uil-plus"></i>
                <span>Add Changes</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('payments.index')); ?>">
                <i class="uil-dollar-sign"></i>
                <span>Payments</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('payments.dailyClosing')); ?>">
                <i class="uil-key-skeleton"></i>
                <span>Daily Closing</span>
            </a>
        </li>
        
        <li class="menu-title">Reports</li>

        <li>
            <a href="<?php echo e(route('reports.dailyCollection')); ?>">
                <i class="uil-plus"></i>
                <span>Daily Collection</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('reports.doctorDaily')); ?>">
                <i class="uil-plus"></i>
                <span>Doctor Daily Collection</span>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('reports.departmentDaily')); ?>">
                <i class="uil-plus"></i>
                <span>Department Daily Collection</span>
            </a>
        </li>

        <li class="menu-title">Others</li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="uil-users-alt"></i>
                <span>User Management</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="<?php echo e(route('roles.index')); ?>">Roles & Permissions</a></li>
                <li><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
            </ul>
        </li>
        
        <li>
            <a href="<?php echo e(route('subscriptions.show')); ?>">
                <i class="uil-bell-slash"></i>
                <span>Notification Subscriptions</span>
            </a>
        </li>

        <li>
            <a href="<?php echo e(route('activity.logs.index')); ?>">
                <i class="uil-blogger-alt"></i>
                <span>Activity Logs</span>
            </a>
        </li>
        
        <li>
            <a href="<?php echo e(route('2fa.setup')); ?>">
                <i class="uil-lock-access"></i>
                <span>2FA</span>
            </a>
        </li>

    </ul>
</div><?php /**PATH /home/user/htdocs/srv617279.hstgr.cloud/resources/views/layouts/menu-list.blade.php ENDPATH**/ ?>