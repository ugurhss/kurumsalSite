<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body class="bg-light">

<div class="d-flex">

    {{-- SIDEBAR --}}
    <aside class="bg-dark text-white" style="width: 250px;">
        <div class="p-3 fw-bold border-bottom">
            Admin Panel
        </div>

        <nav class="list-group list-group-flush">

            {{-- Dashboard (fallback: slider.index) --}}
            <a href="{{ route('admin.slider.index') }}"
               class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fa fa-home me-2"></i> Dashboard
            </a>

            <a href="{{ route('admin.slider.index') }}"
               class="list-group-item list-group-item-action bg-dark text-white">
                <i class="fa fa-images me-2"></i> Slider
            </a>

        </nav>
    </aside>

    {{-- CONTENT --}}
    <div class="flex-fill">

        {{-- TOPBAR --}}
        <nav class="navbar navbar-light bg-white border-bottom px-4">
            <span class="navbar-text fw-semibold">
                @yield('page-title', 'Yönetim Paneli')
            </span>

            <div class="ms-auto">
                {{ auth()->user()->name ?? 'Admin' }}
            </div>
        </nav>

        {{-- PAGE CONTENT --}}
        <main class="container-fluid p-4">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
<script type="module"
        src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js">
</script>
</body>
</html>
