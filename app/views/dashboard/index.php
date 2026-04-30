<div class="space-y-8 animate-fade-in">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-stone-100">Selamat Datang Kembali, <?= $_SESSION['user']['name'] ?? 'User' ?>! 👋</h1>
            <p class="text-gray-500 dark:text-stone-400">Berikut adalah ringkasan aktivitas produksi Pawon Selaras hari ini.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-4 py-2 bg-white dark:bg-stone-800 rounded-xl shadow-sm border border-gray-100 dark:border-stone-700 text-sm font-medium text-gray-600 dark:text-stone-300 flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Sistem Online
            </span>
            <div class="text-right">
                <p class="text-sm font-semibold text-gray-800 dark:text-stone-100"><?= date('d F Y') ?></p>
                <p class="text-xs text-gray-500 dark:text-stone-400"><?= date('H:i') ?> WITA</p>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Menu Card -->
        <div class="group bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-gray-100 dark:border-stone-700/50 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/30 rounded-xl flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-brand-yellow bg-stone-50 dark:bg-stone-900 px-2 py-1 rounded-full">Katalog</span>
            </div>
            <h3 class="text-gray-500 dark:text-stone-400 text-sm font-medium">Total Menu Tersedia</h3>
            <div class="flex items-baseline gap-2 mt-1">
                <p class="text-3xl font-bold text-gray-800 dark:text-stone-100"><?= $total_menu ?></p>
                <p class="text-sm text-gray-400 dark:text-stone-500">Item</p>
            </div>
        </div>
        
        <!-- Bahan Baku Warning Card -->
        <div class="group bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-gray-100 dark:border-stone-700/50 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 <?= $total_bahan_warning > 0 ? 'bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 group-hover:bg-rose-600' : 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 group-hover:bg-emerald-600' ?> rounded-xl flex items-center justify-center group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <span class="text-xs font-medium <?= $total_bahan_warning > 0 ? 'text-rose-600 bg-rose-50 dark:bg-rose-900/30' : 'text-emerald-600 bg-emerald-50 dark:bg-emerald-900/30' ?> px-2 py-1 rounded-full">
                    <?= $total_bahan_warning > 0 ? 'Perlu Perhatian' : 'Stok Aman' ?>
                </span>
            </div>
            <h3 class="text-gray-500 dark:text-stone-400 text-sm font-medium">Peringatan Stok Bahan</h3>
            <div class="flex items-baseline gap-2 mt-1">
                <p class="text-3xl font-bold <?= $total_bahan_warning > 0 ? 'text-rose-600 dark:text-rose-400' : 'text-emerald-600 dark:text-emerald-400' ?>"><?= $total_bahan_warning ?></p>
                <p class="text-sm text-gray-400 dark:text-stone-500">Bahan Baku</p>
            </div>
            <?php if($total_bahan_warning > 0): ?>
                <p class="text-xs text-rose-500 mt-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Segera lakukan pengisian stok!
                </p>
            <?php else: ?>
                <p class="text-xs text-emerald-500 mt-2">Semua persediaan tercukupi.</p>
            <?php endif; ?>
        </div>

        <!-- Produksi Hari Ini Card -->
        <div class="group bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-gray-100 dark:border-stone-700/50 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-stone-50 dark:bg-stone-900 rounded-xl flex items-center justify-center text-brand-yellow group-hover:bg-brand-yellow group-hover:text-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-brand-yellow bg-stone-50 dark:bg-stone-900 px-2 py-1 rounded-full">Produksi</span>
            </div>
            <h3 class="text-gray-500 dark:text-stone-400 text-sm font-medium">Produksi Hari Ini</h3>
            <div class="flex items-baseline gap-2 mt-1">
                <p class="text-3xl font-bold text-gray-800 dark:text-stone-100"><?= $total_produksi ?></p>
                <p class="text-sm text-gray-400 dark:text-stone-500">Batch</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Quick Actions -->
        <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-gray-100 dark:border-stone-700/50 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800 dark:text-stone-100">Akses Cepat</h3>
                <span class="text-xs text-gray-400 dark:text-stone-500 font-medium uppercase tracking-wider">Navigasi Langsung</span>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <a href="<?= BASE_URL ?>produksi/tambah" class="flex flex-col items-center p-4 rounded-xl border border-gray-50 dark:border-stone-700/30 hover:bg-stone-50 dark:hover:bg-stone-900/50 hover:border-yellow-100 dark:hover:border-brand-yellow/30 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-yellow-100 dark:bg-brand-yellow/20 flex items-center justify-center text-brand-yellow mb-2 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-700 dark:text-stone-300">Mulai Produksi</span>
                </a>
                <a href="<?= BASE_URL ?>bahan/tambah" class="flex flex-col items-center p-4 rounded-xl border border-gray-50 dark:border-stone-700/30 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 hover:border-emerald-100 dark:hover:border-emerald-500/30 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-600 dark:text-emerald-400 mb-2 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-700 dark:text-stone-300">Tambah Bahan</span>
                </a>
                <a href="<?= BASE_URL ?>laporan/produksi" class="flex flex-col items-center p-4 rounded-xl border border-gray-50 dark:border-stone-700/30 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:border-purple-100 dark:hover:border-purple-500/30 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center text-purple-600 dark:text-purple-400 mb-2 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-700 dark:text-stone-300">Lihat Laporan</span>
                </a>
                <a href="<?= BASE_URL ?>menu" class="flex flex-col items-center p-4 rounded-xl border border-gray-50 dark:border-stone-700/30 hover:bg-sky-50 dark:hover:bg-sky-900/20 hover:border-sky-100 dark:hover:border-sky-500/30 transition-all group">
                    <div class="w-10 h-10 rounded-lg bg-sky-100 dark:bg-sky-900/30 flex items-center justify-center text-sky-600 dark:text-sky-400 mb-2 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <span class="text-sm font-semibold text-gray-700 dark:text-stone-300">Kelola Menu</span>
                </a>
            </div>
        </div>

        <!-- Latest Status -->
        <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-gray-100 dark:border-stone-700/50 p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-stone-100">Status Operasional</h3>
                    <div class="flex gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-stone-500"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-300"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-100"></span>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="p-4 bg-gray-50 dark:bg-stone-900 rounded-xl flex items-start gap-4">
                        <div class="mt-1 w-2 h-2 rounded-full bg-stone-500"></div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-stone-100">Sistem Akuntansi Siap</p>
                            <p class="text-xs text-gray-500 dark:text-stone-400 mt-0.5">Modul perhitungan HPP dan stok bahan baku berjalan normal.</p>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-stone-900 rounded-xl flex items-start gap-4">
                        <div class="mt-1 w-2 h-2 rounded-full bg-stone-500"></div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-stone-100">Pencatatan Produksi</p>
                            <p class="text-xs text-gray-500 dark:text-stone-400 mt-0.5">Pastikan setiap batch produksi dicatat untuk akurasi persediaan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 pt-6 border-t border-gray-50 dark:border-stone-700/50 flex items-center justify-between">
                <p class="text-xs text-gray-400 dark:text-stone-500">Terakhir diperbarui: <?= date('H:i:s') ?></p>
                <button class="text-xs font-bold text-brand-yellow hover:text-yellow-800 transition-colors uppercase tracking-widest">Muat Ulang</button>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fadeIn 0.5s ease-out forwards;
}
</style>

