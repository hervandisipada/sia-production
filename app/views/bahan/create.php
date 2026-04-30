<div class="mb-6">
    <a href="<?= BASE_URL ?>bahan" class="text-blue-600 hover:text-blue-800">&larr; Kembali ke Daftar Bahan</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden p-6 max-w-2xl">
    <form action="<?= BASE_URL ?>bahan/create" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama Bahan</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" name="nama" required>
        </div>
        
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stok">Stok Awal</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="stok" type="number" step="0.01" name="stok" value="0" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="satuan">Satuan (kg, gr, ltr, pcs)</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="satuan" type="text" name="satuan" required>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="harga_per_unit">Harga per Unit (Rp)</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="harga_per_unit" type="number" name="harga_per_unit" required>
        </div>

        <div class="flex items-center justify-end">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Simpan Bahan
            </button>
        </div>
    </form>
</div>

