<!DOCTYPE html>
<html lang="tr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="h-full font-sans antialiased text-gray-900">

<div class="min-h-full flex">
    
    {{-- Sidebar (Desktop) --}}
    <aside class="hidden lg:flex lg:flex-col lg:w-72 lg:fixed lg:inset-y-0 bg-slate-900 text-white transition-all duration-300 z-30">
        {{-- Logo / Brand --}}
        <div class="flex items-center justify-center h-16 bg-slate-950 shadow-md border-b border-slate-800">
            <span class="text-xl font-bold tracking-wider uppercase text-indigo-400">Admin<span class="text-white">Panel</span></span>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto custom-scrollbar">
            
            <p class="px-4 text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">
                Genel
            </p>

            @php
                $menuItems = [
                    ['route' => 'admin.slider.index', 'icon' => 'fa-images', 'label' => 'Slider Yönetimi'],
                    ['route' => 'admin.products3d.index', 'icon' => 'fa-cube', 'label' => '3D Ürünler'],
                    ['route' => 'admin.partner_logos.index', 'icon' => 'fa-handshake', 'label' => 'Referans Logoları'],
                ];
                
                $incomingItems = [
                    ['url' => '/admin/quotes', 'icon' => 'fa-file-invoice-dollar', 'label' => 'Teklif Talepleri'],
                    ['route' => 'admin.supplier_applications.index', 'icon' => 'fa-truck', 'label' => 'Tedarikçi Başvuruları'],
                    ['route' => 'admin.contacts.index', 'icon' => 'fa-envelope', 'label' => 'İletişim Mesajları'],
                ];
            @endphp

            @foreach($menuItems as $item)
                @php
                    $isActive = false;
                    if(isset($item['route']) && Route::has($item['route'])) {
                        $isActive = request()->routeIs(Str::before($item['route'], '.index').'*');
                    } elseif(isset($item['url'])) {
                        $isActive = request()->is(trim($item['url'], '/').'*');
                    }
                @endphp
                
                <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : ($item['url'] ?? '#') }}"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group
                   {{ $isActive ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa {{ $item['icon'] }} w-6 h-6 mr-3 text-center flex items-center justify-center transition-transform group-hover:scale-110"></i>
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="my-6 border-t border-slate-800"></div>

            <p class="px-4 text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">
                Gelen Kutusu
            </p>

            @foreach($incomingItems as $item)
                @php
                    $isActive = false;
                    if(isset($item['route']) && Route::has($item['route'])) {
                        $isActive = request()->routeIs(Str::before($item['route'], '.index').'*');
                    } elseif(isset($item['url'])) {
                        $isActive = request()->is(trim($item['url'], '/').'*');
                    }
                @endphp
                
                <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : ($item['url'] ?? '#') }}"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group
                   {{ $isActive ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/30' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i class="fa {{ $item['icon'] }} w-6 h-6 mr-3 text-center flex items-center justify-center transition-transform group-hover:scale-110"></i>
                    {{ $item['label'] }}
                </a>
            @endforeach

        </nav>

        {{-- User Info (Bottom Sidebar) --}}
      
    </aside>

    {{-- Main Content Wrapper --}}
    <div class="flex-1 flex flex-col lg:pl-72 min-h-screen transition-all duration-300">
        
        {{-- Top Header --}}
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-20 border-b border-gray-200">
            <div class="flex items-center gap-4">
                <button class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fa fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl font-bold text-gray-800 tracking-tight">
                    @yield('page-title', 'Yönetim Paneli')
                </h1>
            </div>

            <div class="flex items-center gap-4">
                <a href="/" target="_blank" class="text-sm font-medium text-gray-500 hover:text-indigo-600 flex items-center gap-2 transition-colors bg-gray-50 px-3 py-2 rounded-lg hover:bg-indigo-50">
                    <i class="fa fa-external-link-alt"></i> 
                    <span class="hidden sm:inline">Siteyi Görüntüle</span>
                </a>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-6 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 flex items-center gap-3 shadow-sm">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fa fa-check text-green-600"></i>
                        </div>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-700 shadow-sm">
                        <div class="flex items-center gap-2 mb-2 font-bold">
                            <i class="fa fa-exclamation-circle"></i>
                            <span>Hata Oluştu</span>
                        </div>
                        <ul class="list-disc list-inside text-sm space-y-1 ml-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        <footer class="bg-white border-t border-gray-200 py-4 px-6 text-center text-sm text-gray-500">
            <div class="flex flex-col sm:flex-row justify-between items-center max-w-7xl mx-auto">
                <span>&copy; {{ date('Y') }} {{ config('app.name') }} Yönetim Paneli</span>
                <span class="mt-2 sm:mt-0 text-xs text-gray-400">v1.0.0</span>
            </div>
        </footer>
    </div>

</div>

@stack('scripts')
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

</body>
</html>
