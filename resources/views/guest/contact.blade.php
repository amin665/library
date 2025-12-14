@extends('layouts.guest')

@section('content')
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center min-h-[600px]">
            
            <!-- Left Column: Text & Contact Info -->
            <div class="space-y-8 relative z-10">
                <div>
                    <span class="inline-block rounded-full bg-indigo-50 dark:bg-indigo-900/30 px-3 py-1 text-xs font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400 mb-4">
                        Support
                    </span>
                    <h1 class="text-4xl font-heading font-extrabold text-slate-900 dark:text-white sm:text-5xl">
                        Contact <span class="text-indigo-600 dark:text-indigo-400">Us</span>
                    </h1>
                    <p class="mt-4 text-lg leading-relaxed text-slate-600 dark:text-slate-300">
                        Have questions about the library system, need technical assistance, or just want to say hello? Our team is ready to help you.
                    </p>
                </div>

                <!-- Contact Details Cards -->
                <div class="space-y-4">
                    <!-- Phone Card -->
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white dark:bg-dark-card border border-slate-100 dark:border-dark-border shadow-sm transition-transform hover:-translate-y-1">
                        <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Call Support</div>
                            <div class="text-base font-bold text-slate-900 dark:text-white">+1 (555) 123-4567</div>
                        </div>
                    </div>

                    <!-- Email Card -->
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white dark:bg-dark-card border border-slate-100 dark:border-dark-border shadow-sm transition-transform hover:-translate-y-1">
                        <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Email Us</div>
                            <div class="text-base font-bold text-slate-900 dark:text-white">support@libraryadmin.com</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: The Form (Styled as the Hero Element) -->
            <div class="relative flex items-center justify-center">
                
                <!-- Abstract Background Blob -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] bg-gradient-to-bl from-indigo-100 to-amber-100 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-full blur-3xl -z-10 opacity-70"></div>

                <!-- Floating Decor Element (Top Right) -->
                <div class="absolute -top-6 -right-6 h-16 w-16 bg-amber-400 rounded-full blur-xl opacity-20 animate-pulse"></div>

                <div class="w-full bg-white dark:bg-dark-card rounded-3xl shadow-2xl ring-1 ring-slate-200 dark:ring-dark-border p-8 relative z-10">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                        Send a Message
                        <span class="flex h-2 w-2 rounded-full bg-green-500"></span>
                    </h3>

                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Name</label>
                                <input type="text" name="name" placeholder="John Doe" required 
                                    class="block w-full rounded-xl border-0 py-3 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm ring-1 ring-inset ring-slate-200 dark:ring-slate-700 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                            </div>
                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                                <input type="email" name="email" placeholder="john@example.com" required 
                                    class="block w-full rounded-xl border-0 py-3 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm ring-1 ring-inset ring-slate-200 dark:ring-slate-700 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Message</label>
                            <textarea name="message" rows="4" placeholder="How can we help you?" required 
                                class="block w-full rounded-xl border-0 py-3 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white shadow-sm ring-1 ring-inset ring-slate-200 dark:ring-slate-700 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"></textarea>
                        </div>

                        <!-- Action Button (Matching the Reference Orange/Amber) -->
                        <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-amber-500 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-amber-500/30 hover:bg-amber-600 hover:-translate-y-0.5 transition-all duration-200">
                            SEND MESSAGE
                            <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection