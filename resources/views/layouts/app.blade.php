<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ !empty($fullHeight) ? 'h-100' : '' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('page_description', __('app.description'))">
    <meta property="og:title" content="@yield('page_title', __('app.title'))" />
    <meta property="og:description" content="@yield('page_description', __('app.description'))">
    <meta property="og:type" content="website" />
    <meta property="og:author" content="http://lab.sng.sk/" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('og_image', asset('img/og_image.jpg'))" />
    <meta property="og:site_name" content="{{ __('app.title') }}" />

    @if(App::environment('production'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('app.gtag_id') }}"></script>
        <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', '{{ config('app.gtag_id') }}'); </script>
    @endif

    <title>
        @hasSection('title')
            @yield('title') | {{__('app.title')}}
        @else
            {{__('app.title')}}
        @endif
    </title>

    @include('components.favicons')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @stack('styles')
</head>

<body class="{{ !empty($fullHeight) ? 'h-100' : '' }}">
    <div id="app" class="{{ !empty($fullHeight) ? 'h-100' : '' }}">
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
