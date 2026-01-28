<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0" name="viewport">

    <title>@yield('title', 'Göksu Kağıt ®')</title>
    <meta name="description"
        content="@yield('meta_description', 'Göksu Kağıt, Avrupa\\'nın en büyük ıslak mendil üreticisidir.')" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/skin-architecture.css') }}" />
    @stack('styles')
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
