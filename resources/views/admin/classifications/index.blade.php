@extends('layouts.app')

@section('header', 'Classifications')

@section('content')
    <div class="space-y-6">
        
        <!-- Action Bar: Functional Search & Add Button -->

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            @include('admin.partials.search')

            <a href="{{ route('admin.classifications.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-all duration-200">
                <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
                </svg>
                Add Classification
            </a>
        </div>

        <!-- Main Content Card -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 dark:border-dark-border bg-white dark:bg-dark-card shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 dark:divide-dark-border">
                    <thead class="bg-slate-50 dark:bg-slate-800">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">ID</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Name</th>
                            <th scope="col" class="relative px-6 py-4"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-dark-border bg-white dark:bg-dark-card">
                        @forelse ($classifications as $classification)
                            <tr class="transition-colors hover:bg-slate-50 dark:hover:bg-slate-800/50">
                                <!-- ID -->
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                                    #{{ $classification->id }}
                                </td>

                                <!-- Name -->
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="font-medium text-slate-900 dark:text-white">{{ $classification->name }}</div>
                                </td>

                                <!-- Actions -->
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.classifications.edit', $classification) }}" class="rounded-lg p-1.5 text-indigo-600 hover:bg-indigo-50 dark:text-indigo-400 dark:hover:bg-indigo-900/30 transition-colors" title="Edit">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        
                                        <!-- Delete Action with SweetAlert -->
                                        <form action="{{ route('admin.classifications.destroy', $classification) }}" method="POST" class="inline-block" onsubmit="deleteConfirm(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg p-1.5 text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/30 transition-colors" title="Delete">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="h-12 w-12 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center mb-3">
                                            <svg class="h-6 w-6 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-sm font-semibold text-slate-900 dark:text-white">No classifications</h3>
                                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Get started by creating a new classification.</p>
                                        <div class="mt-4">
                                            <a href="{{ route('admin.classifications.create') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                                                Create your first classification &rarr;
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            @if(method_exists($classifications, 'links'))
                <div class="border-t border-slate-200 dark:border-dark-border bg-slate-50 dark:bg-dark-card px-6 py-4 text-slate-500 dark:text-slate-400">
                    {{ $classifications->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection