<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mendalami Rasa</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Menambahkan font kustom ke Tailwind */
        body { font-family: 'Quicksand', sans-serif; }
        /* Animasi untuk scroll-reveal */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        .rasa-card-container {
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .rasa-card-container.is-hidden {
            opacity: 0;
            transform: scale(0.9);
            /* Kita tidak menggunakan display:none agar animasi bisa berjalan */
            /* Untuk memastikan tidak bisa di-klik, kita atur pointer-events */
            pointer-events: none; 
            /* Mengatur tinggi agar layout tidak "melompat" saat disembunyikan */
            max-height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
        /* Menambahkan font kustom ke Tailwind */
        body { font-family: 'Quicksand', sans-serif; }
        
        /* Animasi untuk scroll-reveal */
        /* ... (kode ini sudah ada) ... */

        /* --- KODE BARU DIMULAI DI SINI --- */

        /* 1. Keyframes untuk animasi gradien di background */
        @keyframes gradient-move {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 2. Class untuk menerapkan animasi gradien */
        .animate-gradient-move {
            background-size: 200% 200%;
            animation: gradient-move 15s ease infinite;
        }

        /* 3. Keyframes untuk kursor ketikan yang berkedip */
        @keyframes blink {
            50% { border-color: transparent; }
        }

        /* 4. Class untuk kursor ketikan */
        .typewriter-cursor {
            border-right: 3px solid #3b82f6; /* Warna kursor (biru) */
            animation: blink 0.75s step-end infinite;
        }

        /* --- KODE BARU BERAKHIR DI SINI --- */
    </style>
    </style>
</head>
<body class="bg-gray-50 text-gray-700">
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold text-blue-600">Mendalami Rasa</a>
            
            <!-- Menu Desktop -->
            <ul class="hidden md:flex items-center space-x-6">
                <li><a href="index.php?page=home" class="hover:text-blue-600 transition-colors">Beranda</a></li>
                <li><a href="index.php?page=jelajahi" class="hover:text-blue-600 transition-colors">Jelajahi Rasa</a></li>
                <li><a href="index.php?page=tuangkan" class="hover:text-blue-600 transition-colors">Tuangkan Rasamu</a></li>
                <li><a href="index.php?page=dinding" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition-colors">Dinding Rasa</a></li>
            </ul>

            <!-- Tombol Menu Mobile -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </nav>
        
        <!-- Menu Mobile (Tersembunyi) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <a href="index.php?page=home" class="block py-2 px-6 text-sm hover:bg-gray-100">Beranda</a>
            <a href="index.php?page=jelajahi" class="block py-2 px-6 text-sm hover:bg-gray-100">Jelajahi Rasa</a>
            <a href="index.php?page=tuangkan" class="block py-2 px-6 text-sm hover:bg-gray-100">Tuangkan Rasamu</a>
            <a href="index.php?page=dinding" class="block py-2 px-6 text-sm hover:bg-gray-100">Dinding Rasa</a>
        </div>
    </header>
    <main class="container mx-auto px-6 py-8 md:py-12">