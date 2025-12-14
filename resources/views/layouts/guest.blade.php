<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Library') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body{font-family:Inter,ui-sans-serif,system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial;} [x-cloak]{display:none!important}</style>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#0f172a',
                            card: '#1e293b',
                            border: '#334155'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="h-full antialiased text-slate-600 dark:text-slate-300 bg-slate-50 dark:bg-dark-bg">
    <header class="bg-white dark:bg-dark-card border-b border-slate-200 dark:border-dark-border">
        <div class="mx-auto max-w-7xl px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="h-10 w-10 flex items-center justify-center rounded-xl bg-indigo-600 text-white font-bold">L</div>
                <span class="font-heading text-lg font-bold">Library<span class="text-indigo-400">Admin</span></span>
            </a>

                <div class="flex items-center gap-6">
                {{-- Nav: show Home/About/Contact for guests, Books/Cart for normal users, Admin dashboard for admins --}}
                <nav class="hidden md:flex items-center gap-4">
                    @if(Auth::guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}" class="text-sm hover:text-indigo-600">Dashboard</a>
                    @elseif(Auth::check())
                        <a href="{{ route('books') }}" class="text-sm hover:text-indigo-600">Books</a>
                        <a href="{{ route('cart.index') }}" class="text-sm hover:text-indigo-600">Cart</a>
                    @else
                        <a href="{{ route('home') }}" class="text-sm hover:text-indigo-600">Home</a>
                        <a href="{{ route('about') }}" class="text-sm hover:text-indigo-600">About</a>
                        <a href="{{ route('contact') }}" class="text-sm hover:text-indigo-600">Contact</a>
                    @endif
                </nav>

                <div class="flex items-center gap-4">
                    {{-- Auth aware links: show admin dashboard when admin logged in, user links when user logged in, otherwise show Login/Register + Admin login link --}}
                    @if(Auth::guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-indigo-600">Admin Dashboard</a>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 ml-3">Logout</button>
                        </form>
                    @elseif(Auth::check())
                        <!-- Mobile-only Books/Cart (left nav is visible on md+ so avoid duplication) -->
                        <div class="flex items-center gap-3 md:hidden">
                            <a href="{{ route('books') }}" class="text-sm hover:text-indigo-600">Books</a>
                            <a href="{{ route('cart.index') }}" class="text-sm hover:text-indigo-600">Cart</a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 ml-3">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm hover:text-indigo-600">Login</a>
                        <a href="{{ route('register') }}" class="text-sm hover:text-indigo-600">Register</a>
                    @endif
                    <button @click="darkMode = !darkMode" class="rounded-full p-2 text-slate-500 hover:bg-slate-100 dark:hover:bg-dark.card"> 
                        <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <svg x-show="darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9 9 0 0020.354 15.354z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 py-12">
        @yield('content')
    </main>

    <footer class="mx-auto max-w-7xl px-6 py-8 text-sm text-slate-500 dark:text-slate-400 border-t border-slate-200 dark:border-dark-border">
        <div class="flex items-center justify-between">
            <div>&copy; {{ date('Y') }} Library. All rights reserved.</div>
            <div>Built with ♥</div>
        </div>
    </footer>
</body>
</html>
