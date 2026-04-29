<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Menu</h2>
    <a href="<?= BASE_URL ?>menu/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
        + Tambah Menu
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Menu</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga Jual</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menus as $row): ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap font-semibold"><?= htmlspecialchars($row['nama']) ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap text-green-600">Rp <?= number_format($row['harga_jual'], 0, ',', '.') ?></p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <a href="<?= BASE_URL ?>menu/edit/<?= $row['id'] ?>" class="text-blue-600 hover:text-blue-900 mr-3">Edit & Resep</a>
                    <a href="<?= BASE_URL ?>menu/delete/<?= $row['id'] ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus menu ini beserta semua resepnya?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($menus)): ?>
            <tr>
                <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">Belum ada data menu.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
