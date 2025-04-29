<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <section
        class="-mx-40 relative flex items-center justify-center min-h-[calc(100vh-80px)] bg-gradient-to-br from-blue-100 via-white to-blue-200 overflow-hidden">

        <!-- Glassmorphic Card -->
        <div class="bg-white/30 backdrop-blur-md rounded-3xl shadow-lg p-10 max-w-3xl mx-4 text-center">

            <h1 class="text-5xl md:text-6xl font-extrabold text-blue-900 mb-6 leading-tight">
                Railway Coach Maintenance
            </h1>

            <p class="text-lg md:text-xl text-blue-800 mb-8">
                Simplifying inspections, repairs, and maintenance — one coach at a time.
            </p>

            <div class="flex flex-col md:flex-row justify-center gap-6">
                <a href="/register"
                    class="px-8 py-4 bg-blue-900 text-white font-semibold rounded-full hover:bg-blue-800 transition">
                    Sign up as a Technician
                </a>
                <a href="/dashboard"
                    class="px-8 py-4 bg-white/40 text-blue-900 font-semibold rounded-full hover:bg-white/60 transition">
                    Log Maintenance
                </a>
            </div>

        </div>

    </section>

    <!-- Optional: Features Section (if you want extra flex) -->
    <section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-3 gap-10">
        <div class="bg-white rounded-2xl p-8 shadow hover:shadow-lg transition">
            <h3 class="text-2xl font-bold text-blue-900 mb-4">Coach Profiles</h3>
            <p class="text-gray-600">Access detailed info about each coach, including service history and current status.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow hover:shadow-lg transition">
            <h3 class="text-2xl font-bold text-blue-900 mb-4">Maintenance Tracking</h3>
            <p class="text-gray-600">Log inspections and repairs easily, with smart reminders and reporting tools.</p>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow hover:shadow-lg transition">
            <h3 class="text-2xl font-bold text-blue-900 mb-4">Real-Time Reports</h3>
            <p class="text-gray-600">Generate and view up-to-date maintenance reports for compliance and audits.</p>
        </div>
    </section>
@endsection