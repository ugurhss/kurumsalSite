<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gren Kurumsal')</title>
    <meta name="description" content="@yield('meta_description', 'Gren Kurumsal Web Sitesi')">
    <meta name="keywords" content="@yield('meta_keywords', 'gren, kurumsal, ürünler')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Gren Kurumsal')">
    <meta property="og:description" content="@yield('meta_description', 'Gren Kurumsal Web Sitesi')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Gren Kurumsal')">
    <meta property="twitter:description" content="@yield('meta_description', 'Gren Kurumsal Web Sitesi')">
    <meta property="twitter:image" content="{{ asset('images/logo.png') }}">

   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}" />
</head>
<body class="@yield('body_class', 'shop home-page')">
    @include('partials.side-nav')

    <div class="wrapper reveal-side-navigation">
        <div class="wrapper-inner">
            @include('partials.header')

            <div class="content clearfix">
                @yield('content')
            </div>
        </div>
    </div>

    @include('partials.scripts')
</body>

</html>
