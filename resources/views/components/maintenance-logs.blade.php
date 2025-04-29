<!-- filepath: c:\Users\g\Downloads\laravel-project\resources\views\components\maintenance-logs.blade.php -->
<div class="bg-white/30 backdrop-blur-md p-6 rounded-xl shadow-lg mb-8">
    <h3 class="text-2xl font-bold mb-4 text-gray-800">Maintenance Logs</h3>

    <!-- Add Maintenance Log Form -->
    <form action="{{ route('maintenance-logs.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Coach Dropdown -->
            <div>
                <label for="coach_id" class="block text-gray-700 font-bold mb-2">Select Coach</label>
                <select id="coach_id" name="coach_id" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    <option value="" disabled selected>Select a coach</option>
                    @foreach ($coaches as $coach)
                        <option value="{{ $coach->id }}">{{ $coach->coach_number }} - {{ $coach->coach_type }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Maintenance Date -->
            <div>
                <label for="maintenance_date" class="block text-gray-700 font-bold mb-2">Maintenance Date</label>
                <input type="date" id="maintenance_date" name="maintenance_date"
                    class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>

            <!-- Performed By -->
            <div>
                <label for="performed_by" class="block text-gray-700 font-bold mb-2">Performed By</label>
                <input type="text" id="performed_by" name="performed_by"
                    class="w-full border border-gray-300 rounded px-4 py-2" value="{{ auth()->user()->name }}" readonly>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="w-full border border-gray-300 rounded px-4 py-2"
                    rows="3" required></textarea>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Log</button>
        </div>
    </form>

    <!-- Maintenance Logs Table -->
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Coach</th>
                <th class="border border-gray-300 px-4 py-2">Technician</th>
                <th class="border border-gray-300 px-4 py-2">Date</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $log->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $log->coach->coach_number }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $log->performed_by }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $log->maintenance_date }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $log->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>