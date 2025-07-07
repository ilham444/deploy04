<?php /* ... (Logika PHP di atas tetap sama) ... */ ?>

<div class="text-center mb-12 reveal-on-scroll">
    <h2 class="text-4xl font-extrabold text-gray-800">Dinding Rasa</h2>
    <p class="mt-2 max-w-2xl mx-auto text-lg text-gray-600">Kamu tidak sendirian. Berikut adalah cerita-cerita dari mereka yang juga merasakan.</p>
</div>

<div class="space-y-6 max-w-3xl mx-auto">
    <?php if (empty($semua_kiriman)): ?>
        <div class="bg-white p-8 rounded-xl shadow-lg text-center reveal-on-scroll">
            <p class="text-gray-600">Belum ada cerita yang dibagikan. Jadilah yang pertama!</p>
            <a href="index.php?page=tuangkan" class="mt-4 inline-block bg-blue-500 text-white px-5 py-2 rounded-full hover:bg-blue-600 transition-colors font-semibold">Tuangkan Rasamu</a>
        </div>
    <?php else: ?>
        <?php foreach ($semua_kiriman as $kiriman): ?>
            <div class="bg-white p-6 rounded-lg shadow-lg border-l-4 border-green-400 reveal-on-scroll">
                <p class="text-gray-700 leading-relaxed whitespace-pre-wrap"><?= nl2br(htmlspecialchars($kiriman['cerita'])) ?></p>
                <div class="text-right mt-4 text-sm text-gray-500 font-semibold">
                    - <?= htmlspecialchars($kiriman['nama']) ?>, <span class="text-gray-400 font-normal"><?= htmlspecialchars($kiriman['waktu']) ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>