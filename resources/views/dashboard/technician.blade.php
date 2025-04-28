@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-green-100 flex items-center justify-center">
        <div class="bg-white/30 backdrop-blur-md p-8 rounded-xl shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Technician Dashboard</h2>

            <!-- Technician specific content here -->
            <p class="text-lg">Welcome, Technician! You can log maintenance activities here.</p>

            <!-- Add buttons or links for technician-related actions -->
            <div class="mt-6">
                <a href="{{ route('maintenance-logs.index') }}" class="text-blue-600">Log Maintenance Activity</a><br>
                <a href="{{ route('coaches.index') }}" class="text-blue-600">View Coaches</a><br>
            </div>
        </div>
    </div>
@endsection