<?php
// Set header ke JSON
header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Terjadi kesalahan.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_samaran = !empty($_POST['nama_samaran']) ? trim($_POST['nama_samaran']) : 'Anonim';
    $cerita = isset($_POST['cerita']) ? trim($_POST['cerita']) : '';
    
    if (empty($cerita)) {
        $response['message'] = 'Cerita tidak boleh kosong.';
    } else {
        $kiriman_baru = [
            'nama' => htmlspecialchars($nama_samaran),
            'cerita' => htmlspecialchars($cerita),
            'waktu' => date('d M Y, H:i')
        ];

        $file_path = 'data/kiriman.json';
        $data_lama = json_decode(file_get_contents($file_path), true);
        $data_lama[] = $kiriman_baru;

        if (file_put_contents($file_path, json_encode($data_lama, JSON_PRETTY_PRINT))) {
            $response['success'] = true;
            $response['message'] = 'Terima kasih telah berbagi. Ceritamu berhasil dikirim!';
        } else {
            $response['message'] = 'Gagal menyimpan cerita. Coba lagi nanti.';
        }
    }
}

// Kembalikan response dalam format JSON
echo json_encode($response);
exit();
?>