<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $seos = App\Models\Seo::first();
    @endphp
    <title>{{ $seos->meta_title }} {{ '|' }}@yield('title')</title>
    <meta name="author" content="{{ $seos->meta_author }}">
    <meta name="description" content="{{ $seos->meta_description }}">
    <meta name="keywords" content="{{ $seos->meta_keyword }}">
    <meta name="google-site-verification" content="{{ $seos->google_verification }}">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    @include('frontend.layouts.inc.style')
</head>

<body>

    @include('frontend.layouts.inc.header')


    @yield('content')

    @include('frontend.layouts.inc.footer')
    @include('frontend.layouts.inc.scroll-top')
    @include('frontend.layouts.inc.script')

</body>

</html>
