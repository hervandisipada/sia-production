<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-stone-800 dark:text-stone-100">Laporan Waste Produksi</h1>
            <p class="text-stone-500 dark:text-stone-400 text-sm">Analisis kehilangan produk dan kendala kualitas.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= BASE_URL ?>laporan/waste?dari=<?= htmlspecialchars($dari) ?>&sampai=<?= htmlspecialchars($sampai) ?>&export=csv"
                class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export CSV
            </a>
            <button onclick="window.print()" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div
        class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-stone-100 dark:border-stone-700/50 p-6 print:hidden">
        <form action="<?= BASE_URL ?>laporan/waste" method="GET" class="flex flex-col md:flex-row items-end gap-6">
            <input type="hidden" name="route" value="laporan/waste">
            <div class="w-full md:w-auto space-y-2">
                <label
                    class="block text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest ml-1">Periode
                    Laporan</label>
                <div class="flex flex-col md:flex-row items-center gap-3 w-full">
                    <input type="date" name="dari" value="<?= htmlspecialchars($dari) ?>"
                        class="w-full md:w-auto bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 border-2 rounded-xl py-2 px-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-brand-yellow transition-all">
                    <span class="text-stone-400 dark:text-stone-500 text-sm font-medium">s/d</span>
                    <input type="date" name="sampai" value="<?= htmlspecialchars($sampai) ?>"
                        class="w-full md:w-auto bg-stone-50 dark:bg-stone-900 border-stone-200 dark:border-stone-700 border-2 rounded-xl py-2 px-4 text-sm text-stone-800 dark:text-stone-200 focus:outline-none focus:border-brand-yellow transition-all">
                </div>
            </div>
            <button type="submit" class="btn-primary w-full md:w-auto">
                Terapkan Filter
            </button>
        </form>
    </div>

    <!-- Data Table -->
    <div
        class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-stone-100 dark:border-stone-700/50 overflow-hidden">
        <div class="hidden print:block p-8 text-center border-b-2 border-stone-100">
            <h1 class="text-3xl font-black text-stone-900">Pawon Selaras</h1>
            <p class="text-stone-500 font-bold uppercase tracking-widest mt-1">Laporan Waste / Produk Rusak</p>
            <p class="text-sm text-stone-600 mt-2">Periode: <?= date('d/m/Y', strtotime($dari)) ?> -
                <?= date('d/m/Y', strtotime($sampai)) ?>
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 dark:bg-stone-900/50">
                        <th
                            class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50">
                            Tanggal Produksi</th>
                        <th
                            class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50">
                            Item Menu</th>
                        <th
                            class="px-6 py-4 text-xs font-bold text-rose-500 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-right">
                            Jumlah Rusak (Waste)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 dark:divide-stone-700/30">
                    <?php
                    $total_waste = 0;
                    foreach ($data as $row):
                        $total_waste += $row['jumlah_rusak'];
                        ?>
                        <tr class="hover:bg-rose-50/30 dark:hover:bg-rose-900/10 transition-colors">
                            <td class="px-6 py-4 text-sm text-stone-600 dark:text-stone-400 font-medium">
                                <?= date('d/m/Y', strtotime($row['tanggal'])) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-stone-800 dark:text-stone-200 font-bold">
                                <?= htmlspecialchars($row['nama_menu']) ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 text-sm font-black text-rose-600 dark:text-rose-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    <?= htmlspecialchars($row['jumlah_rusak']) ?> Unit
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="bg-stone-900 dark:bg-stone-950 text-white">
                        <td colspan="2" class="px-6 py-4 text-sm font-bold text-right uppercase tracking-wider">Total
                            Akumulasi Waste:</td>
                        <td class="px-6 py-4 text-right text-lg font-black text-rose-400"><?= $total_waste ?> Unit</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <?php if (empty($data)): ?>
            <div class="py-12 text-center text-stone-400 dark:text-stone-500 font-medium italic bg-white dark:bg-stone-800">
                Tidak ada laporan waste tercatat pada periode ini.
            </div>
        <?php endif; ?>
    </div>
</div>