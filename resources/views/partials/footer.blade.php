<!-- resources/views/partials/footer.blade.php -->
<footer class="bg-gray-900 text-gray-300 pt-12 pb-6 ">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between">

        <div class="mb-8 md:mb-0">
            <h2 class="text-2xl font-bold text-white">RailCare</h2>
            <p class="mt-2 text-gray-400">Simplifying railway coach maintenance and inspections.</p>
        </div>

        <div class="grid grid-cols-2 gap-8 md:grid-cols-3">
            <div>
                <h3 class="text-white font-semibold mb-4">Navigation</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="/dashboard" class="hover:text-white">Coaches</a></li>
                    <li><a href="/dashboard" class="hover:text-white">Maintenance</a></li>
                    <!-- <li><a href="#" class="hover:text-white">Reports</a></li> -->
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">Help Center</a></li>
                    <li><a href="#" class="hover:text-white">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Company</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-white">About</a></li>
                    <li><a href="#" class="hover:text-white">Careers</a></li>
                </ul>
            </div>
        </div>

    </div>

    <hr class="my-6 border-gray-700" />

    <div class="text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} RailCare. All rights reserved.
    </div>
</footer>