@extends('layouts.app')

@section('header')
    <div class="flex items-center gap-4">
        <span class="text-slate-500 dark:text-slate-400 font-normal">Edit Book:</span>
        <span class="text-slate-900 dark:text-white">{{ $book->title }}</span>
    </div>
@endsection

@section('content')
    <div class="mx-auto max-w-5xl">
        
        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                
                <!-- LEFT COLUMN: Main Information -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                        <div class="flex items-center justify-between border-b border-slate-100 dark:border-dark-border pb-4 mb-6">
                            <div>
                                <h2 class="text-base font-semibold leading-7 text-slate-900 dark:text-white">Book Details</h2>
                                <p class="mt-1 text-sm leading-6 text-slate-500 dark:text-slate-400">Update general information.</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                            
                            <!-- Title -->
                            <div class="sm:col-span-4">
                                <label for="title" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required 
                                        class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Author -->
                            <div class="sm:col-span-2">
                                <label for="author" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Author</label>
                                <div class="mt-2">
                                    <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required 
                                        class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-span-full">
                                <label for="description" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Description</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="5" required 
                                        class="block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description', $book->description) }}</textarea>
                                </div>
                            </div>

                            <!-- Publisher -->
                            <div class="col-span-full">
                                <label for="publisher" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Publisher</label>
                                <div class="mt-2">
                                    <div class="flex rounded-lg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border bg-white dark:bg-dark-bg focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                        <span class="flex select-none items-center pl-3 text-slate-500 dark:text-slate-400 sm:text-sm">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                                        </span>
                                        <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}" required 
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
                        <h2 class="text-base font-semibold leading-7 text-slate-900 dark:text-white mb-4">Inventory & Pricing</h2>
                        
                        <div class="space-y-5">
                            <!-- Price -->
                            <div>
                                <label for="price" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Price</label>
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-slate-500 dark:text-slate-400 sm:text-sm">$</span>
                                    </div>
                                    <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price', $book->price) }}" required 
                                        class="block w-full rounded-lg border-0 py-2.5 pl-7 text-slate-900 dark:text-white bg-white dark:bg-dark-bg ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Stock -->
                            <div>
                                <label for="quantityStock" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Quantity Stock</label>
                                <input type="number" name="quantityStock" id="quantityStock" min="0" value="{{ old('quantityStock', $book->quantityStock) }}" required 
                                    class="mt-2 block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type_id" class="block text-sm font-medium leading-6 text-slate-900 dark:text-slate-300">Classification Type</label>
                                <select id="type_id" name="type_id" 
                                    class="mt-2 block w-full rounded-lg border-0 py-2.5 text-slate-900 dark:text-white bg-white dark:bg-dark-bg shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-dark-border focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="">Select a type...</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $book->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Cover Image -->
                    <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm ring-1 ring-slate-200 dark:ring-dark-border">
                        <label class="text-base font-semibold leading-7 text-slate-900 dark:text-white">Cover Image</label>
                        
                        <!-- Current Image Preview -->
                        <div class="mt-4 mb-4">
                            @if ($book->picture)
                                <div class="relative w-full overflow-hidden rounded-lg border border-slate-200 dark:border-dark-border shadow-sm group">
                                    <img src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->title }}" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-sm font-medium">
                                        Current Cover
                                    </div>
                                </div>
                            @else
                                <div class="flex h-32 w-full items-center justify-center rounded-lg border border-dashed border-slate-300 dark:border-dark-border bg-slate-50 dark:bg-slate-800 text-slate-400">
                                    <span class="text-sm">No image set</span>
                                </div>
                            @endif
                        </div>

                        <!-- Upload Zone -->
                        <div class="mt-2 flex justify-center rounded-xl border-2 border-dashed border-slate-300 dark:border-slate-600 px-6 py-6 hover:border-indigo-500 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <div class="text-center">
                                <div class="flex text-sm leading-6 text-slate-600 dark:text-slate-400 justify-center">
                                    <label for="picture" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 dark:text-indigo-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Change file</span>
                                        <input id="picture" name="picture" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag & drop</p>
                                </div>
                                <p class="text-xs leading-5 text-slate-500 dark:text-slate-500">To replace the current cover</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex items-center justify-end gap-x-6 border-t border-slate-900/10 dark:border-slate-100/10 pt-8">
                <a href="{{ route('admin.books.index') }}" class="text-sm font-semibold leading-6 text-slate-900 dark:text-white hover:text-slate-600">Cancel</a>
                <button type="submit" class="rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-colors">
                    Update Book
                </button>
            </div>
            
        </form>
    </div>
@endsection