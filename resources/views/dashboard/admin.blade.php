@extends('layouts.app')

@section('content')
    <div class="min-h-screen  p-8 pt-20">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Admin Dashboard</h2>

        <!-- Include Maintenance Logs Section -->
        @include('components.maintenance-logs', ['logs' => $logs])


        <!-- Coaches Section -->
        <div class="bg-white/30 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Coaches</h3>
            <button id="openModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 cursor-pointer">Add New
                Coach</button>
            <table class="w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Coach Number</th>
                        <th class="border border-gray-300 px-4 py-2">Type</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coaches as $coach)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $coach->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $coach->coach_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $coach->coach_type }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('coaches.show', $coach->id) }}"
                                    class="text-blue-600 hover:underline cursor-pointer">View</a>
                                |
                                <button class="text-green-600 hover:underline openCoachEdit cursor-pointer" data-id="{{ $coach->id }}"
                                                    data-number="{{ $coach->coach_number }}" data-type="{{ $coach->coach_type }}"
                                                    data-description="{{ $coach->description }}">Edit</button>
                                                |
                                <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Adding a New Coach -->
    <div id="coachModal" class="absolute flex inset-0 bg-black/40 backdrop-blur-lg hidden items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-2xl font-bold mb-4">Add New Coach</h3>
            <form id="createCoachForm" action="{{ route('coaches.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="coach_number" class="block text-gray-700 font-bold mb-2">Coach Number</label>
                    <input type="text" id="coach_number" name="coach_number"
                        class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="coach_type" class="block text-gray-700 font-bold mb-2">Coach Type</label>
                    <input type="text" id="coach_type" name="coach_type"
                        class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="description" name="description"
                        class="w-full border border-gray-300 rounded px-4 py-2"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeModal"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for Editing a Coach -->
    <div id="editCoachModal" class="fixed flex inset-0 bg-black/40 backdrop-blur-lg hidden items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-2xl font-bold mb-4">Edit Coach</h3>
            <form id="editCoachForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_coach_number" class="block text-gray-700 font-bold mb-2">Coach Number</label>
                    <input type="text" id="edit_coach_number" name="coach_number"
                        class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="edit_coach_type" class="block text-gray-700 font-bold mb-2">Coach Type</label>
                    <input type="text" id="edit_coach_type" name="coach_type"
                        class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label for="edit_description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <textarea id="edit_description" name="description"
                        class="w-full border border-gray-300 rounded px-4 py-2"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="closeCoachEdit"
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
            document.getElementById('openModal').addEventListener('click', function () {
                console.log("hi");
                document.getElementById('coachModal').classList.remove('hidden');
            });

            document.getElementById('closeModal').addEventListener('click', function () {
                document.getElementById('coachModal').classList.add('hidden');
            });
        });

        document.querySelectorAll('.openCoachEdit').forEach(button => {
            console.log("coach");
            button.addEventListener('click', function () {
                const coachId = this.dataset.id;
                const coachNumber = this.dataset.number;
                const coachType = this.dataset.type;
                const description = this.dataset.description;

                // Fill the form with existing data
                document.getElementById('edit_coach_number').value = coachNumber;
                document.getElementById('edit_coach_type').value = coachType;
                document.getElementById('edit_description').value = description;

                // Update the form action
                const form = document.getElementById('editCoachForm');
                form.action = `/coaches/${coachId}`;

                // Show the modal
                document.getElementById('editCoachModal').classList.remove('hidden');
            });
        });

        // Close Edit Modal
        document.getElementById('closeCoachEdit').addEventListener('click', function () {
            document.getElementById('editCoachModal').classList.add('hidden');
        });

    </script>
@endsection