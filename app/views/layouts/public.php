<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SIA Produksi Pawon Selaras' ?></title>
    <link rel="icon" href="<?= BASE_URL ?>img/logo.png" type="image/png">
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

    <!-- Simple Public Navbar -->
    <nav
        class="bg-white/80 dark:bg-stone-900/80 backdrop-blur-md sticky top-0 z-50 border-b border-stone-200 dark:border-white/5 transition-colors">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="<?= BASE_URL ?>home/index" class="flex items-center gap-3">
                <img src="<?= BASE_URL ?>img/logo.png" alt="Logo" class="w-10 h-10 object-cover rounded-xl shadow-lg shadow-brand-yellow/20">
                <span class="text-xl font-extrabold tracking-tighter text-stone-900 dark:text-white transition-colors">
                    Pawon <span class="text-brand-yellow">Selaras</span>
                </span>
            </a>

            <div class="flex items-center gap-6">
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

                <?php if (isset($_SESSION['user'])): ?>
                    <a href="<?= BASE_URL ?>dashboard" class="btn-primary py-2 px-5 text-sm">
                        Dashboard
                    </a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>auth/index"
                        class="btn-primary flex items-center gap-2 !py-2 !px-3 md:!py-2.5 md:!px-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="hidden md:inline">Masuk</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pt-12 mb-10">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-stone-800 border-t border-stone-200 dark:border-white/5 py-12 transition-colors">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-stone-400 text-xs font-medium tracking-wide">
                &copy; <?= date('Y') ?> Hrvndi PTIK. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
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
    </script>
</body>

</html>