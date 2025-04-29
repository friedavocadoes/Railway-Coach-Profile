@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-100 p-8 pt-20">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Technician Dashboard</h2>

        <!-- Include Maintenance Logs Section -->
        @include('components.maintenance-logs', ['logs' => $logs])


        <!-- Coaches Section -->
        <div class="bg-white/30 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <h3 class="text-2xl font-bold mb-4 text-gray-800">Coaches</h3>

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
                                <a href="{{ route('coaches.show', $coach->id) }}" class="text-blue-600 hover:underline">View
                                    Logs</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@section('scripts')
    <script>

    </script>
@endsection