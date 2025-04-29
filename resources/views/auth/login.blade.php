@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white/30 backdrop-blur-md p-8 rounded-xl shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Login</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-green-600">
                        {{ session('success') }}
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Username</label>
                    <input type="text" name="username"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 p-2"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 p-2"
                        required>
                </div>

                <button type="submit"
                    class="w-full mt-6 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection