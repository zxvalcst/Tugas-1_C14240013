<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas Kristen Petra</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Source Sans 3', sans-serif; }
        h1, h2, h3 { font-family: 'Verdana', serif; }
    </style>
</head>
{{-- Auto dismiss alert setelah 3 detik --}}
<script>
    // Cari semua elemen dengan id yang mengandung 'alert'
    setTimeout(function() {
        const alerts = document.querySelectorAll('[id^="alert-"]');
        alerts.forEach(function(alert) {
            // Fade out perlahan
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            // Hapus dari DOM setelah animasi selesai
            setTimeout(function() {
                alert.style.display = 'none';
            }, 500);
        });
    }, 3000); // 3000ms = 3 detik
</script>
<body class="bg-white text-gray-800">
    <!-- navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- logo petra, klo diklik ngelink ke home -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="text-blue-900 font-bold text-xl" style="font-family: 'Lora', serif;">
                    UK Petra
                </span>
            </a>

            <!-- menu home dan facility -->
            <div class="flex items-center gap-8 mr-2">
                <a href="{{ route('home') }}"
                   class="text-sm font-semibold tracking-wide transition-colors duration-200
                          {{ request()->routeIs('home') 
                             ? 'text-blue-700 border-b-2 border-blue-700 pb-1' 
                             : 'text-gray-600 hover:text-blue-700' }}">
                    HOME
                </a>

                <a href="{{ route('facility') }}"
                   class="text-sm font-semibold tracking-wide transition-colors duration-200
                          {{ request()->routeIs('facility') 
                             ? 'text-blue-700 border-b-2 border-blue-700 pb-1' 
                             : 'text-gray-600 hover:text-blue-700' }}">
                    FACILITY
                </a>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-blue-900 text-white mt-16">

        <div class="border-t border-blue-800 py-4 text-center text-blue-300 text-xs">
            © 2026 Universitas Kristen Petra by C14240013. All rights reserved.
        </div>
    </footer>

</body>
</html>