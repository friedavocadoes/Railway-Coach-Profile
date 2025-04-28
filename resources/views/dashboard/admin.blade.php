@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-100 flex items-center justify-center">
        <div class="bg-white/30 backdrop-blur-md p-8 rounded-xl shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Admin Dashboard</h2>

            <!-- Admin specific content here -->
            <p class="text-lg">Welcome, Admin! You can manage coaches and maintenance logs.</p>

            <!-- Add buttons or links for admin-related actions -->
            <div class="mt-6">
                <a href="{{ route('coaches.index') }}" class="text-blue-600">Manage Coaches</a><br>
                <a href="{{ route('maintenance-logs.index') }}" class="text-blue-600">Manage Maintenance Logs</a><br>
            </div>
        </div>
    </div>
@endsection