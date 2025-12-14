@extends('layouts.guest')

@section('content')
    <div class="space-y-6">
        <h1 class="text-2xl font-heading font-bold">Your Cart</h1>

        @if(session('success'))
            <div class="rounded-md bg-emerald-50 p-3 text-emerald-800">{{ session('success') }}</div>
        @endif

        @if($carts->isEmpty())
            <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm">Your cart is empty.</div>
        @else
            <div class="rounded-2xl bg-white dark:bg-dark-card p-6 shadow-sm">
                <form method="POST" action="{{ route('cart.checkout') }}">
                    @csrf
                    <div class="space-y-4">
                        @foreach($carts as $item)
                            <div class="flex items-center gap-4 border-b border-slate-100 dark:border-dark-border pb-4 mb-4">
                                <div class="w-20 h-20 bg-slate-100 dark:bg-slate-800 rounded-md overflow-hidden">
                                    @if($item->book->picture)
                                        <img src="{{ asset('storage/' . $item->book->picture) }}" class="w-full h-full object-cover" />
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">{{ $item->book->title }}</div>
                                    <div class="text-sm text-slate-500">${{ number_format($item->book->price,2) }}</div>
                                </div>
                                <div class="w-40">
                                    <form method="POST" action="{{ route('cart.update', $item) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-20 rounded-md border border-slate-200 dark:border-dark-border px-2 py-1 bg-white dark:bg-dark-card text-slate-700 dark:text-slate-200" />
                                        <button class="ml-2 text-sm text-indigo-600">Update</button>
                                    </form>
                                </div>
                                <div>
                                    <form method="POST" action="{{ route('cart.destroy', $item) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-sm text-red-600">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        <div class="pt-4">
                            <label class="block text-sm">Phone number</label>
                            <input type="text" name="phone_number" required class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2 bg-white dark:bg-dark-card text-slate-700 dark:text-slate-200" />
                        </div>
                        <div>
                            <label class="block text-sm">Location</label>
                            <input type="text" name="location" required class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2 bg-white dark:bg-dark-card text-slate-700 dark:text-slate-200" />
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="text-lg font-medium">Total: ${{ number_format($carts->sum(function($i){ return $i->book->price * $i->quantity; }),2) }}</div>
                            <button type="submit" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-white">Proceed to Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
