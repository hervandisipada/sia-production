<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Perencanaan Produksi</h2>
    <p class="text-gray-600">Pilih menu dan masukkan rencana jumlah produksi untuk melihat estimasi bahan.</p>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <form action="<?= BASE_URL ?>produksi/rencana" method="POST" class="flex gap-4 items-end">
        <div class="flex-1">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="menu_id">Pilih Menu</label>
            <select name="menu_id" id="menu_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">-- Pilih --</option>
                <?php foreach($menus as $m): ?>
                    <option value="<?= $m['id'] ?>" <?= $menu_id == $m['id'] ? 'selected' : '' ?>><?= htmlspecialchars($m['nama']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-48">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_rencana">Jumlah Produksi</label>
            <input type="number" name="jumlah_rencana" id="jumlah_rencana" min="1" value="<?= $jumlah_rencana ?: '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div>
            <button type="submit" name="cek_rencana" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Cek Kebutuhan
            </button>
        </div>
    </form>
</div>

<?php if(!empty($kebutuhan)): ?>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b bg-gray-50 flex justify-between items-center">
        <h3 class="font-bold text-gray-800">Kebutuhan Bahan Baku</h3>
        <?php if($bisa_produksi): ?>
            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold">Stok Aman</span>
        <?php else: ?>
            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded font-bold">Stok Kurang</span>
        <?php endif; ?>
    </div>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Bahan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stok Saat Ini</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kebutuhan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kebutuhan as $k): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <?= htmlspecialchars($k['nama_bahan']) ?>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <?= $k['stok_saat_ini'] ?> <?= $k['satuan'] ?>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold">
                    <?= $k['kebutuhan'] ?> <?= $k['satuan'] ?>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <?php if($k['cukup']): ?>
                        <span class="text-green-600 font-bold">&check; Cukup</span>
                    <?php else: ?>
                        <span class="text-red-600 font-bold">&cross; Kurang</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="p-6 bg-gray-50 flex justify-end gap-4">
        <?php if($bisa_produksi): ?>
            <form action="<?= BASE_URL ?>produksi/rencana" method="POST">
                <input type="hidden" name="menu_id" value="<?= $menu_id ?>">
                <input type="hidden" name="jumlah_rencana" value="<?= $jumlah_rencana ?>">
                <button type="submit" name="mulai_produksi" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded shadow" onclick="return confirm('Mulai produksi? Stok akan dikurangi otomatis.');">
                    Mulai Produksi
                </button>
            </form>
        <?php else: ?>
            <a href="<?= BASE_URL ?>bahan" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded shadow">
                Order Bahan
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
