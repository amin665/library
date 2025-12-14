@extends('layouts.auth')

@section('content')
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm p-6">
        <h2 class="text-2xl font-semibold mb-4 text-center">Admin Sign In</h2>

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2 text-sm" />
                @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" required
                       class="mt-1 block w-full rounded-md border border-slate-200 px-3 py-2 text-sm" />
                @error('password') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="remember" class="form-checkbox" />
                    Remember me
                </label>
                <a href="#" class="text-sm text-indigo-600">Forgot?</a>
            </div>

            <div>
                <button type="submit" class="w-full inline-flex justify-center items-center rounded-lg bg-indigo-600 px-4 py-2 text-white">Sign in</button>
            </div>
        </form>
    </div>
@endsection
