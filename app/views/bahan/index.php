<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Bahan Baku</h2>
    <a href="<?= BASE_URL ?>bahan/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
        + Tambah Bahan
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Bahan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stok</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Satuan</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga/Unit</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bahan as $row): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap"><?= htmlspecialchars($row['nama']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap 
                        <?= $row['stok'] < 10 ? 'text-red-600 font-bold' : '' ?>">
                        <?= htmlspecialchars($row['stok']) ?>
                    </p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap"><?= htmlspecialchars($row['satuan']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">Rp <?= number_format($row['harga_per_unit'], 0, ',', '.') ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <a href="<?= BASE_URL ?>bahan/edit/<?= $row['id'] ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                    <a href="<?= BASE_URL ?>bahan/delete/<?= $row['id'] ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($bahan)): ?>
            <tr>
                <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">Belum ada data bahan baku.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
