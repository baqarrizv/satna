<?php
    use Detection\MobileDetect as Mobile_Detect;

    $detect = new Mobile_Detect;

    $isMobile = $detect->isMobile(); 
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.title-meta')
    @include('layouts.head')
    
</head>

@section('body')

    <body data-sidebar-size="sm">
    @show

    <!-- Begin page -->
    <div id="layout-wrapper">
        @if($isMobile)
            @include('layouts.mobile-style')
            @include('layouts.topbar-mobile')
            @include('layouts.sidebar-mobile')
        @else        
            @include('layouts.topbar')
            @include('layouts.sidebar')
        @endif    
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @if($isMobile)
                @include('layouts.footer-mobile')
            @else        
                @include('layouts.footer')
            @endif    
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')

    @yield('scripts')
    
</body>

</html>
