<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Maintenance</title>

    @vite('resources/css/app.css')

</head>

<body class="flex flex-col min-h-screen">

    @include('partials.navbar')

    <main class="flex-grow bg-gradient-to-br from-blue-100 via-white to-blue-100 pt-20 px-40">
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')
    @yield('comp-scripts')
</body>

</html>