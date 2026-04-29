<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Laporan Stok Bahan Baku</h1>
            <p class="text-slate-500 text-sm">Rekapitulasi persediaan dan estimasi nilai aset gudang.</p>
        </div>
        <button onclick="window.print()" class="flex items-center gap-2 bg-white border border-slate-200 text-slate-700 px-4 py-2.5 rounded-xl font-semibold shadow-sm hover:bg-slate-50 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak untuk Opname
        </button>
    </div>

    <!-- Inventory Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="hidden print:block p-8 text-center border-b-2 border-slate-100">
            <h1 class="text-3xl font-black text-slate-900">RM Pawon Selaras</h1>
            <p class="text-slate-500 font-bold uppercase tracking-widest mt-1">Laporan Stok Opname Bahan Baku</p>
            <p class="text-sm text-slate-600 mt-2">Waktu Cetak: <?= date('d M Y, H:i') ?> WIB</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Nama Bahan</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100 text-center">Stok Sistem</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100">Satuan</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100 text-center hidden print:table-cell border-l">Stok Fisik</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest border-b border-slate-100 text-right">Nilai Aset</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php 
                    $total_nilai = 0;
                    foreach ($bahan as $row): 
                        $nilai = $row['stok'] * $row['harga_per_unit'];
                        $total_nilai += $nilai;
                    ?>
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-slate-800"><?= htmlspecialchars($row['nama']) ?></p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center min-w-[40px] px-2 py-1 bg-slate-100 rounded-lg text-sm font-black text-slate-700">
                                <?= htmlspecialchars($row['stok']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500 font-medium"><?= htmlspecialchars($row['satuan']) ?></td>
                        <td class="px-6 py-4 text-center hidden print:table-cell border-l border-slate-100 min-w-[120px]">
                            <div class="h-8 border-b border-slate-300 mx-4"></div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <p class="text-sm font-semibold text-slate-900">Rp <?= number_format($nilai, 0, ',', '.') ?></p>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr class="bg-slate-900 text-white">
                        <td colspan="<?= (isset($_GET['print']) || true) ? '3' : '3' ?>" class="px-6 py-5 text-sm font-bold text-right uppercase tracking-wider">Total Nilai Persediaan:</td>
                        <td class="hidden print:table-cell border-l border-slate-700"></td>
                        <td class="px-6 py-5 text-right text-lg font-black text-yellow-400">Rp <?= number_format($total_nilai, 0, ',', '.') ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <div class="hidden print:grid grid-cols-2 gap-12 mt-12 px-8">
        <div class="text-center">
            <p class="text-sm text-slate-500 mb-20">Dibuat Oleh,</p>
            <div class="border-b border-slate-400 w-48 mx-auto"></div>
            <p class="text-xs font-bold text-slate-800 mt-2">Admin Gudang</p>
        </div>
        <div class="text-center">
            <p class="text-sm text-slate-500 mb-20">Diketahui Oleh,</p>
            <div class="border-b border-slate-400 w-48 mx-auto"></div>
            <p class="text-xs font-bold text-slate-800 mt-2">Manager Produksi</p>
        </div>
    </div>
</div>
