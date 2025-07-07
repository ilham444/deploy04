<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg reveal-on-scroll">
    <div class="text-center">
        <h2 class="text-3xl font-bold text-gray-800">Tuangkan Rasamu</h2>
        <p class="mt-2 text-gray-600">Tuliskan apa saja yang ada di pikiranmu. Semuanya anonim dan aman.</p>
    </div>
    
    <!-- Beri ID pada form untuk JavaScript -->
    <form id="tuangkan-form" class="mt-8 space-y-6">
        <div>
            <label for="nama_samaran" class="block text-sm font-medium text-gray-700">Nama Samaran (Opsional)</label>
            <input type="text" id="nama_samaran" name="nama_samaran" placeholder="Contoh: Sang Pengelana" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="cerita" class="block text-sm font-medium text-gray-700">Ceritamu</label>
            <textarea id="cerita" name="cerita" rows="6" placeholder="Hari ini aku merasa..." required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Kirim Cerita
            </button>
        </div>
    </form>
    
    <!-- Container untuk pesan sukses/error dari JavaScript -->
    <div id="form-message" class="mt-4 text-center"></div>
</div>