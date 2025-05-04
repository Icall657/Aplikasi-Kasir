@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300 @error('email') border-red-500 @enderror"
                    required autofocus>

                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300 @error('password') border-red-500 @enderror"
                    required>

                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="text-sm text-gray-600">Remember me</label>
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Login
                </button>
            </div>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <div class="mt-4 text-center">
                    <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
