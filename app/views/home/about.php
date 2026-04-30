<div class="space-y-8 animate-fade-in">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-stone-900 tracking-tight">Tim Pengembang</h1>
            <p class="text-stone-500 font-medium">Para pemikir kreatif di balik Sistem Informasi Pawon Selaras.</p>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 bg-white rounded-2xl shadow-sm border border-stone-100">
            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
            <span class="text-xs font-bold text-stone-600 uppercase tracking-widest">Proyek Aktif</span>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Group Information (Left Col) -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-stone-100 overflow-hidden relative group">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-brand-yellow/5 rounded-full -mr-32 -mt-32 transition-transform duration-700 group-hover:scale-110">
                </div>

                <div class="p-10 relative">
                    <div class="flex items-center gap-4 mb-10">
                        <div
                            class="w-16 h-16 bg-brand-yellow rounded-3xl flex items-center justify-center text-stone-900 shadow-xl shadow-brand-yellow/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-black text-stone-900">Kelompok 4 (Empat)</h2>
                            <p class="text-stone-500 font-bold uppercase tracking-[0.2em] text-xs mt-1">Program Studi
                                Akuntansi</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php
                        $members = [
                            ['name' => 'Herdiaman Zega', 'id' => '24304107', 'role' => 'Analis Bisnis'],
                            ['name' => 'Stefanus Rapo', 'id' => '24304079', 'role' => 'Analis Akuntansi'],
                            ['name' => 'Hendriyana Hendrik', 'id' => '24304100', 'role' => 'Koordinator Keuangan'],
                            ['name' => 'Angel Hengkeng', 'id' => '24304063', 'role' => 'Penjamin Kualitas'],
                            ['name' => 'Nikadek S. R Dewi', 'id' => '24304010', 'role' => 'Dokumentasi Laporan'],
                            ['name' => 'Charol Kumayas', 'id' => '24304123', 'role' => 'Manajemen Data']
                        ];
                        foreach ($members as $m): ?>
                            <div
                                class="flex items-center gap-4 p-5 rounded-[2rem] bg-stone-50 border border-transparent hover:border-brand-yellow/30 hover:bg-white hover:shadow-xl hover:shadow-stone-200/50 transition-all duration-300 group/item">
                                <div
                                    class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-lg font-black text-stone-300 group-hover/item:bg-brand-yellow group-hover/item:text-stone-900 transition-all duration-300">
                                    <?= substr($m['name'], 0, 1) ?>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-black text-stone-800 tracking-tight"><?= $m['name'] ?></p>
                                    <div class="flex items-center justify-between mt-1">
                                        <p class="text-[11px] font-mono font-bold text-stone-400"><?= $m['id'] ?></p>
                                        <p
                                            class="text-[9px] font-bold text-brand-yellow bg-stone-900 px-2 py-0.5 rounded-full opacity-0 group-hover/item:opacity-100 transition-opacity uppercase tracking-tighter">
                                            <?= $m['role'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Program Info Card -->
            <div
                class="bg-white rounded-[2.5rem] shadow-sm border border-stone-100 p-10 text-stone-900 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden group/card">
                <div
                    class="absolute right-0 bottom-0 opacity-5 transform translate-x-1/4 translate-y-1/4 transition-transform duration-1000 group-hover/card:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                </div>
                <div class="flex-1 relative">
                    <h3 class="text-2xl font-black mb-2 tracking-tight text-stone-900">Sistem Informasi Akuntansi</h3>
                    <p class="text-stone-500 font-medium leading-relaxed">Proyek ini dikembangkan sebagai tugas <span
                            class="text-stone-900 font-bold underline decoration-brand-yellow">Ujian Akhir Semester
                            (UAS)</span> untuk mata kuliah Sistem Informasi Akuntansi, Semester Genap 2025/2026.</p>
                    <div class="flex flex-wrap gap-4 mt-6">
                        <div
                            class="bg-brand-yellow/10 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-widest border border-brand-yellow/20 text-stone-700">
                            Proyek UAS</div>
                        <div
                            class="bg-brand-yellow/10 px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-widest border border-brand-yellow/20 text-stone-700">
                            Semester Genap 25/26</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Developer Section (Right Col) -->
        <div class="space-y-8">
            <div
                class="bg-white rounded-[2.5rem] shadow-sm border border-stone-100 p-10 text-stone-900 relative overflow-hidden group min-h-[500px] flex flex-col">
                <div
                    class="absolute -right-20 -top-20 w-80 h-80 bg-brand-yellow/5 rounded-full blur-[100px] group-hover:bg-brand-yellow/10 transition-all duration-1000">
                </div>

                <div class="relative flex-1">
                    <div
                        class="w-20 h-20 bg-brand-yellow rounded-[2rem] flex items-center justify-center text-stone-900 shadow-2xl shadow-brand-yellow/20 mb-8 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>

                    <span
                        class="inline-block px-4 py-1.5 rounded-full bg-brand-yellow/10 text-brand-yellow text-[11px] font-black uppercase tracking-[0.2em] mb-4 border border-brand-yellow/20">Developer
                        Sistem</span>
                    <h2 class="text-2xl font-black mb-2 leading-tight">Hervandi A. Sipada</h2>
                    <p class="text-stone-400 text-sm font-mono font-bold tracking-widest mb-8">22208024</p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3 text-stone-600">
                            <div class="w-1.5 h-1.5 bg-brand-yellow rounded-full"></div>
                            <p class="text-sm font-bold">Fullstack Development</p>
                        </div>
                    </div>
                </div>

                <div class="relative mt-auto pt-10 border-t border-stone-100">
                    <p class="text-stone-400 text-[11px] uppercase font-black tracking-widest mb-1">Jurusan</p>
                    <p class="text-lg font-black text-stone-900">Pendidikan Teknologi Informasi dan Komunikasi</p>
                    <p class="text-stone-500 text-xs font-bold mt-1">Fakultas Teknik UNIMA</p>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="grid grid-cols-1 gap-6">
                <!-- Email Card -->
                <div
                    class="bg-white rounded-[2.5rem] p-8 border border-stone-100 shadow-sm flex items-center justify-between group cursor-pointer hover:border-brand-yellow/50 transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center text-stone-400 group-hover:bg-brand-yellow group-hover:text-stone-900 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">Kontak Email</p>
                            <p class="text-sm font-bold text-stone-800">sipadahervandi@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- GitHub Card -->
                <a href="https://github.com/hervandisipada" target="_blank"
                    class="bg-white rounded-[2.5rem] p-8 border border-stone-100 shadow-sm flex items-center justify-between group cursor-pointer hover:border-stone-900 transition-all">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center text-stone-400 group-hover:bg-stone-900 group-hover:text-white transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest">GitHub</p>
                            <p class="text-sm font-bold text-stone-800">hervandisipada</p>
                        </div>
                    </div>
                    <div class="text-stone-300 group-hover:text-stone-900 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>