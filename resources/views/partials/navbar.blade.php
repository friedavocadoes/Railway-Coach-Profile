<!-- resources/views/partials/navbar.blade.php -->
<nav class="bg-white/30 backdrop-blur-md border-b border-white/20 fixed w-full z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
        <div class="text-2xl font-bold text-blue-900"><a href="/">🚂 RailCare</a></div>
        <ul class="flex space-x-8 text-blue-900 font-semibold">
            <!-- <li><a href="/" class="hover:text-blue-700">Home</a></li>
            <li><a href="#" class="hover:text-blue-700">Coaches</a></li>
            <li><a href="#" class="hover:text-blue-700">Maintenance</a></li>
            <li><a href="#" class="hover:text-blue-700">Reports</a></li> -->

            @if (session()->has('user_id'))
                <!-- Dashboard Link -->
                <li><a href="{{ route('dashboard') }}" class="hover:text-blue-700">Dashboard</a></li>

                <!-- User Dropdown -->
                <li class="relative group">
                    <button class="hover:text-blue-700 cursor-pointer">
                        {{ session('username') }} ({{ session('user_role') }})
                    </button>
                    <ul class="absolute hidden w-40 group-hover:block bg-white shadow-lg rounded-lg mt">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <!-- Login and Signup Links -->
                <li><a href="{{ route('login') }}" class="hover:text-blue-700">Login</a></li>
                <li><a href="{{ route('register.show') }}" class="hover:text-blue-700">Signup</a></li>
            @endif
        </ul>
    </div>
</nav>