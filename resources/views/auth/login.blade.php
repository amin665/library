@extends('layouts.auth')

@section('content')
    <div>
        <h2 class="text-2xl font-heading font-bold text-slate-900 dark:text-slate-200 text-center mb-6">Sign in</h2>

        @if(session('status'))
            <div class="mb-4 text-sm text-green-500">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="mb-4 text-sm text-red-500">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-400">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border border-slate-700 bg-slate-800 text-slate-200 px-3 py-2" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-400">Password</label>
                <input type="password" name="password" required class="mt-1 block w-full rounded-md border border-slate-700 bg-slate-800 text-slate-200 px-3 py-2" />
            </div>

            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('register') }}" class="text-sm text-indigo-400">Create account</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-white">Sign in</button>
            </div>
        </form>
    </div>

    <div class="mt-4">
        <div class="text-center text-sm text-slate-400 mb-3">Or continue with</div>
        <div class="flex gap-3 justify-center">
            <button type="button" class="inline-flex items-center gap-2 rounded-md border border-slate-700 px-3 py-2 bg-slate-800 text-slate-200">
                <!-- Google icon -->
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden>
                    <path d="M21 12.23c0-.68-.06-1.36-.18-2.01H12v3.8h5.45c-.24 1.3-.98 2.4-2.09 3.14v2.6h3.37C20.01 18.02 21 15.33 21 12.23z" fill="#4285F4"/>
                </svg>
                Google
            </button>
            <button type="button" class="inline-flex items-center gap-2 rounded-md border border-slate-700 px-3 py-2 bg-slate-800 text-slate-200">
                <!-- Apple icon -->
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden>
                    <path d="M16.365 1.43c-.93.06-2.02.62-2.67 1.31-.58.62-1.1 1.66-1 2.63 1 .07 2.11-.48 2.77-1.2.6-.65 1.06-1.68.9-2.74z" fill="#fff"/>
                </svg>
                Apple
            </button>
        </div>
    </div>
@endsection
