<?php

test('file data perasaan ada dan valid', function () {
    // Tentukan path ke file
    $path = __DIR__ . '/../data/perasaan.json';

    // 1. Cek apakah file ada (exist)
    expect(file_exists($path))->toBeTrue();

    // 2. Baca isi file
    $content = file_get_contents($path);
    
    // 3. Decode JSON dan pastikan hasilnya adalah array
    $data = json_decode($content, true);
    expect($data)->toBeArray();

    // 4. Pastikan array tidak kosong
    expect($data)->not->toBeEmpty();
});