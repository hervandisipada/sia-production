<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-stone-100">Bahan Baku</h2>
    <a href="<?= BASE_URL ?>bahan/create" class="btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Bahan
    </a>
</div>

<div class="bg-white dark:bg-stone-800 rounded-lg shadow overflow-hidden border border-transparent dark:border-stone-700/50">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Nama Bahan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Stok</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Satuan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Harga/Unit</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bahan as $row): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="text-gray-900 dark:text-stone-100 whitespace-no-wrap"><?= htmlspecialchars($row['nama']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="whitespace-no-wrap 
                        <?= $row['stok'] < 10 ? 'text-rose-600 dark:text-rose-400 font-bold' : 'text-gray-900 dark:text-stone-100' ?>">
                        <?= htmlspecialchars($row['stok']) ?>
                    </p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="text-gray-900 dark:text-stone-100 whitespace-no-wrap"><?= htmlspecialchars($row['satuan']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="whitespace-no-wrap text-amber-600 dark:text-brand-yellow font-bold">Rp<?= number_format($row['harga_per_unit'], 0, ',', '.') ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <div class="flex items-center gap-3">
                        <a href="<?= BASE_URL ?>bahan/edit/<?= $row['id'] ?>" class="text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 p-2 rounded-lg transition-colors" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <a href="<?= BASE_URL ?>bahan/delete/<?= $row['id'] ?>" class="text-red-600 dark:text-rose-400 hover:bg-red-50 dark:hover:bg-rose-900/30 p-2 rounded-lg transition-colors" onclick="return confirm('Yakin ingin menghapus?');" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($bahan)): ?>
            <tr>
                <td colspan="5" class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm text-center text-gray-500 dark:text-stone-400">Belum ada data bahan baku.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

