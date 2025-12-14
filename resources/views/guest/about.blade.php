@extends('layouts.guest')

@section('content')
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center min-h-[600px]">
            
            <!-- Left Column: Content -->
            <div class="space-y-8">
                <div>
                    <span class="inline-block rounded-full bg-indigo-50 dark:bg-indigo-900/30 px-3 py-1 text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400 mb-4">
                        Who We Are
                    </span>
                    <h1 class="text-4xl font-heading font-extrabold text-slate-900 dark:text-white sm:text-5xl">
                        About <span class="text-indigo-600 dark:text-indigo-400">LibraryAdmin</span>
                    </h1>
                    <p class="mt-4 text-lg leading-relaxed text-slate-600 dark:text-slate-300">
                        We are redefining how libraries operate. Our system is designed to be simple, modern, and extensible. We bridge the gap between complex inventory management and user-friendly exploration.
                    </p>
                </div>

                <!-- Integrated Mission & Principles -->
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="flex gap-4">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white">Our Mission</h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Providing lightweight, maintainable systems for modern teams.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-teal-100 dark:bg-teal-900/30 text-teal-600 dark:text-teal-400">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 dark:text-white">Design First</h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Clean UI, responsive layouts, and accessibility focus.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA Button (Yellow/Orange as per reference) -->
                <div class="pt-2">
                    <a href="{{ route('admin.login') }}" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-8 py-3 text-sm font-bold text-white shadow-lg shadow-amber-500/30 transition-transform duration-200 hover:-translate-y-1 hover:bg-amber-600">
                        KNOW MORE
                    </a>
                </div>
            </div>

            <!-- Right Column: Abstract Illustration (CSS Composition) -->
            <div class="relative lg:h-[600px] flex items-center justify-center">
                
                <!-- Background Blob -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-indigo-100 to-purple-100 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-full blur-3xl -z-10 opacity-70"></div>

                <!-- Abstract Phone/App Container -->
                <div class="relative w-72 h-[500px] bg-slate-900 rounded-[2.5rem] border-8 border-slate-900 shadow-2xl overflow-hidden z-10 transform rotate-[-3deg] transition-transform hover:rotate-0 duration-500">
                    <!-- Screen Header -->
                    <div class="absolute top-0 w-full h-8 bg-slate-800 z-20 flex justify-center">
                        <div class="w-20 h-4 bg-slate-900 rounded-b-xl"></div>
                    </div>
                    
                    <!-- Screen Content (Mock UI) -->
                    <div class="w-full h-full bg-white dark:bg-slate-800 flex flex-col pt-10 px-4 space-y-4">
                        <!-- Header Mock -->
                        <div class="flex items-center justify-between">
                            <div class="w-8 h-8 rounded-full bg-indigo-100"></div>
                            <div class="w-20 h-3 bg-slate-200 rounded-full"></div>
                        </div>
                        
                        <!-- Hero Card Mock -->
                        <div class="w-full h-32 bg-indigo-500 rounded-2xl shadow-lg relative overflow-hidden">
                            <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-white/20 rounded-full"></div>
                        </div>

                        <!-- List Items Mock -->
                        <div class="space-y-2">
                            <div class="w-full h-12 bg-slate-100 dark:bg-slate-700/50 rounded-xl"></div>
                            <div class="w-full h-12 bg-slate-100 dark:bg-slate-700/50 rounded-xl"></div>
                            <div class="w-full h-12 bg-slate-100 dark:bg-slate-700/50 rounded-xl"></div>
                        </div>
                        
                        <!-- Illustration Mock inside phone -->
                        <div class="mt-auto mb-8 flex justify-center">
                            <div class="w-32 h-32 bg-purple-100 rounded-full opacity-50"></div>
                        </div>
                    </div>
                </div>

                <!-- Floating Elements (Chat bubbles look) -->
                
                <!-- Bubble 1: Stats -->
                <div class="absolute top-20 right-10 lg:right-20 bg-white dark:bg-dark-card p-3 rounded-2xl shadow-xl border border-slate-100 dark:border-dark-border z-20 animate-bounce" style="animation-duration: 3s;">
                    <div class="flex items-center gap-3">
                        <div class="bg-green-100 p-2 rounded-lg text-green-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-500">Books</div>
                            <div class="text-sm font-bold text-slate-900 dark:text-white">Available</div>
                        </div>
                    </div>
                </div>

                <!-- Bubble 2: Contact -->
                <div class="absolute bottom-32 left-0 lg:left-10 bg-white dark:bg-dark-card p-3 rounded-2xl shadow-xl border border-slate-100 dark:border-dark-border z-20 animate-bounce" style="animation-duration: 4s;">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-slate-500">Support</div>
                            <div class="text-sm font-bold text-slate-900 dark:text-white">Online 24/7</div>
                        </div>
                    </div>
                </div>

                <!-- Decorative Leaf/Shape -->
                <div class="absolute bottom-10 right-10 -z-10">
                    <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-emerald-400 dark:text-emerald-600 opacity-60">
                        <path d="M50 0C50 0 20 20 20 50C20 80 50 100 50 100C50 100 80 80 80 50C80 20 50 0 50 0Z" fill="currentColor"/>
                    </svg>
                </div>

            </div>
        </div>
    </div>
@endsection