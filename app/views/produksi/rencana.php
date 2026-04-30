<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-stone-100">Perencanaan Produksi</h2>
    <p class="text-gray-600 dark:text-stone-400">Pilih menu dan masukkan rencana jumlah produksi untuk melihat estimasi bahan.</p>
</div>

<div class="bg-white dark:bg-stone-800 rounded-lg shadow p-6 mb-6 border border-transparent dark:border-stone-700/50">
    <form action="<?= BASE_URL ?>produksi/rencana" method="POST" class="flex flex-col md:flex-row gap-4 items-end">
        <div class="flex-1 w-full">
            <label class="block text-gray-700 dark:text-stone-300 text-sm font-bold mb-2" for="menu_id">Pilih Menu</label>
            <select name="menu_id" id="menu_id" class="shadow border dark:border-stone-600 rounded w-full py-2 px-3 text-gray-700 dark:text-stone-200 bg-white dark:bg-stone-900 leading-tight focus:outline-none focus:ring-2 focus:ring-brand-yellow transition-all" required>
                <option value="">-- Pilih --</option>
                <?php foreach($menus as $m): ?>
                    <option value="<?= $m['id'] ?>" <?= $menu_id == $m['id'] ? 'selected' : '' ?>><?= htmlspecialchars($m['nama']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-full md:w-48">
            <label class="block text-gray-700 dark:text-stone-300 text-sm font-bold mb-2" for="jumlah_rencana">Jumlah Produksi</label>
            <input type="number" name="jumlah_rencana" id="jumlah_rencana" min="1" value="<?= $jumlah_rencana ?: '' ?>" class="shadow appearance-none border dark:border-stone-600 rounded w-full py-2 px-3 text-gray-700 dark:text-stone-200 bg-white dark:bg-stone-900 leading-tight focus:outline-none focus:ring-2 focus:ring-brand-yellow transition-all" required>
        </div>
        <div class="w-full md:w-auto">
            <button type="submit" name="cek_rencana" class="btn-primary w-full">
                Cek Kebutuhan
            </button>
        </div>
    </form>
</div>

<?php if(!empty($kebutuhan)): ?>
<div class="bg-white dark:bg-stone-800 rounded-lg shadow overflow-hidden border border-transparent dark:border-stone-700/50">
    <div class="p-4 border-b dark:border-stone-700 bg-gray-50 dark:bg-stone-900 flex justify-between items-center">
        <h3 class="font-bold text-gray-800 dark:text-stone-100">Kebutuhan Bahan Baku</h3>
        <?php if($bisa_produksi): ?>
            <span class="bg-green-100 dark:bg-emerald-900/30 text-green-800 dark:text-emerald-400 text-xs px-2 py-1 rounded font-bold border border-green-200 dark:border-emerald-800">Stok Aman</span>
        <?php else: ?>
            <span class="bg-red-100 dark:bg-rose-900/30 text-red-800 dark:text-rose-400 text-xs px-2 py-1 rounded font-bold border border-red-200 dark:border-rose-800">Stok Kurang</span>
        <?php endif; ?>
    </div>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Nama Bahan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Stok Saat Ini</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Kebutuhan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-left text-xs font-semibold text-gray-600 dark:text-stone-400 uppercase tracking-wider">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kebutuhan as $k): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="text-gray-900 dark:text-stone-100 whitespace-no-wrap font-semibold"><?= htmlspecialchars($k['nama_bahan']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <p class="text-gray-900 dark:text-stone-100 whitespace-no-wrap"><?= $k['stok_saat_ini'] ?> <?= $k['satuan'] ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm font-bold">
                    <p class="text-gray-900 dark:text-stone-100 whitespace-no-wrap"><?= $k['kebutuhan'] ?> <?= $k['satuan'] ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 dark:border-stone-700 bg-white dark:bg-stone-800 text-sm">
                    <?php if($k['cukup']): ?>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold">&check; Cukup</span>
                    <?php else: ?>
                        <span class="text-rose-600 dark:text-rose-400 font-bold">&cross; Kurang</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="p-6 bg-gray-50 dark:bg-stone-900 flex justify-end gap-4">
        <?php if($bisa_produksi): ?>
            <form action="<?= BASE_URL ?>produksi/rencana" method="POST">
                <input type="hidden" name="menu_id" value="<?= $menu_id ?>">
                <input type="hidden" name="jumlah_rencana" value="<?= $jumlah_rencana ?>">
                <button type="submit" name="mulai_produksi" class="btn-primary" onclick="return confirm('Mulai produksi? Stok akan dikurangi otomatis.');">
                    Mulai Produksi
                </button>
            </form>
        <?php else: ?>
            <a href="<?= BASE_URL ?>bahan" class="bg-rose-500 hover:bg-rose-600 text-white font-bold py-2 px-6 rounded shadow">
                Order Bahan
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

