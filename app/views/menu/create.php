<div class="mb-6">
    <a href="<?= BASE_URL ?>menu" class="text-blue-600 hover:text-blue-800">&larr; Kembali ke Daftar Menu</a>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-4xl">
    <form action="<?= BASE_URL ?>menu/create" method="POST" id="menuForm">
        <h3 class="text-xl font-bold mb-4 border-b pb-2">Informasi Menu</h3>
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama Menu</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" name="nama" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="harga_jual">Harga Jual (Rp)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="harga_jual" type="number" name="harga_jual" required>
            </div>
        </div>

        <h3 class="text-xl font-bold mt-8 mb-4 border-b pb-2">BOM / Resep Bahan Baku</h3>
        <div id="resep-container">
            <!-- Row resep -->
            <div class="flex items-center gap-4 mb-3 resep-row">
                <div class="flex-1">
                    <label class="block text-gray-700 text-xs font-bold mb-1">Bahan Baku</label>
                    <select name="bahan_id[]" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">-- Pilih Bahan --</option>
                        <?php foreach($bahanList as $b): ?>
                            <option value="<?= $b['id'] ?>"><?= htmlspecialchars($b['nama']) ?> (<?= $b['satuan'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="w-32">
                    <label class="block text-gray-700 text-xs font-bold mb-1">Kuantitas</label>
                    <input type="number" step="0.01" name="qty[]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Qty">
                </div>
                <div class="w-16 pt-5">
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded btn-remove-row">&times;</button>
                </div>
            </div>
        </div>
        
        <div class="mb-6">
            <button type="button" id="btn-add-row" class="text-sm bg-gray-200 hover:bg-gray-300 text-gray-800 py-1 px-3 rounded">
                + Tambah Bahan
            </button>
        </div>

        <div class="flex items-center justify-end mt-6 pt-4 border-t">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">
                Simpan Menu & Resep
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('resep-container');
    const btnAdd = document.getElementById('btn-add-row');

    btnAdd.addEventListener('click', function() {
        const row = document.querySelector('.resep-row').cloneNode(true);
        // Reset values
        row.querySelector('select').value = '';
        row.querySelector('input').value = '';
        container.appendChild(row);
    });

    container.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove-row')) {
            const rows = container.querySelectorAll('.resep-row');
            if (rows.length > 1) {
                e.target.closest('.resep-row').remove();
            } else {
                alert('Minimal satu baris bahan (meskipun kosong tidak akan disimpan).');
            }
        }
    });
});
</script>

