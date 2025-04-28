<!-- resources/views/partials/navbar.blade.php -->
<nav class="bg-white/30 backdrop-blur-md border-b border-white/20 fixed w-full z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <div class="text-2xl font-bold text-blue-900">🚂 RailCare</div>
        <ul class="flex space-x-8 text-blue-900 font-semibold">
            <li><a href="/" class="hover:text-blue-700">Home</a></li>
            <li><a href="#" class="hover:text-blue-700">Coaches</a></li>
            <li><a href="#" class="hover:text-blue-700">Maintenance</a></li>
            <li><a href="#" class="hover:text-blue-700">Reports</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white p-2 rounded">Logout</button>
            </form>
        </ul>
    </div>
</nav>