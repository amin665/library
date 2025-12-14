<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Library Admin') }}</title>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS & Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        // Custom Red requested: rgb(144, 0, 92)
                        red: {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            400: '#e84a98', 
                            500: '#db2777',
                            600: 'rgb(144, 0, 92)', // Base Red
                            700: '#830053',
                            800: '#5e003b',
                            900: '#4a002e',
                        },
                        // Dark mode backgrounds
                        dark: {
                            bg: '#0f172a',      // Slate 900
                            card: '#1e293b',    // Slate 800
                            border: '#334155',  // Slate 700
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
    
    <style>
        [x-cloak] { display: none !important; }
        /* Smooth transitions for dark mode */
        body, div, nav, header, aside, main { transition: background-color 0.3s ease, color 0.3s ease; }
    </style>
</head>
<body class="h-full antialiased text-slate-600 dark:text-slate-300 bg-slate-50 dark:bg-dark-bg">
    
    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">
        
        <!-- Mobile Sidebar Backdrop -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/80 backdrop-blur-sm md:hidden" @click="sidebarOpen = false"></div>

        <!-- Sidebar (Dark Mode Style) -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-72 transform bg-[#0f172a] text-white shadow-xl transition-transform duration-300 ease-in-out md:static md:translate-x-0 border-r border-slate-800">
            
            <!-- Logo Area -->
            <div class="flex h-20 items-center justify-center border-b border-slate-800 px-8 bg-[#0f172a]">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-900/50">
                        <!-- Modern Book Logo -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <span class="font-heading text-xl font-bold tracking-tight text-white">Library<span class="text-indigo-400">Admin</span></span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-8 px-4 space-y-2">
                @php
                    $navClasses = 'group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200';
                    $activeClasses = 'bg-indigo-600 text-white shadow-md shadow-indigo-900/20';
                    $inactiveClasses = 'text-slate-400 hover:bg-slate-800 hover:text-white';
                @endphp

                <!-- Dashboard (Icon: Squares 2x2 - represents a dashboard grid) -->
                <a href="{{ route('admin.dashboard') }}" class="{{ $navClasses }} {{ request()->routeIs('admin.dashboard') ? $activeClasses : $inactiveClasses }}">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.dashboard') ? 'text-indigo-200' : 'text-slate-500 group-hover:text-white' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    Dashboard
                </a>

                <!-- Classifications (Icon: Rectangle Stack - represents grouping/layers) -->
                <a href="{{ route('admin.classifications.index') }}" class="{{ $navClasses }} {{ request()->routeIs('admin.classifications.*') ? $activeClasses : $inactiveClasses }}">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.classifications.*') ? 'text-indigo-200' : 'text-slate-500 group-hover:text-white' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                    </svg>
                    Classifications
                </a>

                <!-- Types (Icon: Cube - represents distinct objects/types) -->
                <a href="{{ route('admin.types.index') }}" class="{{ $navClasses }} {{ request()->routeIs('admin.types.*') ? $activeClasses : $inactiveClasses }}">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.types.*') ? 'text-indigo-200' : 'text-slate-500 group-hover:text-white' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    Types
                </a>

                <!-- Books (Icon: Book Open - classic and clear) -->
                <a href="{{ route('admin.books.index') }}" class="{{ $navClasses }} {{ request()->routeIs('admin.books.*') ? $activeClasses : $inactiveClasses }}">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.books.*') ? 'text-indigo-200' : 'text-slate-500 group-hover:text-white' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                    </svg>
                    Books
                </a>

                <!-- Carts (Icon: Shopping Cart - modern outline) -->
                <a href="{{ route('admin.carts.index') }}" class="{{ $navClasses }} {{ request()->routeIs('admin.carts.*') ? $activeClasses : $inactiveClasses }}">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.carts.*') ? 'text-indigo-200' : 'text-slate-500 group-hover:text-white' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    Carts
                </a>

                <!-- Categories (Icon: Tag - simple and recognizable) -->
                <a href="{{ route('admin.categories.index') }}" class="{{ $navClasses }} {{ request()->routeIs('admin.categories.*') ? $activeClasses : $inactiveClasses }}">
                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.categories.*') ? 'text-indigo-200' : 'text-slate-500 group-hover:text-white' }} transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.593l4.482-1.634c.826-.279 1.144-1.32.559-1.933l-9.049-9.537A2.25 2.25 0 009.568 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                    </svg>
                    Categories
                </a>
            </nav>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex flex-1 flex-col overflow-hidden">
            
            <!-- Top Header -->
            <header class="flex h-20 flex-shrink-0 items-center justify-between bg-white dark:bg-dark-card px-6 shadow-md z-10 border-b border-slate-200 dark:border-dark-border">
                
                <!-- Mobile Menu Button & Title -->
                <div class="flex items-center gap-4">
                    <button type="button" @click="sidebarOpen = true" class="text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white focus:outline-none md:hidden">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="font-heading text-2xl font-bold leading-7 text-slate-800 dark:text-white hidden md:block">
                        @yield('header', 'Dashboard')
                    </h1>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Dark/Light Mode Toggle -->
                    <button @click="darkMode = !darkMode" class="rounded-full p-2 text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 hover:text-slate-600 dark:text-slate-400 dark:hover:text-white transition-colors">
                        <!-- Sun Icon (Show in Dark Mode) -->
                        <svg x-show="darkMode" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <!-- Moon Icon (Show in Light Mode) -->
                        <svg x-show="!darkMode" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>

                    <!-- Notifications -->
                    <button type="button" class="relative rounded-full p-2 text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 hover:text-slate-600 transition-colors">
                        <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-red-600"></span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    
                    <!-- Profile Dropdown -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <button @click="open = !open" type="button" class="flex items-center gap-3 rounded-full text-sm focus:outline-none">
                            <div class="h-10 w-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-sm">A</div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-medium text-slate-700 dark:text-white">Admin User</p>
                                <p class="text-xs text-slate-400">View Profile</p>
                            </div>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 origin-top-right rounded-xl bg-white dark:bg-dark-card py-1 shadow-lg ring-1 ring-black ring-opacity-5 dark:ring-white/10 z-50">
                            <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700">Settings</a>
                            <form method="POST" action="{{ route('admin.logout') }}" class="px-4 py-2">
                                @csrf
                                <button type="submit" class="w-full text-left text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-slate-50 dark:bg-dark-bg p-4 sm:p-8">
                <div class="mx-auto w-full max-w-7xl">
                    @if(session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="mb-6 flex items-center justify-between rounded-xl bg-green-500 p-4 text-white shadow-lg shadow-green-200 dark:shadow-none">
                            <div class="flex items-center">
                                <span class="ml-3 font-medium">{{ session('success') }}</span>
                            </div>
                            <button @click="show = false" class="text-green-100 hover:text-white"><svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- SweetAlert Global Script -->
    <script>
        function deleteConfirm(event) {
            event.preventDefault();
            const form = event.target;
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(144, 0, 92)', // Custom Red
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
</body>
</html>