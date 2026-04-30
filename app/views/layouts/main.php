<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SIA Produksi Pawon Selaras' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            yellow: '#FFD95A',
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .btn-primary {
                @apply bg-brand-yellow text-stone-900 font-bold py-2.5 px-6 rounded-xl shadow-lg shadow-brand-yellow/30 hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2;
            }
            .btn-secondary {
                @apply bg-white border border-stone-200 text-stone-700 py-2.5 px-6 rounded-xl font-semibold shadow-sm hover:bg-stone-50 active:scale-[0.98] transition-all flex items-center justify-center gap-2;
            }
        }
    </style>
</head>
<body class="bg-stone-50 font-sans text-stone-900 antialiased">

    <div class="flex h-screen overflow-hidden bg-stone-50">
        
        <!-- Mobile Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-stone-900/50 z-40 hidden lg:hidden backdrop-blur-sm transition-opacity"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 bg-white flex flex-col border-r border-stone-200 transform -translate-x-full lg:relative lg:translate-x-0 transition-transform duration-300 ease-in-out">
            <div class="p-6 bg-white border-b border-stone-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-brand-yellow rounded-xl flex items-center justify-center shadow-lg shadow-brand-yellow/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold tracking-tight">Pawon Selaras</h1>
                        <p class="text-[10px] text-stone-400 uppercase tracking-[0.2em] font-semibold">SIA Produksi</p>
                    </div>
                </div>
                <button id="closeMenuBtn" class="lg:hidden p-2 -mr-2 text-stone-400 hover:text-stone-600 rounded-lg hover:bg-stone-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">
                <p class="px-4 py-2 text-[10px] font-bold text-stone-400 uppercase tracking-widest">Menu Utama</p>
                
                <a href="<?= BASE_URL ?>dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= ($title ?? '') === 'Dashboard' ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 hover:bg-stone-50 hover:text-stone-900' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="<?= BASE_URL ?>menu" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= ($title ?? '') === 'Manajemen Menu' ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 hover:bg-stone-50 hover:text-stone-900' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-medium">Manajemen Menu</span>
                </a>

                <a href="<?= BASE_URL ?>bahan" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (strpos($title ?? '', 'Bahan Baku') !== false) ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 hover:bg-stone-50 hover:text-stone-900' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span class="font-medium">Bahan Baku</span>
                </a>

                <p class="px-4 py-2 mt-6 text-[10px] font-bold text-stone-400 uppercase tracking-widest">Produksi & Stok</p>

                <a href="<?= BASE_URL ?>produksi/rencana" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (strpos($title ?? '', 'Produksi') !== false && strpos($title ?? '', 'Laporan') === false) ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 hover:bg-stone-50 hover:text-stone-900' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="font-medium">Proses Produksi</span>
                </a>

                <a href="<?= BASE_URL ?>laporan/produksi" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (strpos($title ?? '', 'Laporan') === 0) ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 hover:bg-stone-50 hover:text-stone-900' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-medium">Laporan Produksi</span>
                </a>

            </nav>

            <div class="px-4 pb-2">
                <a href="<?= BASE_URL ?>dashboard/about" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= ($title ?? '') === 'Team Developers' ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 hover:bg-stone-50 hover:text-stone-900' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium text-sm">Team Developers</span>
                </a>
            </div>

            <div class="p-4 bg-white border-t border-stone-100">
                <div class="flex items-center gap-3 p-3 rounded-xl bg-stone-50">
                    <div class="w-10 h-10 rounded-full bg-brand-yellow flex items-center justify-center font-bold text-stone-900 shadow-inner">
                        <?= strtoupper(substr($_SESSION['user']['name'] ?? 'U', 0, 1)) ?>
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-sm font-semibold truncate text-stone-900"><?= $_SESSION['user']['name'] ?? 'User' ?></p>
                        <p class="text-[10px] text-stone-500 truncate uppercase font-bold tracking-tighter"><?= $_SESSION['user']['role'] ?? 'Staff' ?></p>
                    </div>
                    <a href="<?= BASE_URL ?>auth/logout" class="text-stone-400 hover:text-rose-500 transition-colors" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- Navbar -->
            <header class="bg-white border-b border-stone-900/10 h-20 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
                <div class="flex items-center gap-4">
                    <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg bg-stone-100 text-stone-600 hover:bg-stone-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-bold text-stone-800 tracking-tight"><?= $title ?? 'Dashboard' ?></h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Cari data..." class="w-64 bg-stone-50 border-none rounded-xl px-4 py-2.5 text-sm focus:ring-2 bg-brand-yellow/20 transition-all">
                    </div>
                    <div class="flex items-center gap-3 border-l pl-6 border-stone-900/10">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-stone-800"><?= $_SESSION['user']['name'] ?? 'User' ?></p>
                            <p class="text-[10px] text-stone-500 font-bold uppercase"><?= $_SESSION['user']['role'] ?? 'Staff' ?></p>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-stone-100 flex items-center justify-center text-stone-600 font-bold">
                            <?= strtoupper(substr($_SESSION['user']['name'] ?? 'U', 0, 1)) ?>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-stone-50 p-8 custom-scrollbar">
                
                <?php if (isset($_SESSION['flash'])): ?>
                    <div class="p-4 mb-8 text-sm rounded-2xl flex items-center gap-3 animate-fade-in <?= $_SESSION['flash']['type'] === 'success' ? 'bg-emerald-50 text-emerald-800 border border-emerald-100' : 'bg-rose-50 text-rose-800 border border-rose-100' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium"><?= $_SESSION['flash']['message'] ?></span>
                    </div>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>

                <?= $content ?>

            </main>
        </div>
    </div>

    <style>
    .custom-scrollbar::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
    </style>
    <script src="<?= BASE_URL ?>js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeMenuBtn = document.getElementById('closeMenuBtn');

            function toggleMenu() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', toggleMenu);
            if (closeMenuBtn) closeMenuBtn.addEventListener('click', toggleMenu);
            if (overlay) overlay.addEventListener('click', toggleMenu);
        });
    </script>
</body>
</html>

