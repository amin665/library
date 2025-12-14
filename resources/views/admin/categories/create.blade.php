@extends('layouts.app')

@section('header', 'Add New Category')

@section('content')
    <div class="mx-auto max-w-2xl">
        
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            
            <div class="overflow-hidden rounded-2xl bg-white dark:bg-dark-card shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                <div class="px-4 py-5 sm:p-6">
                    
                    <!-- Header inside card -->
                    <div class="border-b border-slate-100 dark:border-dark-border pb-5 mb-5">
                        <h3 class="text-base font-semibold leading-6 text-slate-900 dark:text-white">Category Details</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Create a new category to organize your library books.</p>
                    </div>

                    <div class="grid grid-cols-1 gap-y-6">
                        
                        <!-- Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Category Name</label>
                            <div class="mt-2">
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    placeholder="e.g. Science Fiction" 
                                    required
                                    class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                >
                            </div>
                        </div>

                        <!-- Classification Select -->
                        <div>
                            <label for="classification_id" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Classification</label>
                            <div class="mt-2">
                                <select 
                                    id="classification_id" 
                                    name="classification_id" 
                                    required
                                    class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                >
                                    <option value="">Select a classification...</option>
                                    @foreach ($classifications as $classification)
                                        <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">This determines where the category sits in the hierarchy.</p>
                        </div>

                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="bg-slate-50 dark:bg-slate-800/50 px-4 py-4 sm:px-6 flex items-center justify-end gap-x-6 border-t border-slate-100 dark:border-dark-border">
                    <a href="{{ route('admin.categories.index') }}" class="text-sm font-semibold leading-6 text-slate-900 dark:text-white hover:text-slate-600">Cancel</a>
                    <button type="submit" class="rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">
                        Create Category
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection