@extends('layouts.app')

@section('header', 'Create Classification')

@section('content')
    <div class="mx-auto max-w-2xl">
        
        <form action="{{ route('admin.classifications.store') }}" method="POST">
            @csrf
            
            <div class="overflow-hidden rounded-2xl bg-white dark:bg-dark-card shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                <div class="px-4 py-5 sm:p-6">
                    
                    <!-- Header inside card -->
                    <div class="border-b border-slate-100 dark:border-dark-border pb-5 mb-5">
                        <h3 class="text-base font-semibold leading-6 text-slate-900 dark:text-white">Classification Details</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Classifications are the top-level grouping for your library (e.g., Dewey Decimal, Genre).</p>
                    </div>

                    <div class="grid grid-cols-1 gap-y-6">
                        
                        <!-- Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Name</label>
                            <div class="mt-2">
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    placeholder="e.g. Science Fiction" 
                                    value="{{ old('name') }}"
                                    required
                                    class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                >
                            </div>
                            
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center gap-1">
                                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">The primary name used to identify this group.</p>
                        </div>

                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-slate-50 dark:bg-slate-800/50 px-4 py-4 sm:px-6 flex items-center justify-end gap-x-6 border-t border-slate-100 dark:border-dark-border">
                    <a href="{{ route('admin.classifications.index') }}" class="text-sm font-semibold leading-6 text-slate-900 dark:text-white hover:text-slate-600 dark:hover:text-slate-300">Cancel</a>
                    <button type="submit" class="rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">
                        Create Classification
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection