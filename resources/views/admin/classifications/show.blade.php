@extends('layouts.app')

@section('header')
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.classifications.index') }}" class="group flex items-center gap-1 rounded-lg bg-white dark:bg-dark-card px-3 py-1.5 text-sm font-medium text-slate-600 dark:text-slate-300 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
            <svg class="h-4 w-4 text-slate-400 dark:text-slate-500 group-hover:text-indigo-600 dark:group-hover:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back
        </a>
        <span class="text-slate-300 dark:text-slate-600">|</span>
        <span class="text-slate-900 dark:text-white">Classification Details</span>
    </div>
@endsection

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="overflow-hidden rounded-2xl bg-white dark:bg-dark-card shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
            
            <!-- Card Header -->
            <div class="border-b border-slate-100 dark:border-dark-border bg-slate-50/50 dark:bg-slate-800/50 px-6 py-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-slate-900 dark:text-white">General Information</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">View details for this classification.</p>
                    </div>
                    <!-- ID Badge -->
                    <span class="inline-flex items-center rounded-md bg-indigo-50 dark:bg-indigo-900/30 px-2.5 py-1 text-xs font-medium text-indigo-700 dark:text-indigo-400 ring-1 ring-inset ring-indigo-700/10 dark:ring-indigo-400/20">
                        ID: #{{ $classification->id }}
                    </span>
                </div>
            </div>

            <!-- Details Body -->
            <div class="px-6 py-6">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                    
                    <!-- Name (Full Width) -->
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium leading-6 text-slate-500 dark:text-slate-400">Classification Name</dt>
                        <dd class="mt-1 text-lg font-semibold leading-7 text-slate-900 dark:text-white">{{ $classification->name }}</dd>
                    </div>

                    <!-- Timestamps -->
                    <div class="border-t border-slate-100 dark:border-dark-border pt-4 sm:col-span-1">
                        <dt class="text-sm font-medium leading-6 text-slate-500 dark:text-slate-400">Created At</dt>
                        <dd class="mt-1 text-sm leading-6 text-slate-700 dark:text-slate-300">
                            {{ $classification->created_at->format('M j, Y') }} 
                            <span class="text-slate-400 dark:text-slate-500 text-xs">at {{ $classification->created_at->format('g:i a') }}</span>
                        </dd>
                    </div>

                    <div class="border-t border-slate-100 dark:border-dark-border pt-4 sm:col-span-1">
                        <dt class="text-sm font-medium leading-6 text-slate-500 dark:text-slate-400">Last Updated</dt>
                        <dd class="mt-1 text-sm leading-6 text-slate-700 dark:text-slate-300">
                            {{ $classification->updated_at->format('M j, Y') }}
                            <span class="text-slate-400 dark:text-slate-500 text-xs">at {{ $classification->updated_at->format('g:i a') }}</span>
                        </dd>
                    </div>

                </dl>
            </div>

            <!-- Footer Actions -->
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-dark-border">
                
                <!-- Delete with SweetAlert -->
                <form action="{{ route('admin.classifications.destroy', $classification) }}" method="POST" onsubmit="deleteConfirm(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white dark:bg-dark-card px-4 py-2 text-sm font-semibold text-red-600 dark:text-red-400 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border hover:bg-red-50 dark:hover:bg-red-900/20 hover:ring-red-200 transition-all">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete
                    </button>
                </form>

                <a href="{{ route('admin.classifications.edit', $classification) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Classification
                </a>
            </div>

        </div>
    </div>
@endsection