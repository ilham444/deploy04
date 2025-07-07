<?php
// --- LOGIKA PHP UNTUK HALAMAN BERANDA ---

// 1. Baca data perasaan (sudah ada)
$perasaan_data_json = file_get_contents('data/perasaan.json');
$perasaan_data = json_decode($perasaan_data_json, true);

// 2. Pilih 3 perasaan acak untuk ditampilkan (sudah ada)
$jumlah_untuk_ditampilkan = min(3, count($perasaan_data));
$kunci_acak = ($jumlah_untuk_ditampilkan > 0) ? array_rand($perasaan_data, $jumlah_untuk_ditampilkan) : [];
$perasaan_pilihan = [];
if (!empty($kunci_acak)) {
    if (is_array($kunci_acak)) {
        foreach ($kunci_acak as $kunci) {
            $perasaan_pilihan[] = $perasaan_data[$kunci];
        }
    } else {
        $perasaan_pilihan[] = $perasaan_data[$kunci_acak];
    }
}

// 3. Ambil satu cerita acak dari Dinding Rasa (LOGIKA BARU)
$random_kiriman = null;
$kiriman_json_path = 'data/kiriman.json';
if (file_exists($kiriman_json_path)) {
    $kiriman_json = file_get_contents($kiriman_json_path);
    $semua_kiriman = json_decode($kiriman_json, true);
    if (!empty($semua_kiriman) && is_array($semua_kiriman)) {
        $random_kiriman = $semua_kiriman[array_rand($semua_kiriman)];
    }
}
?>

<!-- === KONTEN HTML YANG DI-UPGRADE === -->

<!-- Hero Section dengan Efek Ketikan -->
<div class="text-center py-16 md:py-24">
    <!-- Judul akan diisi oleh JavaScript -->
    <h1 id="typewriter-text" class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight h-16 md:h-20"></h1>
    <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600 reveal-on-scroll">Apapun yang kamu rasakan, itu valid. Kenali perasaanmu lebih dalam di sini.</p>
</div>

<!-- Quick Choices Section dengan Efek Hover Lebih Baik -->
<div class="bg-white/70 backdrop-blur-sm p-6 md:p-8 rounded-2xl shadow-lg my-12 reveal-on-scroll">
    <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Mungkin salah satu dari ini?</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($perasaan_pilihan as $rasa): ?>
            <a href="index.php?page=detail_rasa&id=<?= urlencode($rasa['id']) ?>" class="block bg-gray-50 p-6 rounded-xl text-center transform hover:-translate-y-2 transition-all duration-300 shadow-md hover:shadow-xl hover:shadow-blue-300/50 hover:ring-2 hover:ring-blue-400">
                <span class="text-5xl"><?= htmlspecialchars($rasa['emoji']) ?></span>
                <h4 class="mt-4 text-xl font-bold text-blue-600"><?= htmlspecialchars($rasa['nama']) ?></h4>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-8">
        <a href="index.php?page=jelajahi" class="font-semibold text-blue-600 hover:text-blue-800 transition-colors">Jelajahi semua rasa →</a>
    </div>
</div>

<!-- Bagian Cerita Unggulan dari Dinding Rasa (BARU) -->
<?php if ($random_kiriman): ?>
<div class="my-16 reveal-on-scroll">
    <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Sebuah Cerita dari Komunitas</h3>
    <div class="max-w-3xl mx-auto bg-white/70 backdrop-blur-sm p-6 rounded-xl shadow-lg border-l-4 border-green-400">
        <p class="text-gray-700 italic leading-relaxed">"<?= nl2br(htmlspecialchars($random_kiriman['cerita'])) ?>"</p>
        <div class="text-right mt-4 text-sm text-gray-500 font-semibold">
            - <?= htmlspecialchars($random_kiriman['nama']) ?>
        </div>
    </div>
</div>
<?php endif; ?>


<!-- CTA Box (Desain Ditingkatkan) -->
<div class="bg-white p-8 rounded-2xl shadow-xl text-center my-12 reveal-on-scroll">
    <h2 class="text-3xl font-bold text-gray-800">Ruang Amanmu Menanti</h2>
    <p class="mt-2 text-gray-600 max-w-xl mx-auto">Kamu tidak sendirian. Bagikan ceritamu secara anonim atau baca tulisan lain untuk merasa terhubung.</p>
    <div class="mt-6 flex justify-center space-x-4">
        <a href="index.php?page=tuangkan" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1">Tuangkan Rasamu</a>
        <a href="index.php?page=dinding" class="bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1">Lihat Dinding Rasa</a>
    </div>
</div>