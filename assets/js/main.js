document.addEventListener('DOMContentLoaded', () => {

    // 1. Logika untuk Menu Mobile (Hamburger Menu)
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // 2. Logika untuk Animasi Saat Scroll (Intersection Observer)
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, {
        threshold: 0.1 // Elemen dianggap terlihat jika 10% areanya masuk viewport
    });

    const revealElements = document.querySelectorAll('.reveal-on-scroll');
    revealElements.forEach(el => observer.observe(el));

   // ... di dalam file assets/js/main.js di dalam DOMContentLoaded ...

    // --- GANTI SELURUH LOGIKA JELAJAHI YANG LAMA DENGAN INI ---

    // 3. Logika Interaktif untuk Halaman Jelajahi (Filter & Pencarian)
    const jelajahiPage = document.getElementById('jelajahi-container');
    if (jelajahiPage) {
        const searchInput = document.getElementById('search-input');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const rasaCards = document.querySelectorAll('.rasa-card-container');
        const noResultsMessage = document.getElementById('no-results-message');

        let activeCategory = 'Semua';
        let searchTerm = '';

        // Fungsi utama untuk mengupdate tampilan galeri
        const updateView = () => {
            let visibleCount = 0;
            rasaCards.forEach(cardContainer => {
                const card = cardContainer.querySelector('.rasa-card');
                const cardCategory = card.dataset.kategori;
                const cardNama = card.dataset.nama.toLowerCase();
                
                const categoryMatch = activeCategory === 'Semua' || activeCategory === cardCategory;
                const searchMatch = cardNama.includes(searchTerm);

                if (categoryMatch && searchMatch) {
                    cardContainer.classList.remove('is-hidden');
                    visibleCount++;
                } else {
                    cardContainer.classList.add('is-hidden');
                }
            });

            // Tampilkan pesan jika tidak ada hasil
            if (visibleCount === 0) {
                noResultsMessage.classList.remove('hidden');
            } else {
                noResultsMessage.classList.add('hidden');
            }
        };

        // Event listener untuk tombol filter
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update kategori aktif
                activeCategory = button.dataset.kategori;
                
                // Update tampilan tombol yang aktif
                filterButtons.forEach(btn => btn.classList.remove('bg-blue-600', 'text-white'));
                button.classList.add('bg-blue-600', 'text-white');
                
                // Panggil fungsi update
                updateView();
            });
        });

        // Event listener untuk input pencarian
        searchInput.addEventListener('input', (e) => {
            searchTerm = e.target.value.toLowerCase();
            updateView();
        });
    }

    // --- AKHIR DARI LOGIKA JELAJAHI ---
// 5. Logika untuk Efek Ketikan (Typewriter) di Halaman Beranda
    const typewriterElement = document.getElementById('typewriter-text');
    if (typewriterElement) {
        const text = "Bagaimana perasaanmu hari ini?";
        let index = 0;
        
        function type() {
            if (index < text.length) {
                typewriterElement.innerHTML += text.charAt(index);
                index++;
                setTimeout(type, 100); // Kecepatan ketikan (ms)
            } else {
                // Tambahkan kursor setelah selesai mengetik
                typewriterElement.classList.add('typewriter-cursor');
            }
        }
        
        type(); // Mulai efek ketikan
    }

    // 4. Logika untuk Formulir "Tuangkan Rasamu" via AJAX (Fetch API)
    const tuangkanForm = document.getElementById('tuangkan-form');
    
    if (tuangkanForm) {
        const formMessage = document.getElementById('form-message');
        const submitButton = tuangkanForm.querySelector('button[type="submit"]');

        tuangkanForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah form dari refresh halaman
            
            const formData = new FormData(this);
            const originalButtonText = submitButton.innerHTML;

            // Tampilkan status "loading"
            submitButton.disabled = true;
            submitButton.innerHTML = 'Mengirim...';
            formMessage.innerHTML = '';

            fetch('proses_kiriman.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    formMessage.innerHTML = `<p class="text-green-600 font-semibold">${data.message}</p>`;
                    tuangkanForm.reset(); // Kosongkan form setelah berhasil
                } else {
                    formMessage.innerHTML = `<p class="text-red-600 font-semibold">${data.message}</p>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                formMessage.innerHTML = `<p class="text-red-600 font-semibold">Terjadi kesalahan. Coba lagi nanti.</p>`;
            })
            .finally(() => {
                // Kembalikan tombol ke keadaan semula
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonText;
            });
        });
    }
});