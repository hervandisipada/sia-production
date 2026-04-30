<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SIA Produksi Pawon Selaras' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Default to dark mode unless light is explicitly set
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>
    <script>
        tailwind.config = {
            darkMode: 'class',
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
                @apply bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-stone-700 dark:text-stone-300 py-2.5 px-6 rounded-xl font-semibold shadow-sm hover:bg-stone-50 dark:hover:bg-stone-700 active:scale-[0.98] transition-all flex items-center justify-center gap-2;
            }
        }
    </style>
</head>

<body
    class="bg-stone-50 dark:bg-stone-900 font-sans text-stone-900 dark:text-stone-100 antialiased transition-colors duration-300">

    <div class="flex h-screen overflow-hidden bg-stone-50 dark:bg-stone-900">

        <!-- Mobile Overlay -->
        <div id="sidebarOverlay"
            class="fixed inset-0 bg-stone-900/50 z-40 hidden lg:hidden backdrop-blur-sm transition-opacity"></div>

        <!-- Sidebar -->
        <?php if (isset($_SESSION['user'])): ?>
            <aside id="sidebar"
                class="fixed inset-y-0 left-0 z-50 w-72 bg-white dark:bg-stone-800 flex flex-col border-r border-stone-200 dark:border-stone-700/50 transform -translate-x-full lg:relative lg:translate-x-0 transition-transform duration-300 ease-in-out">
                <div
                    class="p-6 bg-white dark:bg-stone-800 border-b border-stone-100 dark:border-stone-700/50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-brand-yellow rounded-xl flex items-center justify-center shadow-lg shadow-brand-yellow/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-stone-900" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold tracking-tight text-stone-900 dark:text-stone-50">Pawon Selaras
                            </h1>
                            <p
                                class="text-[10px] text-stone-400 dark:text-stone-500 uppercase tracking-[0.2em] font-semibold">
                                SIA Produksi</p>
                        </div>
                    </div>
                    <button id="closeMenuBtn"
                        class="lg:hidden p-2 -mr-2 text-stone-400 hover:text-stone-600 dark:hover:text-stone-300 rounded-lg hover:bg-stone-100 dark:hover:bg-stone-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">
                    <p class="px-4 py-2 text-[10px] font-bold text-stone-400 dark:text-stone-500 uppercase tracking-widest">
                        Menu Utama</p>

                    <a href="<?= BASE_URL ?>dashboard"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= ($title ?? '') === 'Dashboard' ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <a href="<?= BASE_URL ?>menu"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= ($title ?? '') === 'Manajemen Menu' ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="font-medium">Manajemen Menu</span>
                    </a>

                    <a href="<?= BASE_URL ?>bahan"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (strpos($title ?? '', 'Bahan Baku') !== false) ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span class="font-medium">Bahan Baku</span>
                    </a>

                    <p
                        class="px-4 py-2 mt-6 text-[10px] font-bold text-stone-400 dark:text-stone-500 uppercase tracking-widest">
                        Produksi & Stok</p>

                    <a href="<?= BASE_URL ?>produksi/rencana"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (strpos($title ?? '', 'Produksi') !== false && strpos($title ?? '', 'Laporan') === false) ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="font-medium">Proses Produksi</span>
                    </a>

                    <a href="<?= BASE_URL ?>laporan/produksi"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= (strpos($title ?? '', 'Laporan') === 0) ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="font-medium">Laporan Produksi</span>
                    </a>

                    <?php if (in_array($_SESSION['user']['role'], ['admin', 'owner'])): ?>
                        <p
                            class="px-4 py-2 mt-6 text-[10px] font-bold text-stone-400 dark:text-stone-500 uppercase tracking-widest">
                            Administrasi</p>
                        <a href="<?= BASE_URL ?>user"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= ($title ?? '') === 'Manajemen Pengguna' ? 'bg-brand-yellow text-stone-900 shadow-lg shadow-brand-yellow/20' : 'text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="font-medium">Kelola User</span>
                        </a>
                    <?php endif; ?>

                </nav>

                <div class="px-4 pb-2">
                    <a href="<?= BASE_URL ?>home/index"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group text-stone-500 dark:text-stone-400 hover:bg-stone-50 dark:hover:bg-stone-700/50 hover:text-stone-900 dark:hover:text-stone-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span class="font-medium text-sm">Halaman Utama</span>
                    </a>
                </div>

                <div class="p-4 bg-white dark:bg-stone-800 border-t border-stone-100 dark:border-stone-700/50">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-stone-50 dark:bg-stone-900">
                        <div
                            class="w-10 h-10 rounded-full bg-brand-yellow flex items-center justify-center font-bold text-stone-900 shadow-inner">
                            <?= strtoupper(substr($_SESSION['user']['name'] ?? 'U', 0, 1)) ?>
                        </div>
                        <div class="flex-1 overflow-hidden">
                            <p class="text-sm font-semibold truncate text-stone-900 dark:text-stone-100">
                                <?= $_SESSION['user']['name'] ?? 'User' ?></p>
                            <p
                                class="text-[10px] text-stone-500 dark:text-stone-400 truncate uppercase font-bold tracking-tighter">
                                <?= $_SESSION['user']['role'] ?? 'Staff' ?></p>
                        </div>
                        <a href="<?= BASE_URL ?>auth/logout"
                            class="text-stone-400 dark:text-stone-500 hover:text-rose-500 dark:hover:text-rose-400 transition-colors"
                            title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </a>
                    </div>
                </div>
            </aside>
        <?php endif; ?>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- Navbar -->
            <header
                class="bg-white dark:bg-stone-800 border-b border-stone-900/10 dark:border-stone-700/50 h-20 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm transition-colors duration-300">
                <div class="flex items-center gap-4">
                    <?php if (isset($_SESSION['user'])): ?>
                        <button id="mobileMenuBtn"
                            class="lg:hidden p-2 rounded-lg bg-stone-100 dark:bg-stone-700 text-stone-600 dark:text-stone-300 hover:bg-stone-200 dark:hover:bg-stone-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    <?php else: ?>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-brand-yellow rounded-xl flex items-center justify-center shadow-lg shadow-brand-yellow/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-stone-900" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h1 class="text-lg font-bold tracking-tight text-stone-900 dark:text-stone-50 hidden sm:block">
                                Pawon Selaras</h1>
                        </div>
                    <?php endif; ?>
                    <h2 class="text-xl font-bold text-stone-800 dark:text-stone-100 tracking-tight">
                        <?= $title ?? 'Dashboard' ?></h2>
                </div>
                <div class="flex items-center gap-4 sm:gap-6">
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" type="button"
                        class="text-stone-500 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-700 focus:outline-none focus:ring-4 focus:ring-stone-200 dark:focus:ring-stone-700 rounded-lg text-sm p-2 transition-colors">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="relative hidden lg:block">
                        <input type="text" placeholder="Cari data..."
                            class="w-64 bg-stone-50 dark:bg-stone-900 border-none rounded-xl px-4 py-2.5 text-sm text-stone-800 dark:text-stone-100 placeholder:text-stone-400 dark:placeholder:text-stone-500 focus:ring-2 focus:ring-brand-yellow/50 transition-all">
                    </div>
                    <div class="flex items-center gap-3 border-l pl-6 border-stone-900/10 dark:border-stone-700/50">
                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-bold text-stone-800 dark:text-stone-100">
                                    <?= $_SESSION['user']['name'] ?? 'User' ?></p>
                                <p class="text-[10px] text-stone-500 dark:text-stone-400 font-bold uppercase">
                                    <?= $_SESSION['user']['role'] ?? 'Staff' ?></p>
                            </div>
                            <div
                                class="w-10 h-10 rounded-xl bg-stone-100 dark:bg-stone-700 flex items-center justify-center text-stone-600 dark:text-stone-300 font-bold shadow-inner">
                                <?= strtoupper(substr($_SESSION['user']['name'] ?? 'U', 0, 1)) ?>
                            </div>
                        <?php else: ?>
                            <a href="<?= BASE_URL ?>auth/index" class="btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Login
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main
                class="flex-1 overflow-x-hidden overflow-y-auto bg-stone-50 dark:bg-stone-900 p-8 custom-scrollbar transition-colors duration-300">

                <?php if (isset($_SESSION['flash'])): ?>
                    <div
                        class="p-4 mb-8 text-sm rounded-2xl flex items-center gap-3 animate-fade-in <?= $_SESSION['flash']['type'] === 'success' ? 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800' : 'bg-rose-50 dark:bg-rose-900/30 text-rose-800 dark:text-rose-400 border border-rose-100 dark:border-rose-800' ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
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
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
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

            // Dark Mode Toggle Logic
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');

            if (themeToggleDarkIcon && themeToggleLightIcon && themeToggleBtn) {
                if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    themeToggleLightIcon.classList.remove('hidden');
                } else {
                    themeToggleDarkIcon.classList.remove('hidden');
                }

                themeToggleBtn.addEventListener('click', function () {
                    themeToggleDarkIcon.classList.toggle('hidden');
                    themeToggleLightIcon.classList.toggle('hidden');

                    if (localStorage.getItem('color-theme')) {
                        if (localStorage.getItem('color-theme') === 'light') {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        }
                    } else {
                        if (document.documentElement.classList.contains('dark')) {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>