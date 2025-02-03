<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Rising Avocado - Innovation Simplified</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom css for animation -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-white">
    <nav class="bg-white shadow-sm fixed w-full z-10">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <img src="{{ asset('favicon.png') }}" alt="The Rising Avocado" class="h-12 rounded-full">
            <h1 class="text-4xl font-bold text-green-600">The Rising Avocado</h1>
            <div class="space-x-6">
                <a href="#about" class="text-gray-600 hover:text-green-600">About</a>
                <a href="#solutions" class="text-gray-600 hover:text-green-600">Solutions</a>
                <a href="{{ route('filament.auth.login') }}" class="text-green-600 hover:text-green-900">Login</a>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-green-600 to-emerald-800 text-white py-20 px-4">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold mb-6 m-20">Welcome to The Rising Avocado</h1>
            <p class="text-xl mb-8">Driving Sustainable Innovation for a Better Future</p>
            <a href="{{ route('filament.auth.login') }}" class="bg-white text-green-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition">
                Get Started
            </a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <i class="fas fa-leaf text-5xl text-green-600 mb-4"></i>
                <h3 class="text-2xl font-bold mb-4">Sustainability First</h3>
                <p class="text-gray-600">Eco-friendly solutions designed for long-term impact.</p>
            </div>
            <div class="text-center p-6">
                <i class="fas fa-brain text-5xl text-green-600 mb-4"></i>
                <h3 class="text-2xl font-bold mb-4">Smart Innovation</h3>
                <p class="text-gray-600">Cutting-edge technology to solve real-world problems.</p>
            </div>
            <div class="text-center p-6">
                <i class="fas fa-handshake text-5xl text-green-600 mb-4"></i>
                <h3 class="text-2xl font-bold mb-4">Collaborative Approach</h3>
                <p class="text-gray-600">Partnering with visionaries to create change.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gray-100 py-16 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Innovate?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">Join The Rising Avocado community and be part of the sustainability revolution.</p>
            <a href="{{ route('filament.auth.login') }}" class="bg-green-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-green-700 transition">
                Start Your Journey
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 px-4">
        <div class="container mx-auto text-center">
            <p class="mb-4">&copy; {{ date('Y') }} The Rising Avocado. All rights reserved.</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="hover:text-green-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-green-400"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="hover:text-green-400"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>