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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
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
                @apply w-full bg-stone-50 dark:bg-stone-800 border-stone-200 dark:border-stone-700 border-2 rounded-xl py-2.5 px-4 text-stone-800 dark:text-stone-100 leading-tight focus:outline-none focus:border-brand-yellow focus:ring-4 focus:ring-brand-yellow/10 transition-all placeholder:text-stone-400 dark:placeholder:text-stone-500 text-sm;
            }
            .form-label {
                @apply block text-stone-700 dark:text-stone-300 text-[10px] font-bold uppercase tracking-widest mb-1 ml-1;
            }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-stone-50 to-stone-200 dark:from-stone-900 dark:to-stone-800 min-h-screen flex flex-col items-center justify-center p-4 font-sans antialiased transition-colors duration-300">

    <!-- Dark Mode Toggle -->
    <button id="theme-toggle" type="button" class="absolute top-4 right-4 text-stone-500 dark:text-stone-400 hover:bg-stone-100 dark:hover:bg-stone-800 focus:outline-none focus:ring-4 focus:ring-stone-200 dark:focus:ring-stone-700 rounded-lg text-sm p-2.5 transition-colors">
        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
    </button>

    <div class="w-full max-w-5xl flex flex-col md:flex-row bg-white/80 dark:bg-stone-900/80 backdrop-blur-xl rounded-3xl overflow-hidden shadow-2xl border border-white dark:border-stone-700/50 animate-fade-in">
        
        <!-- Left Side (Banner) - Hidden on Mobile -->
        <div class="hidden md:flex w-1/2 flex-col items-center justify-center p-12 bg-gradient-to-br from-brand-yellow/80 to-brand-yellow dark:from-stone-800 dark:to-stone-900 relative overflow-hidden">
            <div class="absolute inset-0 bg-stone-900/5 dark:bg-brand-yellow/5 pattern-dots pattern-stone-900 dark:pattern-brand-yellow pattern-bg-transparent pattern-size-4 pattern-opacity-10"></div>
            
            <div class="relative z-10 flex flex-col items-center text-center">
                <div class="relative mb-8">
                    <div class="absolute -inset-4 bg-brand-yellow/20 dark:bg-brand-yellow/10 blur-2xl rounded-full"></div>
                    <img src="<?= BASE_URL ?>img/logo.png" alt="Logo" class="relative w-40 h-40 object-cover rounded-3xl shadow-2xl bg-white/20 dark:bg-stone-800/40 backdrop-blur-md p-1 border border-white/30 dark:border-stone-700/50">
                </div>
                <h1 class="text-4xl font-black tracking-tight mb-4 drop-shadow-lg text-stone-900 dark:text-brand-yellow">Pawon Selaras</h1>
                <p class="text-lg text-stone-800 dark:text-stone-400 font-medium">Sistem Informasi Produksi interaktif.</p>
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 p-8 md:p-14 relative flex flex-col justify-center">
            
            <!-- Mobile Logo -->
            <div class="md:hidden flex flex-col items-center mb-10">
                <img src="<?= BASE_URL ?>img/logo.png" alt="Logo" class="w-24 h-24 object-cover rounded-2xl shadow-xl mb-4 border border-stone-200 dark:border-stone-700">
                <h1 class="text-3xl font-black tracking-tight text-stone-900 dark:text-stone-50">Pawon Selaras</h1>
            </div>

            <div class="mb-8">
                <h2 class="text-3xl font-bold mb-2 text-stone-800 dark:text-stone-100">Selamat Datang</h2>
                <p class="text-stone-500 dark:text-stone-400 text-sm">Silakan masuk untuk melanjutkan.</p>
            </div>

            <?php if (isset($_SESSION['flash'])): ?>
                <?php if ($_SESSION['flash']['type'] === 'error'): ?>
                    <div class="mb-6 flex items-center gap-2 p-3 text-sm text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-400/10 border border-red-100 dark:border-red-400/20 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                        <span><?= $_SESSION['flash']['message'] ?></span>
                    </div>
                <?php elseif ($_SESSION['flash']['type'] === 'success'): ?>
                    <div class="mb-6 flex items-center gap-2 p-3 text-sm text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-400/10 border border-emerald-100 dark:border-emerald-400/20 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                        <span><?= $_SESSION['flash']['message'] ?></span>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>auth/login" method="POST" class="space-y-4">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                <!-- Email Input -->
                <div>
                    <label class="form-label" for="email">Email atau Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" class="form-input pl-11" placeholder="nama@email.com" required>
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label class="form-label" for="password">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" class="form-input pl-11 pr-11" placeholder="••••••••" required>
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-stone-400 hover:text-stone-600 dark:hover:text-white transition-colors focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" id="eyeIcon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Checkbox & Forgot Password -->
                <div class="flex items-center justify-between text-sm py-2">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" class="w-4 h-4 rounded border-stone-300 dark:border-stone-600 bg-white dark:bg-stone-800 text-brand-yellow focus:ring-brand-yellow/50">
                        <span class="text-stone-500 dark:text-stone-400 group-hover:text-stone-800 dark:group-hover:text-stone-200 transition-colors">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-brand-yellow hover:opacity-80 font-bold transition-colors">Lupa Password?</a>
                </div>

                <!-- Submit Buttons -->
                <div class="pt-2 grid grid-cols-2 gap-3">
                    <a href="<?= BASE_URL ?>home/index" class="btn-secondary w-full">
                        Kembali
                    </a>
                    <button type="submit" class="btn-primary w-full">
                        Masuk
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center text-base text-stone-500 dark:text-stone-400">
                Belum punya akun? <a href="<?= BASE_URL ?>auth/register" class="text-stone-900 dark:text-stone-50 font-bold hover:underline transition-colors">Daftar</a>
            </div>
        </div>
    </div>

    <p class="text-center text-stone-400 text-xs mt-8 font-medium tracking-wide">
        &copy; <?= date('Y') ?> Hrvndi PTIK. All rights reserved.
    </p>

    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

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

        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

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