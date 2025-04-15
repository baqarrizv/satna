<!-- Early theme initialization to prevent flashing -->
<script>
(function() {
    // Apply theme as early as possible to prevent flashing
    var theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        document.documentElement.setAttribute('data-topbar', 'dark');
        document.documentElement.setAttribute('data-sidebar', 'dark');
    } else {
        document.documentElement.setAttribute('data-bs-theme', 'light');
        document.documentElement.setAttribute('data-topbar', 'light');
        document.documentElement.setAttribute('data-sidebar', 'light');
    }
})();
</script>

@yield('css')
<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<!-- Dropzone Css-->
<link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
<!-- DataTables -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Custom Theme Compatibility CSS -->
<link href="{{ URL::asset('/assets/css/custom/theme-compatibility.css') }}" rel="stylesheet" type="text/css" />
<!--Select2 CSS -->
<!-- <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" /> -->
<!-- Select2 JS -->
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<!-- Select2 Custom JS -->
<script src="{{ URL::asset('assets/js/select2-init.js') }}"></script>

<style>
.simplebar-mask { 
    top: 15px !important;
}
.navbar-brand-box { 
    padding: 0 !important; 
}
.verti-timeline {
    padding-left: 120px !important;
}
.verti-timeline .event-list .event-date {
    left: -135px !important;
}
</style>