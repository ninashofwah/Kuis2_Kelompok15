<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-indigo-700 text-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="font-bold text-xl tracking-tight">MANAGEMENT KOST</a>
            <div class="hidden md:flex space-x-6 text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="hover:text-indigo-200">Dashboard</a>
                <a href="{{ route('kamar.index') }}" class="hover:text-indigo-200">Kamar</a>
                <a href="{{ route('penyewa.index') }}" class="hover:text-indigo-200">Penyewa</a>
                <a href="{{ route('kontrak-sewa.index') }}" class="hover:text-indigo-200">Kontrak</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-10 px-6">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>