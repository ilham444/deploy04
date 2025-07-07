<?php
// Default page
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Include header
include 'partials/header.php';

// Simple Router
// Memuat konten halaman berdasarkan parameter 'page'
$allowed_pages = ['home', 'jelajahi', 'detail_rasa', 'tuangkan', 'dinding'];
if (in_array($page, $allowed_pages)) {
    include 'pages/' . $page . '.php';
} else {
    // Jika halaman tidak ditemukan, tampilkan halaman home
    echo "<h2>Halaman tidak ditemukan</h2>";
    include 'pages/home.php';
}

// Include footer
include 'partials/footer.php';
?>