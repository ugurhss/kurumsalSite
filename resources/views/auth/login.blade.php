<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950">
    <div class="relative isolate min-h-screen">
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 left-1/2 h-[26rem] w-[26rem] -translate-x-1/2 rounded-full bg-indigo-500/25 blur-3xl"></div>
            <div class="absolute -bottom-24 left-1/4 h-[22rem] w-[22rem] rounded-full bg-cyan-400/15 blur-3xl"></div>
            <div class="absolute -bottom-24 right-1/4 h-[22rem] w-[22rem] rounded-full bg-fuchsia-500/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto flex min-h-screen w-full max-w-6xl items-center px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid w-full grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12">
                <div class="hidden lg:flex lg:flex-col lg:justify-center">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 ring-1 ring-white/15">
                            <svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 3l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V7l8-4z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                <path d="M9.5 12.5l1.8 1.8 3.7-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="text-white">
                            <div class="text-sm/6 text-white/70">{{ config('app.name', 'Admin Panel') }}</div>
                            <div class="text-lg font-semibold tracking-tight">Yönetim Paneli</div>
                        </div>
                    </div>

                    <h1 class="mt-10 text-4xl font-semibold tracking-tight text-white">
                        Güvenli giriş ile yönetin.
                    </h1>
                    <p class="mt-4 max-w-md text-base/7 text-white/70">
                        Hesabınızla oturum açın, içerik ve ayarları tek panelden yönetin.
                    </p>

                    <!-- <dl class="mt-10 grid max-w-md grid-cols-1 gap-6">
                        <div class="rounded-2xl bg-white/5 p-5 ring-1 ring-white/10">
                            <dt class="flex items-center gap-2 text-sm font-medium text-white">
                                <svg class="h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 3v18m9-9H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                Hızlı erişim
                            </dt>
                            <dd class="mt-2 text-sm/6 text-white/70">Panel araçlarına tek adımda ulaşın.</dd>
                        </div>
                        <div class="rounded-2xl bg-white/5 p-5 ring-1 ring-white/10">
                            <dt class="flex items-center gap-2 text-sm font-medium text-white">
                                <svg class="h-5 w-5 text-indigo-300" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M8 11V8a4 4 0 118 0v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M7 11h10a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2v-6a2 2 0 012-2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                </svg>
                                Güvenlik
                            </dt>
                            <dd class="mt-2 text-sm/6 text-white/70">Oturum ve erişimler güvenle korunur.</dd>
                        </div>
                    </dl> -->
                </div>

                <div class="flex items-center justify-center">
                    <div class="w-full max-w-md">
                        <div class="rounded-3xl bg-white/95 p-8 shadow-2xl shadow-slate-950/30 ring-1 ring-black/5 backdrop-blur sm:p-10">
                            <div class="flex flex-col items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/30">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M12 3l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V7l8-4z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                        <path d="M9.5 12.5l1.8 1.8 3.7-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h2 class="mt-4 text-center text-2xl font-semibold tracking-tight text-slate-900">
                                    Giriş Yap
                                </h2>
                                <p class="mt-1 text-center text-sm text-slate-600">
                                    Devam etmek için bilgilerinizi girin.
                                </p>
                            </div>

                            @if (session('status'))
                                <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status">
                                    <div class="flex gap-3">
                                        <svg class="mt-0.5 h-5 w-5 text-emerald-600" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <div>{{ session('status') }}</div>
                                    </div>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                                    <div class="flex gap-3">
                                        <svg class="mt-0.5 h-5 w-5 text-red-600" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M12 9v4m0 4h.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                            <path d="M10.3 3.8l-7.4 13A2 2 0 004.7 20h14.6a2 2 0 001.8-3.2l-7.4-13a2 2 0 00-3.4 0z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                        </svg>
                                        <div>{{ session('error') }}</div>
                                    </div>
                                </div>
                            @endif

                            <form class="mt-8 space-y-5" action="{{ route('login') }}" method="POST" novalidate>
                                @csrf

                                <div>
                                    <label for="email" class="block text-sm font-medium text-slate-700">E-posta</label>
                                    <div class="relative mt-2">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M4 6h16v12H4z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                                <path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            autocomplete="email"
                                            required
                                            autofocus
                                            value="{{ old('email') }}"
                                            aria-invalid="@error('email') true @else false @enderror"
                                            class="block w-full rounded-2xl border bg-white px-3 py-2.5 pl-10 text-slate-900 shadow-sm outline-none ring-0 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15 @error('email') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-200 @enderror"
                                            placeholder="ornek@domain.com"
                                        >
                                    </div>
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-slate-700">Şifre</label>
                                    <div class="relative mt-2">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path d="M8 11V8a4 4 0 118 0v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M7 11h10a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2v-6a2 2 0 012-2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <input
                                            id="password"
                                            name="password"
                                            type="password"
                                            autocomplete="current-password"
                                            required
                                            aria-invalid="@error('password') true @else false @enderror"
                                            class="block w-full rounded-2xl border bg-white px-3 py-2.5 pl-10 text-slate-900 shadow-sm outline-none ring-0 placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/15 @error('password') border-red-400 focus:border-red-500 focus:ring-red-500/15 @else border-slate-200 @enderror"
                                            placeholder="••••••••"
                                        >
                                    </div>
                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-between gap-4">
                                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                                        <input
                                            type="checkbox"
                                            name="remember"
                                            value="1"
                                            class="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500/20"
                                            @checked(old('remember'))
                                        >
                                        Beni hatırla
                                    </label>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-700 hover:text-indigo-600">
                                            Şifremi unuttum
                                        </a>
                                    @endif
                                </div>

                                <button
                                    type="submit"
                                    class="relative inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/20"
                                >
                                    Giriş Yap
                                    <svg class="h-4 w-4 opacity-90" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12h14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>

                                <p class="pt-2 text-center text-xs text-slate-500">
                                    Bu alan yetkilendirilmiş kullanıcılar içindir.
                                </p>
                            </form>
                        </div>

                        <p class="mt-6 text-center text-xs text-white/60">
                            <!-- © {{ date('Y') }} {{ config('app.name', 'Admin Panel') }}. Tüm hakları saklıdır. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
