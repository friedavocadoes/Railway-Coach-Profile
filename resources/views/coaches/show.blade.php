@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-100 p-8 ">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Coach Details</h2>
        <div class="absolute top-30 left-10">
            <a href="/dashboard" class="text-blue-600">
                <- Go to Dashboard</a>
        </div>

        <!-- Coach Information -->
        <div class="bg-white/30 backdrop-blur-md p-6 rounded-xl shadow-lg mb-8">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Coach Information</h3>
            <p><strong>Coach Number:</strong> {{ $coach->coach_number }}</p>
            <p><strong>Type:</strong> {{ $coach->coach_type }}</p>
            <p><strong>Description:</strong> {{ $coach->description }}</p>

            @if(session('user_role') == "admin")
                <button id="openEditModal" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mt-4">
                    Edit Coach
                </button>
            @endif
        </div>

        <!-- Maintenance Records -->
        <div class="bg-white/30 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Maintenance Records</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                        <th class="border border-gray-300 px-4 py-2">Technician</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenanceLogs as $log)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->maintenance_date }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->performed_by }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $log->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Coach Modal -->
    <div id="editCoachModal" class="absolute flex inset-0 bg-black/40 backdrop-blur-lg hidden items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-2xl font-bold mb-4">Edit Coach</h3>
            <form id="editCoachForm" action="{{ route('coaches.update', $coach->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_coach_number" class="block text-gray-700 font-bold mb-2">Coach Number</label>
                    <input type="text" id="edit_coach_number" name="coach_number"
                        class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $coach->coach_number }}" required>
                </div>
                <div class="mb-4">
                    <label for="edit_coach_type" class="block text-gray-700 font-bold mb-2">Coach Type</label>
                    <input type="text" id="edit_coach_type" name="coach_type"
                        class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $coach->coach_type }}" required>
                </div>
                <div class="mb-4">
                    <label for="edit_description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="edit_description" name="description"
                        class="w-full border border-gray-300 rounded px-4 py-2"
                        rows="3">{{ $coach->description }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeEditModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Open Edit Modal
            document.getElementById('openEditModal').addEventListener('click', function () {
                document.getElementById('editCoachModal').classList.remove('hidden');
            });

            // Close Edit Modal
            document.getElementById('closeEditModal').addEventListener('click', function () {
                document.getElementById('editCoachModal').classList.add('hidden');
            });
        });
    </script>
@endsection