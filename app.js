// File: app.js
const express = require('express');
const app = express();
const port = 3000;

// "Database" perasaan dalam bentuk objek JSON
const dataPerasaan = {
    "senang": {
        nama: "Senang",
        deskripsi: "Perasaan gembira dan sukacita yang timbul saat keinginan tercapai atau mengalami hal positif.",
        saran_aktivitas: "Bagikan kebahagiaanmu dengan orang lain atau tuliskan tiga hal yang membuatmu bersyukur hari ini."
    },
    "sedih": {
        nama: "Sedih",
        deskripsi: "Perasaan duka atau tidak bahagia yang disebabkan oleh kehilangan, kekecewaan, atau penderitaan.",
        saran_aktivitas: "Tidak apa-apa untuk merasa sedih. Coba dengarkan musik yang menenangkan atau bicaralah dengan teman yang kamu percaya."
    },
    "marah": {
        nama: "Marah",
        deskripsi: "Emosi kuat yang ditandai dengan perasaan tidak suka, frustrasi, atau permusuhan.",
        saran_aktivitas: "Ambil napas dalam-dalam sebanyak 10 kali. Coba alihkan energimu dengan berolahraga ringan atau menuliskan apa yang membuatmu marah."
    },
    "semangat": {
        nama: "Semangat",
        deskripsi: "Perasaan antusiasme, energi, dan tekad yang kuat untuk melakukan sesuatu.",
        saran_aktivitas: "Ini adalah waktu yang tepat untuk memulai proyek baru atau mengerjakan tugas yang menantang. Manfaatkan energimu!"
    }
};

// Endpoint 1: Halaman utama
app.get('/', (req, res) => {
    // PENTING: GANTI DENGAN NIM ANDA
    res.status(200).send('Selamat Datang di API Mendalami Rasa (Perasaan)!');
});

// Endpoint 2: Dapatkan semua nama perasaan
app.get('/perasaan', (req, res) => {
    res.status(200).json(Object.keys(dataPerasaan));
});

// Endpoint 3: Dapatkan detail perasaan spesifik
app.get('/perasaan/:nama', (req, res) => {
    const namaPerasaan = req.params.nama.toLowerCase();
    if (dataPerasaan[namaPerasaan]) {
        res.status(200).json(dataPerasaan[namaPerasaan]);
    } else {
        res.status(404).json({ message: 'Perasaan tidak dikenali' });
    }
});

// Baris ini penting agar aplikasi bisa dites tanpa harus menyalakan server
if (require.main === module) {
  app.listen(port, () => {
    console.log(`Aplikasi berjalan di http://localhost:${port}`);
  });
}

// Ekspor app untuk digunakan oleh file test
module.exports = app;