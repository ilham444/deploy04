<?php
// Ambil ID dari URL
$rasa_id = isset($_GET['id']) ? $_GET['id'] : '';

// Baca data
$perasaan_data_json = file_get_contents('data/perasaan.json');
$semua_perasaan = json_decode($perasaan_data_json, true);

// Cari perasaan yang sesuai dengan ID
$detail_rasa = null;
foreach ($semua_perasaan as $rasa) {
    if ($rasa['id'] === $rasa_id) {
        $detail_rasa = $rasa;
        break;
    }
}
?>

<?php if ($detail_rasa): ?>
    <div class="card detail-rasa">
        <span class="emoji"><?= htmlspecialchars($detail_rasa['emoji']) ?></span>
        <h2><?= htmlspecialchars($detail_rasa['nama']) ?></h2>
        <p><?= htmlspecialchars($detail_rasa['deskripsi']) ?></p>

        <div class="section">
            <h4>Kutipan Terkait</h4>
            <?php foreach ($detail_rasa['kutipan'] as $kutipan): ?>
                <blockquote><?= htmlspecialchars($kutipan) ?></blockquote>
            <?php endforeach; ?>
        </div>

        <div class="section">
            <h4>Aktivitas yang Bisa Dicoba</h4>
            <ul>
                <?php foreach ($detail_rasa['aktivitas'] as $aktivitas): ?>
                    <li><?= htmlspecialchars($aktivitas) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php else: ?>
    <div class="card">
        <h2>Oops! Rasa tidak ditemukan.</h2>
        <p>Mungkin kamu bisa kembali ke halaman <a href="index.php?page=jelajahi">Jelajahi Rasa</a> untuk menemukan yang lain.</p>
    </div>
<?php endif; ?>