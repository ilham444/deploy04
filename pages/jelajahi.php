<?php
// Baca data perasaan
$perasaan_data_json = file_get_contents('data/perasaan.json');
$semua_perasaan = json_decode($perasaan_data_json, true);

// Dapatkan daftar kategori unik untuk tombol filter
$kategori_unik = array_unique(array_column($semua_perasaan, 'kategori'));
sort($kategori_unik); // Urutkan kategori secara alfabetis

// Kelompokkan perasaan berdasarkan kategori untuk ditampilkan
$rasa_per_kategori = [];
foreach ($semua_perasaan as $rasa) {
    $rasa_per_kategori[$rasa['kategori']][] = $rasa;
}
?>

<!-- Container utama untuk dikontrol JS -->
<div id="jelajahi-container">
    
    <!-- Header dan Form Pencarian -->
    <div class="text-center mb-8 reveal-on-scroll">
        <h2 class="text-4xl font-extrabold text-gray-800">Jelajahi Dunia Perasaan</h2>
        <p class="mt-2 text-lg text-gray-600">Temukan, kenali, dan pahami lebih dalam.</p>
        
        <div class="mt-6 max-w-lg mx-auto">
            <input type="text" id="search-input" placeholder="Cari perasaan seperti 'kecewa', 'tenang'..." class="w-full px-5 py-3 rounded-full border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        </div>
    </div>

    <!-- Tombol Filter Kategori (BARU) -->
    <div class="flex flex-wrap justify-center gap-2 md:gap-4 mb-12 reveal-on-scroll">
        <button class="filter-btn bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-semibold transition-colors" data-kategori="Semua">Semua</button>
        <?php foreach ($kategori_unik as $kategori): ?>
            <button class="filter-btn bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-semibold hover:bg-blue-100 transition-colors" data-kategori="<?= htmlspecialchars($kategori) ?>"><?= htmlspecialchars($kategori) ?></button>
        <?php endforeach; ?>
    </div>

    <!-- Galeri Perasaan dengan Kontrol Animasi -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6">
        <?php foreach ($semua_perasaan as $rasa): ?>
            <!-- Setiap kartu dibungkus div untuk kontrol animasi -->
            <div class="rasa-card-container mb-6"> 
                <a href="index.php?page=detail_rasa&id=<?= urlencode($rasa['id']) ?>" 
                   class="rasa-card block bg-white p-6 rounded-xl text-center transform hover:-translate-y-2 transition-all duration-300 shadow-lg hover:shadow-2xl hover:shadow-blue-300/50"
                   data-nama="<?= htmlspecialchars($rasa['nama']) ?>"
                   data-kategori="<?= htmlspecialchars($rasa['kategori']) ?>">
                    <span class="text-5xl"><?= htmlspecialchars($rasa['emoji']) ?></span>
                    <h4 class="mt-4 text-xl font-bold text-blue-600"><?= htmlspecialchars($rasa['nama']) ?></h4>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pesan "Tidak Ada Hasil" (BARU) -->
    <div id="no-results-message" class="hidden text-center bg-white p-8 rounded-xl shadow-md">
        <h3 class="text-2xl font-bold text-gray-700">Oops, tidak ada yang ditemukan</h3>
        <p class="text-gray-500 mt-2">Coba ganti filter atau kata kunci pencarianmu.</p>
    </div>

</div>