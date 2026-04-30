<div class="bg-white dark:bg-stone-800 rounded-3xl shadow-sm border border-stone-200 dark:border-stone-700/50 overflow-hidden animate-fade-in">
    <div class="p-6 border-b border-stone-100 dark:border-stone-700/50 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-stone-800 dark:text-stone-100">Daftar Pengguna</h3>
            <p class="text-sm text-stone-500 dark:text-stone-400">Kelola dan setujui akun yang mendaftar ke sistem.</p>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-50/50 dark:bg-stone-900/50">
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 border-b border-stone-100 dark:border-stone-700/50">User</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 border-b border-stone-100 dark:border-stone-700/50">Role</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 border-b border-stone-100 dark:border-stone-700/50">Status</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-stone-500 dark:text-stone-400 border-b border-stone-100 dark:border-stone-700/50 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100 dark:divide-stone-700/50">
                <?php foreach ($users as $user): ?>
                <tr class="hover:bg-stone-50/50 dark:hover:bg-stone-900/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-yellow/10 dark:bg-brand-yellow/20 flex items-center justify-center text-brand-yellow font-bold border border-brand-yellow/20 dark:border-brand-yellow/30">
                                <?= strtoupper(substr($user['name'], 0, 1)) ?>
                            </div>
                            <div>
                                <p class="font-bold text-stone-800 dark:text-stone-100"><?= $user['name'] ?></p>
                                <p class="text-xs text-stone-400 dark:text-stone-500"><?= $user['email'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-300">
                            <?= $user['role'] ?>
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <?php if ($user['status'] === 'active'): ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800">Aktif</span>
                        <?php elseif ($user['status'] === 'pending'): ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 border border-amber-100 dark:border-amber-800">Menunggu</span>
                        <?php else: ?>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-800">Ditolak</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <?php if ($user['status'] === 'pending'): ?>
                                <a href="<?= BASE_URL ?>user/approve/<?= $user['id'] ?>" class="p-2 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-lg hover:bg-emerald-100 dark:hover:bg-emerald-800/50 transition-colors" title="Setujui">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </a>
                                <a href="<?= BASE_URL ?>user/reject/<?= $user['id'] ?>" class="p-2 bg-rose-50 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-lg hover:bg-rose-100 dark:hover:bg-rose-800/50 transition-colors" title="Tolak">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($user['id'] != $_SESSION['user']['id']): ?>
                            <a href="<?= BASE_URL ?>user/delete/<?= $user['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')" class="p-2 text-stone-400 dark:text-stone-500 hover:text-rose-500 dark:hover:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-900/30 rounded-lg transition-all" title="Hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if (empty($users)): ?>
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-stone-400">
                        Tidak ada data pengguna.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
