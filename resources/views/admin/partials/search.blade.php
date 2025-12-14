<form method="GET" class="w-full sm:max-w-md" aria-label="Search">
    <div class="relative">
        <input
            type="search"
            name="q"
            value="{{ request('q', $q ?? '') }}"
            placeholder="Search..."
            class="block w-full rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm shadow-sm placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 dark:border-dark-border dark:bg-dark-input dark:placeholder-slate-500"
        />
        <button type="submit" class="absolute right-1 top-1/2 -translate-y-1/2 inline-flex items-center gap-2 rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-medium text-white hover:bg-indigo-500">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10.5 18.5a8 8 0 100-16 8 8 0 000 16z" /></svg>
            <span class="hidden sm:inline">Search</span>
        </button>
    </div>
</form>
