<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-stone-100">Daftar Menu</h2>
    <a href="<?= BASE_URL ?>menu/create" class="btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Menu
    </a>
</div>

<div class="bg-white dark:bg-stone-800 rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Nama Menu</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Kategori</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Harga Jual</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-center text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Best Seller</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-center text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Ketersediaan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-gray-100 dark:bg-stone-900 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $row): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="text-gray-900 dark:text-stone-100 whitespace-no-wrap font-semibold flex items-center gap-2">
                        <?= htmlspecialchars($row['nama']) ?>
                    </p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <span class="px-2 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider <?= $row['kategori'] == 'Makanan' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700' ?>">
                        <?= $row['kategori'] ?>
                    </span>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="whitespace-no-wrap text-amber-600 dark:text-brand-yellow font-bold">Rp<?= number_format($row['harga_jual'], 0, ',', '.') ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm text-center">
                    <input type="checkbox" 
                           class="toggle-status w-5 h-5 rounded border-stone-300 text-brand-yellow focus:ring-brand-yellow cursor-pointer" 
                           data-id="<?= $row['id'] ?>" 
                           data-field="is_best_seller" 
                           <?= $row['is_best_seller'] ? 'checked' : '' ?>>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm text-center">
                    <input type="checkbox" 
                           class="toggle-status w-5 h-5 rounded border-stone-300 text-emerald-500 focus:ring-emerald-500 cursor-pointer" 
                           data-id="<?= $row['id'] ?>" 
                           data-field="is_available" 
                           <?= $row['is_available'] ? 'checked' : '' ?>>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <div class="flex items-center gap-3">
                        <a href="<?= BASE_URL ?>menu/edit/<?= $row['id'] ?>" class="text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 p-2 rounded-lg transition-colors" title="Edit & Resep">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <a href="<?= BASE_URL ?>menu/delete/<?= $row['id'] ?>" class="text-red-600 dark:text-rose-400 hover:bg-red-50 dark:hover:bg-rose-900/30 p-2 rounded-lg transition-colors" onclick="return confirm('Yakin ingin menghapus menu ini beserta semua resepnya?');" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($menus)): ?>
            <tr>
                <td colspan="5" class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm text-center text-gray-500 dark:text-stone-400">Belum ada data menu.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
document.querySelectorAll('.toggle-status').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const id = this.dataset.id;
        const field = this.dataset.field;
        const value = this.checked ? 1 : 0;

        const formData = new FormData();
        formData.append('id', id);
        formData.append('field', field);
        formData.append('value', value);

        fetch('<?= BASE_URL ?>menu/toggleStatus', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Gagal memperbarui status');
                this.checked = !this.checked;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan jaringan');
            this.checked = !this.checked;
        });
    });
});
</script>

