<div class="mb-6">
    <a href="<?= BASE_URL ?>produksi/proses" class="text-blue-600 hover:text-blue-800">&larr; Kembali ke Proses Produksi</a>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-xl">
    <h3 class="text-xl font-bold mb-4 border-b pb-2">Input Hasil Quality Control (QC)</h3>
    
    <div class="mb-6 bg-gray-50 p-4 rounded border">
        <p class="text-sm text-gray-600 mb-1">Menu: <span class="font-bold text-gray-800"><?= htmlspecialchars($produksi['nama_menu']) ?></span></p>
        <p class="text-sm text-gray-600 mb-1">Tanggal Produksi: <span class="font-bold text-gray-800"><?= htmlspecialchars($produksi['tanggal']) ?></span></p>
        <p class="text-sm text-gray-600">Rencana Produksi: <span class="font-bold text-gray-800"><?= htmlspecialchars($produksi['jumlah_rencana']) ?> porsi/pcs</span></p>
    </div>

    <form action="<?= BASE_URL ?>qc/input/<?= $produksi['id'] ?>" method="POST">
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_baik">Jumlah Hasil Baik (Lolos QC)</label>
            <input class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" id="jumlah_baik" type="number" name="jumlah_baik" required>
        </div>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_rusak">Jumlah Hasil Rusak (Waste / Reject)</label>
            <input class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg border-red-300" id="jumlah_rusak" type="number" name="jumlah_rusak" value="0" required>
        </div>

        <div class="flex items-center justify-end border-t pt-4">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="return confirm('Simpan hasil QC? Status produksi akan menjadi selesai.');">
                Simpan & Selesai
            </button>
        </div>
    </form>
</div>
