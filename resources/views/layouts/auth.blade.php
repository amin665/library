<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Library Admin') }} - Login</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#0f172a',
                            card: '#0f172a',
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
    <style>body{font-family:Inter,ui-sans-serif,system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial;} [x-cloak]{display:none!important}</style>
</head>
<body class="min-h-screen bg-slate-50 dark:bg-dark-bg text-slate-800 dark:text-slate-200 flex items-center justify-center">
    <div class="w-full max-w-7xl px-6 py-12">
        <div class="mx-auto grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <!-- Left: Image / Visual (md: span 7) -->
            <div class="md:col-span-7">
                <div class="rounded-2xl overflow-hidden shadow-2xl bg-white dark:bg-dark-card">
                    <!-- Local image may be missing or offline; use a resilient gradient/illustration fallback so hero always displays -->
                    <div class="w-full h-[560px] bg-gradient-to-br from-indigo-700 via-purple-700 to-slate-900 flex items-end">
                        <div class="w-full p-6 md:p-8 text-white">
                            <h2 class="text-2xl font-heading font-bold">Library</h2>
                            <p class="mt-2 text-slate-200/80">Manage collections and users in a single beautiful interface.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Form (md: span 5) -->
            <div class="md:col-span-5 flex items-center">
                <div class="w-full">
                    <div class="rounded-2xl bg-white dark:bg-[#0b1220] shadow-xl p-8">
                        {{-- content slot --}}
                        @yield('content')
                    </div>
                    <p class="mt-4 text-xs text-slate-500 dark:text-slate-400 text-center">By signing in you agree to our terms and privacy.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
