<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-stone-800 dark:text-stone-100">Laporan Stok Bahan Baku</h1>
            <p class="text-stone-500 dark:text-stone-400 text-sm">Rekapitulasi persediaan dan estimasi nilai aset gudang.</p>
        </div>
        <button onclick="window.print()" class="btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak untuk Opname
        </button>
    </div>

    <!-- Inventory Table -->
    <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-sm border border-stone-100 dark:border-stone-700/50 overflow-hidden">
        <div class="hidden print:block p-8 text-center border-b-2 border-stone-100">
            <h1 class="text-3xl font-black text-stone-900">Pawon Selaras</h1>
            <p class="text-stone-500 font-bold uppercase tracking-widest mt-1">Laporan Stok Opname Bahan Baku</p>
            <p class="text-sm text-stone-600 mt-2">Waktu Cetak: <?= date('d M Y, H:i') ?> WITA</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50 dark:bg-stone-900/50">
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50">Nama Bahan</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-center">Stok Sistem</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50">Satuan</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-center hidden print:table-cell border-l">Stok Fisik</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 dark:text-stone-400 uppercase tracking-widest border-b border-stone-100 dark:border-stone-700/50 text-right">Nilai Aset</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50 dark:divide-stone-700/30">
                    <?php 
                    $total_nilai = 0;
                    foreach ($bahan as $row): 
                        $nilai = $row['stok'] * $row['harga_per_unit'];
                        $total_nilai += $nilai;
                    ?>
                    <tr class="hover:bg-stone-50/50 dark:hover:bg-stone-900/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-stone-800 dark:text-stone-200"><?= htmlspecialchars($row['nama']) ?></p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center min-w-[40px] px-2 py-1 bg-stone-100 dark:bg-stone-700 rounded-lg text-sm font-black text-stone-700 dark:text-stone-300">
                                <?= htmlspecialchars($row['stok']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-stone-500 dark:text-stone-400 font-medium"><?= htmlspecialchars($row['satuan']) ?></td>
                        <td class="px-6 py-4 text-center hidden print:table-cell border-l border-stone-100 min-w-[120px]">
                            <div class="h-8 border-b border-stone-300 mx-4"></div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <p class="text-sm font-semibold text-stone-900 dark:text-stone-100">Rp<?= number_format($nilai, 0, ',', '.') ?></p>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="bg-stone-900 dark:bg-stone-950 text-white">
                        <td colspan="<?= (isset($_GET['print']) || true) ? '3' : '3' ?>" class="px-6 py-5 text-sm font-bold text-right uppercase tracking-wider">Total Nilai Persediaan:</td>
                        <td class="hidden print:table-cell border-l border-stone-700"></td>
                        <td class="px-6 py-5 text-right text-lg font-black text-brand-yellow">Rp<?= number_format($total_nilai, 0, ',', '.') ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <div class="hidden print:grid grid-cols-2 gap-12 mt-12 px-8">
        <div class="text-center">
            <p class="text-sm text-stone-500 mb-20">Dibuat Oleh,</p>
            <div class="border-b border-stone-400 w-48 mx-auto"></div>
            <p class="text-xs font-bold text-stone-800 mt-2">Admin Gudang</p>
        </div>
        <div class="text-center">
            <p class="text-sm text-stone-500 mb-20">Diketahui Oleh,</p>
            <div class="border-b border-stone-400 w-48 mx-auto"></div>
            <p class="text-xs font-bold text-stone-800 mt-2">Manager Produksi</p>
        </div>
    </div>
</div>

