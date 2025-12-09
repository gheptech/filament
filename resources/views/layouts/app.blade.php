<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 text-gray-900">

    {{-- Header + Navbar --}}
    <header>
        @include('partials.navbar')
    </header>

    {{-- Hero Section --}}
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Selamat Datang di {{ config('app.name') }}</h1>
            <p class="text-lg">Website ini dibuat dengan Laravel + Tailwind</p>
            <a href="#content" class="mt-6 inline-block bg-white text-blue-600 px-6 py-2 rounded hover:bg-gray-200">
                Mulai Jelajah
            </a>
        </div>
    </section>

    {{-- Konten Utama --}}
    <main id="content" class="container mx-auto py-12">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>