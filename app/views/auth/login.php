<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Login' ?></title>
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
                @apply bg-brand-yellow text-stone-900 font-bold py-4 px-6 rounded-2xl shadow-lg shadow-brand-yellow/30 hover:opacity-90 active:scale-[0.98] transition-all flex items-center justify-center gap-2 uppercase tracking-widest;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-stone-50 to-stone-200 flex items-center justify-center min-h-screen p-4 font-sans antialiased">

    <div class="w-full max-w-md animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-brand-yellow rounded-2xl shadow-xl shadow-brand-yellow/20 mb-4 transform hover:rotate-6 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-stone-900" fill="none" viewBox="24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <h1 class="text-3xl font-black text-stone-900 tracking-tight">Pawon Selaras</h1>
            <p class="text-stone-500 font-medium">Sistem Informasi Akuntansi Produksi</p>
        </div>

        <div class="bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-2xl border border-white">
            <h2 class="text-xl font-bold text-stone-800 mb-6">Selamat Datang Kembali!</h2>
            
            <?php if (isset($_SESSION['flash'])): ?>
                <div class="mb-6 flex items-center gap-3 p-4 text-sm text-rose-800 bg-rose-50 border border-rose-100 rounded-2xl animate-shake">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium"><?= $_SESSION['flash']['message'] ?></span>
                </div>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>auth/login" method="POST" class="space-y-5">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                
                <div>
                    <label class="block text-stone-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1" for="email">Email Address</label>
                    <input class="w-full bg-stone-50 border-stone-900/10 border-2 rounded-2xl py-3 px-4 text-stone-800 leading-tight focus:outline-none focus:border-brand-yellow focus:ring-4 focus:ring-brand-yellow/10 transition-all placeholder:text-stone-400" id="email" type="email" name="email" placeholder="nama@rmpawon.com" required>
                </div>
                
                <div>
                    <label class="block text-stone-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1" for="password">Password</label>
                    <input class="w-full bg-stone-50 border-stone-900/10 border-2 rounded-2xl py-3 px-4 text-stone-800 leading-tight focus:outline-none focus:border-brand-yellow focus:ring-4 focus:ring-brand-yellow/10 transition-all placeholder:text-stone-400" id="password" type="password" name="password" placeholder="••••••••" required>
                </div>
                
                <div class="pt-2">
                    <button class="btn-primary w-full" type="submit">
                        Masuk ke Sistem
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-stone-500 text-xs mt-8 font-medium">
            &copy; <?= date('Y') ?> Hrvndi PTIK. All rights reserved.
        </p>
    </div>

    <style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-4px); }
        75% { transform: translateX(4px); }
    }
    .animate-fade-in { animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .animate-shake { animation: shake 0.2s ease-in-out 0s 2; }
    </style>
</body>
</html>

