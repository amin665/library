@extends('layouts.app')

@section('header', 'Overview')

@section('content')
    <div class="space-y-8">
        
        <!-- Top Row: Hero Stats -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            
            <!-- Card: Classifications -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 p-6 text-white shadow-lg shadow-indigo-200 dark:shadow-none transition-transform duration-300 hover:-translate-y-1">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 h-32 w-32 rounded-full bg-white opacity-10 blur-2xl"></div>
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-indigo-100">Total Classifications</p>
                            <h3 class="mt-2 text-4xl font-bold font-heading">{{ $stats['classifications'] }}</h3>
                        </div>
                        <div class="rounded-xl bg-white/20 p-2.5 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.classifications.index') }}" class="mt-6 flex w-fit items-center gap-2 rounded-lg bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white backdrop-blur-md hover:bg-white/20 transition-colors">View Details <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                </div>
            </div>

            <!-- Card: Types -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 p-6 text-white shadow-lg shadow-blue-200 dark:shadow-none transition-transform duration-300 hover:-translate-y-1">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 h-32 w-32 rounded-full bg-white opacity-10 blur-2xl"></div>
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-blue-100">Total Types</p>
                            <h3 class="mt-2 text-4xl font-bold font-heading">{{ $stats['types'] }}</h3>
                        </div>
                        <div class="rounded-xl bg-white/20 p-2.5 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" /></svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.types.index') }}" class="mt-6 flex w-fit items-center gap-2 rounded-lg bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white backdrop-blur-md hover:bg-white/20 transition-colors">View Details <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                </div>
            </div>

            <!-- Card: Books -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-500 p-6 text-white shadow-lg shadow-emerald-200 dark:shadow-none transition-transform duration-300 hover:-translate-y-1">
                <div class="absolute top-0 right-0 -mr-8 -mt-8 h-32 w-32 rounded-full bg-white opacity-10 blur-2xl"></div>
                <div class="relative z-10 flex flex-col justify-between h-full">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-emerald-100">Available Books</p>
                            <h3 class="mt-2 text-4xl font-bold font-heading">{{ $stats['books'] }}</h3>
                        </div>
                        <div class="rounded-xl bg-white/20 p-2.5 backdrop-blur-sm">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                        </div>
                    </div>
                    <a href="{{ route('admin.books.index') }}" class="mt-6 flex w-fit items-center gap-2 rounded-lg bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-white backdrop-blur-md hover:bg-white/20 transition-colors">View Details <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                </div>
            </div>
        </div>

        <!-- Secondary Stats Row (Clickable) -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            
            <!-- Clickable Card: Active Carts -->
            <a href="{{ route('admin.carts.index') }}" class="group relative block overflow-hidden rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border transition-all duration-300 hover:shadow-md hover:-translate-y-1 hover:ring-indigo-500 dark:hover:ring-indigo-500">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-5">
                        <div class="flex-shrink-0 rounded-xl bg-amber-50 dark:bg-amber-900/30 p-3 text-amber-600 dark:text-amber-400 group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Active Carts</p>
                            <h3 class="text-3xl font-bold text-slate-800 dark:text-white font-heading">{{ $stats['carts'] }}</h3>
                        </div>
                    </div>
                    <div class="text-slate-300 dark:text-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </a>

            <!-- Clickable Card: Categories -->
            <a href="{{ route('admin.categories.index') }}" class="group relative block overflow-hidden rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border transition-all duration-300 hover:shadow-md hover:-translate-y-1 hover:ring-indigo-500 dark:hover:ring-indigo-500">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-5">
                        <div class="flex-shrink-0 rounded-xl bg-purple-50 dark:bg-purple-900/30 p-3 text-purple-600 dark:text-purple-400 group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Categories</p>
                            <h3 class="text-3xl font-bold text-slate-800 dark:text-white font-heading">{{ $stats['categories'] }}</h3>
                        </div>
                    </div>
                    <div class="text-slate-300 dark:text-slate-600 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </div>
            </a>
        </div>

        <!-- Chart Section -->
        <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
            <h3 class="text-lg font-bold text-slate-800 dark:text-white font-heading mb-6">Distribution of Books by Type</h3>
            <div class="relative h-96 w-full">
                <canvas id="booksByTypeChart"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Robust Chart Script: Handles Theme Switching -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('booksByTypeChart').getContext('2d');
            let myChart = null; // Store chart instance

            // Function to render chart based on current theme
            function renderChart() {
                const isDark = document.documentElement.classList.contains('dark');
                
                // Colors based on theme
                const textColor = isDark ? '#94a3b8' : '#64748b'; // Slate 400 (Dark) / Slate 500 (Light)
                const gridColor = isDark ? '#334155' : '#e2e8f0'; // Slate 700 (Dark) / Slate 200 (Light)
                const tooltipBg = isDark ? '#1e293b' : '#ffffff';
                const tooltipText = isDark ? '#ffffff' : '#0f172a';

                // Create Gradient
                let gradient = ctx.createLinearGradient(0, 0, 0, 400);
                gradient.addColorStop(0, '#6366f1'); // Indigo 500
                gradient.addColorStop(1, isDark ? 'rgba(99, 102, 241, 0.1)' : 'rgba(99, 102, 241, 0.3)');

                // Destroy old chart if exists
                if (myChart) {
                    myChart.destroy();
                }

                // Create new chart
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($chartData->pluck('name')),
                        datasets: [{
                            label: 'Books Count',
                            data: @json($chartData->pluck('books_count')),
                            backgroundColor: gradient,
                            hoverBackgroundColor: '#4f46e5',
                            borderRadius: { topLeft: 8, topRight: 8, bottomLeft: 2, bottomRight: 2 },
                            barThickness: 35,
                            borderSkipped: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: { duration: 500 }, // Smooth transition
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: tooltipBg,
                                titleColor: tooltipText,
                                bodyColor: isDark ? '#cbd5e1' : '#64748b',
                                borderColor: gridColor,
                                borderWidth: 1,
                                padding: 12,
                                titleFont: { family: "'Plus Jakarta Sans', sans-serif", size: 13 },
                                bodyFont: { family: "'Inter', sans-serif", size: 12 },
                                cornerRadius: 8,
                                displayColors: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: gridColor, borderDash: [5, 5], drawBorder: false },
                                ticks: { color: textColor, font: { family: "'Inter', sans-serif", size: 11 }, padding: 10 }
                            },
                            x: {
                                grid: { display: false, drawBorder: false },
                                ticks: { color: textColor, font: { family: "'Inter', sans-serif", size: 11 } }
                            }
                        }
                    }
                });
            }

            // Initial Render
            renderChart();

            // Watch for changes in the 'class' attribute of <html> to detect Dark Mode toggle
            const observer = new MutationObserver(() => {
                renderChart();
            });
            observer.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });
        });
    </script>
@endsection