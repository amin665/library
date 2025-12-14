@extends('layouts.app')

@section('header', 'Carts Management')

@section('content')
    <div class="space-y-6">
        
       

        <!-- Main Content Card -->
        <div class="overflow-hidden rounded-2xl border border-slate-200 dark:border-dark-border bg-white dark:bg-dark-card shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 dark:divide-dark-border">
                    <thead class="bg-slate-50 dark:bg-slate-800">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">User</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Created At</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Items</th>
                            <th scope="col" class="relative px-6 py-4"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 dark:divide-dark-border bg-white dark:bg-dark-card">
                        @foreach ($carts as $cart)
                            <tr class="transition-colors hover:bg-slate-50 dark:hover:bg-slate-800/50">
                                
                                <!-- User Column -->
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400 font-bold text-xs">
                                            {{ substr($cart->user->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div class="ml-3">
                                            <div class="font-medium text-slate-900 dark:text-white">{{ $cart->user->name ?? 'Unknown User' }}</div>
                                            <div class="text-xs text-slate-500 dark:text-slate-400">ID: #{{ $cart->user_id }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Created At -->
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                                    {{ $cart->created_at->format('M d, Y') }}
                                    <span class="text-xs text-slate-400 block">{{ $cart->created_at->format('h:i A') }}</span>
                                </td>

                                <!-- Items Count (Optional: Assuming you might want to show this) -->
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500 dark:text-slate-400">
                                    <span class="inline-flex items-center rounded-md bg-slate-100 dark:bg-slate-700 px-2.5 py-1 text-xs font-medium text-slate-600 dark:text-slate-300">
                                        {{ $cart->items_count ?? 'N/A' }} Items
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                    <form action="{{ route('admin.carts.destroy', $cart) }}" method="POST" class="inline-block" onsubmit="deleteConfirm(event)">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <!-- Delete Button with Custom Red Hover -->
                                        <button type="submit" class="group flex items-center gap-1 rounded-lg px-3 py-1.5 text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/30 transition-colors" title="Delete Cart">
                                            <span class="text-xs font-medium group-hover:underline">Delete</span>
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if(method_exists($carts, 'links'))
                <div class="border-t border-slate-200 dark:border-dark-border bg-slate-50 dark:bg-dark-card px-6 py-4 text-slate-500 dark:text-slate-400">
                    {{ $carts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection