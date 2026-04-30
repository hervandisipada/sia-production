<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Login' ?></title>
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
                @apply bg-brand-yellow text-stone-900 font-bold py-3 px-6 rounded-xl shadow-lg shadow-brand-yellow/30 hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2 text-sm;
            }
            .btn-secondary {
                @apply bg-stone-100 dark:bg-stone-800 text-stone-600 dark:text-stone-300 font-bold py-3 px-6 rounded-xl hover:bg-stone-200 dark:hover:bg-stone-700 active:scale-[0.98] transition-all flex items-center justify-center gap-2 text-sm;
            }
            .form-input {
                @apply w-full bg-stone-50 dark:bg-stone-800 border-stone-900/10 dark:border-stone-700 border-2 rounded-xl py-2 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:border-brand-yellow focus:ring-4 focus:ring-brand-yellow/10 transition-all placeholder:text-stone-400 dark:placeholder:text-stone-500 text-sm;
            }
            .form-label {
                @apply block text-stone-700 dark:text-stone-300 text-[10px] font-bold uppercase tracking-widest mb-1 ml-1;
            }
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-stone-50 to-stone-200 dark:from-stone-900 dark:to-stone-800 flex items-center justify-center min-h-screen p-2 font-sans antialiased transition-colors duration-300">

    <!-- Dark Mode Toggle -->
    <button id="theme-toggle" type="button"
        class="absolute top-4 right-4 text-stone-500 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-800 focus:outline-none focus:ring-4 focus:ring-stone-200 dark:focus:ring-stone-700 rounded-lg text-sm p-2.5 transition-colors">
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

    <div class="w-full max-w-md animate-fade-in py-4">
        <div class="text-center mb-4">
                <img src="<?= BASE_URL ?>img/logo.png" alt="Logo" class="w-12 h-12 object-cover rounded-xl shadow-xl shadow-brand-yellow/20 mb-2 transform hover:rotate-6 transition-transform duration-300">
            <h1 class="text-2xl font-black text-stone-900 dark:text-stone-50 tracking-tight">Pawon Selaras</h1>
            <p class="text-stone-500 dark:text-stone-400 text-xs font-medium">Sistem Informasi Produksi</p>
        </div>

        <div
            class="bg-white/80 dark:bg-stone-900/80 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-white dark:border-stone-700/50">
            <h2 class="text-lg font-bold text-stone-800 dark:text-stone-100 mb-2 text-center">Selamat Datang!</h2>
            <p class="text-[10px] text-stone-500 dark:text-stone-400 text-center mb-6 leading-relaxed">
                <span class="font-bold text-brand-yellow">PENTING:</span> Akses sistem ini hanya diperuntukkan bagi
                <span class="dark:text-stone-200">Karyawan</span> dan <span class="dark:text-stone-200">Owner</span> RM
                Pawon Selaras. Pelanggan dapat melihat menu melalui halaman utama.
            </p>

            <?php if (isset($_SESSION['flash'])): ?>
                <?php if ($_SESSION['flash']['type'] === 'error'): ?>
                    <div
                        class="mb-4 flex items-center gap-2 p-3 text-xs text-rose-800 bg-rose-50 border border-rose-100 rounded-xl animate-shake">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium"><?= $_SESSION['flash']['message'] ?></span>
                    </div>
                <?php elseif ($_SESSION['flash']['type'] === 'success'): ?>
                    <div
                        class="mb-4 flex items-center gap-2 p-3 text-xs text-emerald-800 bg-emerald-50 border border-emerald-100 rounded-xl animate-fade-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium"><?= $_SESSION['flash']['message'] ?></span>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>auth/login" method="POST" class="space-y-3">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div>
                    <label class="form-label" for="email">Email Address</label>
                    <input class="form-input" id="email" type="email" name="email" placeholder="nama@rmpawon.com"
                        required>
                </div>

                <div class="relative group">
                    <label class="form-label" for="password">Password</label>
                    <div class="relative">
                        <input class="form-input pr-12" id="password" type="password" name="password"
                            placeholder="••••••••" required>
                        <button type="button" id="togglePassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 p-1.5 text-stone-400 hover:text-brand-yellow transition-colors focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" id="eyeIcon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="pt-2 grid grid-cols-2 gap-3">
                    <a href="<?= BASE_URL ?>home/index" class="btn-secondary w-full">
                        Kembali
                    </a>
                    <button class="btn-primary w-full" type="submit">
                        Masuk
                    </button>
                </div>
            </form>

            <div class="mt-4 pt-4 border-t border-stone-100 dark:border-stone-800 text-center">
                <p class="text-stone-500 dark:text-stone-400 text-xs">
                    Belum punya akun?
                    <a href="<?= BASE_URL ?>auth/register"
                        class="text-stone-900 dark:text-stone-50 font-bold hover:underline">Daftar</a>
                </p>
            </div>
        </div>

        <p class="text-center text-stone-500 text-[10px] mt-4 font-medium tracking-wide">
            &copy; <?= date('Y') ?> Hrvndi PTIK. All rights reserved.
        </p>
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

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-4px);
            }

            75% {
                transform: translateX(4px);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-shake {
            animation: shake 0.2s ease-in-out 0s 2;
        }
    </style>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function () {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
                // if NOT set via local storage previously
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

        // Password Toggle Logic
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle Icon
                if (type === 'text') {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `;
                }
            });
        }
    </script>
</body>

</html>