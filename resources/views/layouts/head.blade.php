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