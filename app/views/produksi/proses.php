<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Proses Produksi</h2>
    <a href="<?= BASE_URL ?>produksi/rencana" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
        + Rencana Baru
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Menu</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rencana Qty</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produksi_list as $row): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap"><?= htmlspecialchars($row['tanggal']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap font-semibold"><?= htmlspecialchars($row['nama_menu']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap"><?= htmlspecialchars($row['jumlah_rencana']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                        <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                        <span class="relative uppercase text-xs"><?= htmlspecialchars($row['status']) ?></span>
                    </span>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <a href="<?= BASE_URL ?>qc/input/<?= $row['id'] ?>" class="text-blue-600 hover:text-blue-900 font-bold">Lakukan QC &rarr;</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($produksi_list)): ?>
            <tr>
                <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">Tidak ada produksi yang sedang berjalan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

