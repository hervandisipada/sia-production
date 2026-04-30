<div class="space-y-6 animate-fade-in">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 print:hidden">
        <div>
            <h1 class="text-2xl font-bold text-stone-800">Laporan Produksi</h1>
            <p class="text-stone-500 text-sm">Pemantauan hasil produksi dan efisiensi operasional.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= BASE_URL ?>laporan/produksi?dari=<?= htmlspecialchars($dari) ?>&sampai=<?= htmlspecialchars($sampai) ?>&export=csv" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export CSV
            </a>
            <button onclick="window.print()" class="btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan
            </button>
        </div>

    </div>

    <!-- Filters Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 print:hidden">
        <form action="<?= BASE_URL ?>laporan/produksi" method="GET" class="flex flex-col md:flex-row items-end gap-6">
            <input type="hidden" name="route" value="laporan/produksi">
            <div class="w-full md:w-auto space-y-2">
                <label class="block text-xs font-bold text-stone-500 uppercase tracking-widest ml-1">Rentang Tanggal</label>
                <div class="flex items-center gap-3">
                    <input type="date" name="dari" value="<?= htmlspecialchars($dari) ?>" class="w-full md:w-auto bg-stone-50 border-stone-200 border-2 rounded-xl py-2 px-4 text-sm text-stone-800 focus:outline-none focus:border-brand-yellow transition-all">
                    <span class="text-stone-400 text-sm font-medium">s/d</span>
                    <input type="date" name="sampai" value="<?= htmlspecialchars($sampai) ?>" class="w-full md:w-auto bg-stone-50 border-stone-200 border-2 rounded-xl py-2 px-4 text-sm text-stone-800 focus:outline-none focus:border-brand-yellow transition-all">
                </div>
            </div>
            <button type="submit" class="btn-primary w-full md:w-auto">
                Terapkan Filter
            </button>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
        <!-- Print Only Header -->
        <div class="hidden print:block p-8 text-center border-b-2 border-stone-100">
            <h1 class="text-3xl font-black text-stone-900">Pawon Selaras</h1>
            <p class="text-stone-500 font-bold uppercase tracking-widest mt-1">Laporan Produksi</p>
            <div class="mt-4 flex justify-center gap-4 text-sm text-stone-600">
                <p>Periode: <span class="font-bold text-stone-900"><?= date('d/m/Y', strtotime($dari)) ?></span> s/d <span class="font-bold text-stone-900"><?= date('d/m/Y', strtotime($sampai)) ?></span></p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50/50">
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 uppercase tracking-widest border-b border-stone-100">Tanggal</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 uppercase tracking-widest border-b border-stone-100">Item Menu</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 uppercase tracking-widest border-b border-stone-100 text-center">Rencana</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 uppercase tracking-widest border-b border-stone-100 text-center">Hasil Baik</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 uppercase tracking-widest border-b border-stone-100 text-center text-rose-500">Waste</th>
                        <th class="px-6 py-4 text-xs font-bold text-stone-500 uppercase tracking-widest border-b border-stone-100">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-50">
                    <?php foreach ($data as $row): ?>
                    <tr class="hover:bg-stone-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="text-sm font-semibold text-stone-800"><?= date('d M Y', strtotime($row['tanggal'])) ?></p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-stone-700"><?= htmlspecialchars($row['nama_menu']) ?></p>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center min-w-[32px] px-2 py-1 bg-stone-100 rounded-lg text-sm font-bold text-stone-600">
                                <?= htmlspecialchars($row['jumlah_rencana']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-bold text-emerald-600">
                                <?= $row['jumlah_baik'] !== null ? htmlspecialchars($row['jumlah_baik']) : '-' ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-bold text-rose-500">
                                <?= $row['jumlah_rusak'] !== null ? htmlspecialchars($row['jumlah_rusak']) : '-' ?>
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <?php 
                            $status_class = '';
                            switch($row['status']) {
                                case 'selesai': $status_class = 'bg-emerald-50 text-emerald-600 border-emerald-100'; break;
                                case 'produksi': $status_class = 'bg-stone-50 text-brand-yellow border-yellow-100'; break;
                                default: $status_class = 'bg-stone-100 text-stone-600 border-stone-200';
                            }
                            ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold uppercase border <?= $status_class ?>">
                                <?= htmlspecialchars($row['status']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($data)): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-stone-200" fill="none" viewBox="24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-stone-400 font-medium">Tidak ada data laporan untuk periode ini.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Additional Links -->
    <div class="flex flex-wrap items-center gap-4 py-4 print:hidden">
        <a href="<?= BASE_URL ?>laporan/hpp" class="group flex items-center gap-2 bg-stone-50 text-yellow-700 px-4 py-2 rounded-xl text-sm font-bold hover:bg-yellow-100 transition-all">
            Laporan HPP
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
        <a href="<?= BASE_URL ?>laporan/waste" class="group flex items-center gap-2 bg-rose-50 text-rose-700 px-4 py-2 rounded-xl text-sm font-bold hover:bg-rose-100 transition-all">
            Laporan Waste
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</div>

<style>
@media print {
    @page { margin: 2cm; }
    body { background: white; }
    .animate-fade-in { animation: none; transform: none; }
}
</style>

