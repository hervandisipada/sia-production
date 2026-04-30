<div class="mb-6">
    <a href="<?= BASE_URL ?>bahan" class="text-stone-500 hover:text-brand-yellow flex items-center gap-2 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Bahan
    </a>
</div>

<div class="bg-white dark:bg-stone-800 rounded-3xl shadow-sm border border-stone-100 dark:border-stone-700/50 overflow-hidden p-8 max-w-2xl animate-fade-in">
    <h2 class="text-xl font-bold mb-6 text-stone-800 dark:text-stone-100 flex items-center gap-3">
        <div class="w-8 h-8 bg-brand-yellow rounded-lg flex items-center justify-center text-stone-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </div>
        Edit Data Bahan
    </h2>
    
    <form action="<?= BASE_URL ?>bahan/edit/<?= $bahan['id'] ?>" method="POST" class="space-y-6">
        <div>
            <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-2" for="nama">Nama Bahan</label>
            <input class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" id="nama" type="text" name="nama" value="<?= htmlspecialchars($bahan['nama']) ?>" required>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-2" for="stok">Stok Saat Ini</label>
                <input class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" id="stok" type="number" step="0.01" name="stok" value="<?= htmlspecialchars($bahan['stok']) ?>" required>
            </div>
            <div>
                <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-2" for="satuan">Satuan</label>
                <input class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" id="satuan" type="text" name="satuan" value="<?= htmlspecialchars($bahan['satuan']) ?>" required>
            </div>
        </div>

        <div>
            <label class="block text-stone-700 dark:text-stone-300 text-sm font-bold mb-2" for="harga_per_unit">Harga per Unit (Rp)</label>
            <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-stone-400 font-bold">Rp</span>
                <input class="w-full bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 rounded-xl py-3 pl-12 pr-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:ring-4 focus:ring-brand-yellow/10 focus:border-brand-yellow transition-all" id="harga_per_unit" type="number" name="harga_per_unit" value="<?= htmlspecialchars($bahan['harga_per_unit']) ?>" required>
            </div>
        </div>

        <div class="flex items-center justify-end pt-4">
            <button class="btn-primary w-full md:w-auto" type="submit">
                Update Bahan
            </button>
        </div>
    </form>
</div>

