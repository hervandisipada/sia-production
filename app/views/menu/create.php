<div class="mb-6">
    <a href="<?= BASE_URL ?>menu" class="text-stone-500 hover:text-brand-yellow flex items-center gap-2 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Menu
    </a>
</div>

<div class="bg-white dark:bg-stone-800 rounded-3xl shadow-sm border border-stone-100 dark:border-stone-700/50 overflow-hidden p-8 max-w-4xl animate-fade-in">
    <h2 class="text-2xl font-black mb-8 text-stone-800 dark:text-stone-100 border-b border-stone-100 dark:border-stone-700 pb-4 flex items-center gap-3">
        <div class="w-10 h-10 bg-brand-yellow rounded-xl flex items-center justify-center text-stone-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        Informasi Menu Baru
    </h2>

    <form action="<?= BASE_URL ?>menu/create" method="POST" id="menuForm" class="space-y-8" enctype="multipart/form-data">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-1">
                <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-3">Foto Menu</label>
                <div class="relative group">
                    <div id="image-preview" class="aspect-square rounded-2xl bg-stone-50 dark:bg-stone-900 border-2 border-dashed border-stone-200 dark:border-stone-700 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-brand-yellow/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-stone-300 dark:text-stone-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-xs text-stone-400 font-medium">Pilih Foto (1:1)</span>
                    </div>
                    <input type="file" name="gambar" id="gambar" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" onchange="previewImage(this)">
                </div>
                <p class="mt-2 text-[10px] text-stone-400 text-center italic">*Rasio 1:1 direkomendasikan</p>
            </div>
            <div class="md:col-span-2 space-y-6">
                <div>
                    <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-3" for="kategori">Kategori Menu</label>
                    <select name="kategori" id="kategori" class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" required>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </div>
                <div>
                    <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-3" for="nama">Nama Menu</label>
                    <input class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" id="nama" type="text" name="nama" placeholder="Contoh: Nasi Goreng Spesial" required>
                </div>
                <div>
                    <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-3" for="harga_jual">Harga Jual (Rp)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 font-bold">Rp</span>
                        <input class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 pl-12 pr-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" id="harga_jual" type="number" name="harga_jual" placeholder="0" required>
                    </div>
                </div>
                <div class="flex flex-wrap gap-6 pt-2">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_best_seller" id="is_best_seller" value="1" class="w-5 h-5 rounded border-stone-300 text-brand-yellow focus:ring-brand-yellow">
                        <label for="is_best_seller" class="text-stone-700 dark:text-stone-300 text-sm font-bold cursor-pointer">Tandai sebagai Best Seller ⭐</label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_available" id="is_available" value="1" checked class="w-5 h-5 rounded border-stone-300 text-emerald-500 focus:ring-emerald-500">
                        <label for="is_available" class="text-stone-700 dark:text-stone-300 text-sm font-bold cursor-pointer">Menu Tersedia ✅</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-stone-100 dark:border-stone-700">
            <h3 class="text-lg font-bold mb-6 text-stone-800 dark:text-stone-100 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brand-yellow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                BOM / Resep Bahan Baku
            </h3>
            
            <div id="resep-container" class="space-y-4">
                <!-- Row resep -->
                <div class="flex flex-col md:flex-row items-end gap-4 p-4 bg-stone-50 dark:bg-stone-900/50 rounded-2xl border border-stone-100 dark:border-stone-700/50 resep-row group">
                    <div class="flex-1 w-full">
                        <label class="block text-stone-500 dark:text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2 ml-1">Pilih Bahan Baku</label>
                        <select name="bahan_id[]" class="w-full bg-white dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-2 px-3 text-stone-800 dark:text-stone-100 focus:outline-none focus:ring-2 focus:ring-brand-yellow/20 focus:border-brand-yellow transition-all text-sm">
                            <option value="">-- Pilih Bahan --</option>
                            <?php foreach($bahanList as $b): ?>
                                <option value="<?= $b['id'] ?>"><?= htmlspecialchars($b['nama']) ?> (<?= $b['satuan'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="w-full md:w-32">
                        <label class="block text-stone-500 dark:text-stone-400 text-[10px] font-bold uppercase tracking-widest mb-2 ml-1">Kuantitas</label>
                        <input type="number" step="0.01" name="qty[]" class="w-full bg-white dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-2 px-3 text-stone-800 dark:text-stone-100 focus:outline-none focus:ring-2 focus:ring-brand-yellow/20 focus:border-brand-yellow transition-all text-sm" placeholder="Qty">
                    </div>
                    <div class="pb-1">
                        <button type="button" class="w-10 h-10 flex items-center justify-center bg-rose-50 dark:bg-rose-900/20 text-rose-600 dark:text-rose-400 rounded-xl hover:bg-rose-100 dark:hover:bg-rose-900/40 transition-colors btn-remove-row">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="button" id="btn-add-row" class="inline-flex items-center gap-2 text-sm font-bold text-stone-500 hover:text-brand-yellow transition-colors bg-stone-100 dark:bg-stone-900 px-4 py-2 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Bahan Baku
                </button>
            </div>
        </div>

        <div class="flex items-center justify-end mt-12 pt-6 border-t border-stone-100 dark:border-stone-700">
            <button class="btn-primary w-full md:w-auto px-10" type="submit">
                Simpan Menu & Resep
            </button>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('resep-container');
    const btnAdd = document.getElementById('btn-add-row');

    btnAdd.addEventListener('click', function() {
        const row = document.querySelector('.resep-row').cloneNode(true);
        // Reset values
        row.querySelector('select').value = '';
        row.querySelector('input').value = '';
        container.appendChild(row);
    });

    container.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-row')) {
            const rows = container.querySelectorAll('.resep-row');
            if (rows.length > 1) {
                e.target.closest('.resep-row').remove();
            } else {
                alert('Minimal satu baris bahan (meskipun kosong tidak akan disimpan).');
            }
        }
    });
});
</script>

