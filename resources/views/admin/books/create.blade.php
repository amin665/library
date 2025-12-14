@extends('layouts.app')

@section('header', 'Add New Book')

@section('content')
    <div class="mx-auto max-w-5xl">
        
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                
                <!-- LEFT COLUMN: Main Information -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                        <h2 class="text-base font-semibold leading-7 text-slate-900 dark:text-white">Book Details</h2>
                        <p class="mt-1 text-sm leading-6 text-slate-500 dark:text-slate-400">General information about the book.</p>
                        
                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            
                            <!-- Title -->
                            <div class="sm:col-span-4">
                                <label for="title" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" required 
                                        class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Author -->
                            <div class="sm:col-span-2">
                                <label for="author" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Author</label>
                                <div class="mt-2">
                                    <input type="text" name="author" id="author" value="{{ old('author') }}" required 
                                        class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Description</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="4" required 
                                        class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description') }}</textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-slate-500 dark:text-slate-400">Write a brief summary of the book content.</p>
                            </div>

                            <!-- Publisher -->
                            <div class="col-span-full">
                                <label for="publisher" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Publisher</label>
                                <div class="mt-2">
                                    <div class="flex rounded-lg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border bg-white dark:bg-dark-bg focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <span class="flex select-none items-center pl-3 text-slate-500 dark:text-slate-400 sm:text-sm">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                        </span>
                                        <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" required 
                                            class="block flex-1 border-0 bg-transparent py-2.5 pl-2 text-slate-900 dark:text-white placeholder:text-slate-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Metadata & Media -->
                <div class="space-y-6">
                    
                    <!-- Inventory & Pricing -->
                    <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                        <h2 class="text-base font-semibold leading-7 text-slate-900 dark:text-white">Inventory & Pricing</h2>
                        
                        <div class="mt-6 space-y-6">
                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Price</label>
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-slate-500 dark:text-slate-400 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', '0.00') }}" required 
                                        class="block w-full rounded-lg border-0 py-2.5 pl-7 text-slate-900 dark:text-white bg-white dark:bg-dark-bg ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Stock -->
                            <div>
                                <label for="quantityStock" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Quantity Stock</label>
                                <input type="number" name="quantityStock" id="quantityStock" min="0" value="{{ old('quantityStock', 0) }}" required 
                                    class="mt-2 block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type_id" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Classification Type</label>
                                <select id="type_id" name="type_id" 
                                    class="mt-2 block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="">Select a type...</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                        <label class="text-base font-semibold leading-7 text-slate-900 dark:text-white">Cover Image</label>
                        <div class="mt-4 flex justify-center rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-600 px-6 py-10 hover:border-indigo-500 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-300 dark:text-slate-500" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-slate-600 dark:text-slate-400 justify-center">
                                    <label for="picture" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 dark:text-indigo-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="picture" name="picture" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-slate-500 dark:text-slate-500">PNG, JPG, GIF up to 5MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex items-center justify-end gap-x-6 border-t border-slate-900/10 dark:border-slate-100/10 pt-8">
                <a href="{{ route('admin.books.index') }}" class="text-sm font-semibold leading-6 text-slate-900 dark:text-white hover:text-slate-600">Cancel</a>
                <button type="submit" class="rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">Save Book</button>
            </div>
            
        </form>
    </div>
@endsection