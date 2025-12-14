@extends('layouts.guest')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-heading font-bold">Books</h1>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($books as $book)
                <div class="rounded-2xl bg-white dark:bg-dark-card p-4 shadow-sm border border-slate-100 dark:border-dark-border">
                    <div class="h-40 mb-4 overflow-hidden rounded-lg bg-slate-100">
                        @if($book->picture)
                            <img src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->title }}" class="w-full h-full object-cover" />
                        @else
                            <div class="flex h-full items-center justify-center text-slate-300">No image</div>
                        @endif
                    </div>
                    <h3 class="font-medium">{{ $book->title }}</h3>
                    <p class="text-sm text-slate-500">{{ $book->author }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-sm font-medium">${{ number_format($book->price, 2) }}</div>
                        @auth
                            <form method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}" />
                                <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-1 text-white text-sm">Add</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-indigo-600">Sign in to add</a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
