<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/skin-architecture.css') }}" />    
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