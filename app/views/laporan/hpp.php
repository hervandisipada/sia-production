<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-stone-800 dark:text-stone-100">Laporan Harga Pokok Produksi (HPP)</h1>
            <p class="text-stone-500 dark:text-stone-400 text-sm">Analisis biaya bahan baku per unit produksi.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= BASE_URL ?>laporan/hpp?dari=<?= htmlspecialchars($dari) ?>&sampai=<?= htmlspecialchars($sampai) ?>&export=csv" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export CSV
            </a>
            <button onclick="window.print()" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-stone-100 dark:border-stone-700/50 p-6 print:hidden">
        <form action="<?= BASE_URL ?>laporan/hpp" method="GET" class="flex flex-col md:flex-row items-end gap-6">
            <input type="hidden" name="route" value="laporan/hpp">
            <div class="w-full md:w-auto space-y-2">
                <label class="block text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest ml-1">Rentang Periode</label>
                <div class="flex items-center gap-3">
                    <input type="date" name="dari" value="<?= htmlspecialchars($dari) ?>" class="w-full md:w-auto bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 border-2 rounded-xl py-2 px-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-brand-yellow transition-all">
                    <span class="text-stone-400 dark:text-stone-500 text-sm font-medium">s/d</span>
                    <input type="date" name="sampai" value="<?= htmlspecialchars($sampai) ?>" class="w-full md:w-auto bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 border-2 rounded-xl py-2 px-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-brand-yellow transition-all">
                </div>
            </div>
            <button type="submit" class="btn-primary w-full md:w-auto">
                Terapkan Filter
            </button>
        </form>
    </div>

    <!-- Data Table -->
    <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-stone-100 dark:border-stone-700/50 overflow-hidden">
        <div class="hidden print:block p-8 text-center border-b-2 border-stone-100">
            <h1 class="text-3xl font-black text-stone-900">Pawon Selaras</h1>
            <p class="text-stone-500 font-bold uppercase tracking-widest mt-1">Laporan Harga Pokok Produksi</p>
            <p class="text-sm text-stone-600 mt-2">Periode: <?= date('d/m/Y', strtotime($dari)) ?> - <?= date('d/m/Y', strtotime($sampai)) ?></p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 dark:bg-stone-900/50">
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50">Tanggal</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50">Menu</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-right">Total Biaya Bahan</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-center">Hasil Baik</th>
                        <th class="px-6 py-4 text-xs font-bold text-brand-yellow uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-right">HPP / Unit</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 dark:divide-stone-700/30">
                    <?php foreach ($data as $row): 
                        $hpp = $row['jumlah_baik'] > 0 ? ($row['total_biaya'] / $row['jumlah_baik']) : 0;
                    ?>
                    <tr class="hover:bg-stone-50/50 dark:hover:bg-stone-900/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-stone-600 dark:text-stone-400 font-medium"><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                        <td class="px-6 py-4 text-sm text-stone-800 dark:text-stone-200 font-bold"><?= htmlspecialchars($row['nama_menu']) ?></td>
                        <td class="px-6 py-4 text-sm text-stone-700 dark:text-stone-300 text-right font-medium">Rp<?= number_format($row['total_biaya'] ?? 0, 0, ',', '.') ?></td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-300 px-2 py-1 rounded-lg font-bold text-xs"><?= htmlspecialchars($row['jumlah_baik']) ?></span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-sm font-black text-brand-yellow">Rp<?= number_format($hpp, 0, ',', '.') ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-stone-400 dark:text-stone-500 font-medium italic">Tidak ada data untuk periode ini.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

