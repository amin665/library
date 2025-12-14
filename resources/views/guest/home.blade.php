@extends('layouts.guest')

@section('content')
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
        <section class="grid gap-12 lg:grid-cols-2 items-center relative">
            
            <!-- Abstract Background Blob (Adds the modern depth) -->
            <div class="absolute top-0 left-0 -translate-x-1/4 -translate-y-1/4 w-[80%] h-[80%] bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-full blur-3xl -z-10 opacity-70"></div>

            <!-- Hero Text -->
            <div class="max-w-2xl relative z-10">
                <span class="inline-block rounded-full bg-indigo-50 dark:bg-indigo-900/30 px-3 py-1 text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400 mb-6">
                    Library Management System
                </span>
                <h1 class="text-5xl font-heading font-extrabold text-slate-900 dark:text-white mb-6 leading-tight">
                    Welcome to <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Library Admin</span>
                </h1>
                <p class="text-lg text-slate-600 dark:text-slate-300 mb-8 leading-relaxed">
                    A powerful, minimalist tool designed for modern library staff. Manage collections, track inventory, and gain insights—all in one beautiful interface.
                </p>

                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-8 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-500/30 hover:bg-indigo-700 hover:-translate-y-0.5 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200">
                        Log in
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('about') }}" class="group inline-flex items-center gap-2 px-6 py-3.5 text-sm font-bold text-slate-700 dark:text-slate-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                        Learn more
                        <span aria-hidden="true" class="block transition-transform group-hover:translate-x-1">→</span>
                    </a>
                </div>
            </div>

            <!-- Hero Image / Feature Grid -->
            <div class="space-y-6 relative z-10">
                
                <!-- Main Image -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl ring-1 ring-slate-900/10 dark:ring-white/10 transform rotate-2 hover:rotate-0 transition-transform duration-500">
                    @php $localJpg = public_path('images/library-hero.jpg'); @endphp
                    @if(file_exists($localJpg))
                        <img src="{{ asset('images/library-hero.jpg') }}" alt="Library Interface" class="w-full h-64 object-cover" />
                    @else
                        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=1200&q=80" alt="Library Books" class="w-full h-64 object-cover" />
                    @endif
                    
                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <p class="text-sm font-medium opacity-90">Curated Collections</p>
                    </div>
                </div>

                <!-- Feature Mini-Cards -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Card 1 -->
                    <div class="group rounded-xl bg-white dark:bg-dark-card p-4 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border transition-all hover:shadow-md hover:-translate-y-1">
                        <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white text-sm">Smart Inventory</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Real-time stock tracking.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="group rounded-xl bg-white dark:bg-dark-card p-4 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border transition-all hover:shadow-md hover:-translate-y-1">
                        <div class="mb-3 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>
                        </div>
                        <h3 class="font-bold text-slate-900 dark:text-white text-sm">Visual Reports</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Data-driven insights.</p>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection