@extends('layouts.app')

@section('header', 'Library Inventory')

@section('content')
    <div class="space-y-6">
        
        <!-- Action Bar: Functional Search -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            @include('admin.partials.search')

            <a href="{{ route('admin.books.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 transition-all duration-200">
                <svg class="-ml-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" /></svg>
                Add New Book
            </a>
        </div>

        <!-- Main Content Card -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 dark:border-dark-border bg-white dark:bg-dark-card shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 dark:divide-dark-border">
                    <thead class="bg-slate-50 dark:bg-slate-800">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Book</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Author</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Stock</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Price</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Type</th>
                            <th scope="col" class="relative px-6 py-4"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-dark-border bg-white dark:bg-dark-card">
                        @foreach ($books as $book)
                            <tr class="transition-colors hover:bg-slate-50 dark:hover:bg-slate-800/50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-16 w-12 flex-shrink-0 overflow-hidden rounded-md border border-slate-200 dark:border-dark-border bg-slate-100 dark:bg-slate-800">
                                            @if($book->picture)
                                                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->title }}">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center text-slate-300 dark:text-slate-600"><svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg></div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-slate-900 dark:text-white">{{ $book->title }}</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">ID: #{{ $book->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm text-slate-700 dark:text-slate-300">{{ $book->author }}</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if($book->quantityStock > 10)
                                        <span class="inline-flex items-center rounded-full bg-emerald-50 dark:bg-emerald-900/30 px-2.5 py-0.5 text-xs font-medium text-emerald-700 dark:text-emerald-400 ring-1 ring-inset ring-emerald-600/20">In Stock: {{ $book->quantityStock }}</span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-red-50 dark:bg-red-900/30 px-2.5 py-0.5 text-xs font-medium text-red-700 dark:text-red-400 ring-1 ring-inset ring-red-600/10">Low: {{ $book->quantityStock }}</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-900 dark:text-white">
                                    ${{ number_format($book->price, 2) }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    <span class="inline-flex items-center rounded-md bg-slate-100 dark:bg-slate-700 px-2 py-1 text-xs font-medium text-slate-600 dark:text-slate-300 ring-1 ring-inset ring-slate-500/10">{{ $book->type->name ?? 'N/A' }}</span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.books.edit', $book) }}" class="rounded-lg p-1.5 text-indigo-600 hover:bg-indigo-50 dark:text-indigo-400 dark:hover:bg-indigo-900/30 transition-colors">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                        </a>
                                        <!-- Delete Form triggering SweetAlert via global script -->
                                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline-block" onsubmit="deleteConfirm(event)">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Using the custom Red color for the icon -->
                                            <button type="submit" class="rounded-lg p-1.5 text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/30 transition-colors">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(method_exists($books, 'links'))
                <div class="border-t border-slate-200 dark:border-dark-border bg-slate-50 dark:bg-dark-card px-6 py-4 text-slate-500 dark:text-slate-400">
                    {{ $books->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection