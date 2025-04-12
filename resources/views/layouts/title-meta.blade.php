<meta charset="utf-8" />
<title>@yield('title') |  {{ config('settings.title') }} </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="{{ config('settings.description') }}" name="description" />
<meta content="Arwaj" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF token meta tag -->

<link rel="manifest" href="{{ asset('manifest.json') }}">
<meta name="mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-status-bar-style" content="black">
<meta name="mobile-web-app-title" content="{{ config('settings.title') }}">

<!-- App favicon -->
<link rel="shortcut icon" href="{{ config('settings.fav_icon') ? config('settings.fav_icon') : asset('/assets/images/settings/SetnaSmall.jpg') }}">