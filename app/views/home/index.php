<div class="space-y-16 py-8 animate-fade-in">
    <!-- Hero Section -->
    <div
        class="relative overflow-hidden rounded-[2.5rem] bg-white dark:bg-stone-900 text-stone-900 dark:text-white p-8 md:p-16 border border-stone-200 dark:border-white/10 shadow-xl dark:shadow-2xl transition-colors duration-300">
        <div class="relative z-10 max-w-2xl text-center md:text-left mx-auto md:mx-0">
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 mb-6">
                <div class="flex items-center gap-3">
                    <img src="<?= BASE_URL ?>img/logo.png" alt="Logo Small" class="w-12 h-12 object-cover rounded-2xl shadow-xl shadow-brand-yellow/20 border-2 border-brand-yellow">
                    <span
                        class="inline-block px-4 py-1 rounded-full bg-brand-yellow text-stone-900 text-xs font-bold uppercase tracking-widest shadow-sm">
                        RM Pawon Selaras
                    </span>
                </div>
                <!-- Real-time Status Label -->
                <div class="flex items-center gap-2 bg-stone-100 dark:bg-stone-800/50 px-3 py-1.5 rounded-full border border-stone-200 dark:border-stone-700/50 shadow-inner">
                    <div id="status-dot" class="w-2 h-2 rounded-full transition-all duration-500"></div>
                    <span id="status-text" class="text-[10px] font-black uppercase tracking-[0.2em] transition-all duration-500">Memuat...</span>
                </div>
            </div>

            <script>
                function updateStoreStatus() {
                    try {
                        // WITA is Asia/Makassar (UTC+8)
                        const options = { timeZone: 'Asia/Makassar', hour: 'numeric', hour12: false };
                        const formatter = new Intl.DateTimeFormat('en-US', options);
                        const hour = parseInt(formatter.format(new Date()));
                        
                        const statusDot = document.getElementById('status-dot');
                        const statusText = document.getElementById('status-text');
                        
                        // Open: 10:00 - 16:59 (5 PM is 17)
                        const isOpen = hour >= 10 && hour < 17;
                        
                        if (isOpen) {
                            statusDot.classList.remove('bg-rose-500');
                            statusDot.classList.add('bg-emerald-500', 'animate-pulse');
                            statusText.innerText = 'Buka Sekarang';
                            statusText.classList.remove('text-rose-500');
                            statusText.classList.add('text-emerald-500');
                        } else {
                            statusDot.classList.remove('bg-emerald-500', 'animate-pulse');
                            statusDot.classList.add('bg-rose-500');
                            statusText.innerText = 'Tutup';
                            statusText.classList.remove('text-emerald-500');
                            statusText.classList.add('text-rose-500');
                        }
                    } catch (e) {
                        console.error('Error updating status:', e);
                    }
                }
                
                // Update every 30 seconds
                setInterval(updateStoreStatus, 30000);
                // Initial update
                document.addEventListener('DOMContentLoaded', updateStoreStatus);
            </script>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 tracking-tight">
                Cita Rasa <span class="text-brand-yellow">Autentik</span> di Setiap Hidangan
            </h1>
            <p class="text-stone-500 dark:text-stone-400 text-lg mb-10 leading-relaxed font-medium">
                UMKM kuliner terpercaya di Minahasa yang menyajikan makanan siap saji dan katering sejak 2025. Nikmati cita rasa Bakso, Mie Ayam, hingga Gado-gado legendaris kami.
            </p>
            <div class="flex flex-wrap justify-center md:justify-start gap-4">
                <a href="#menu-pilihan" class="btn-primary">
                    Lihat Menu
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <a href="<?= BASE_URL ?>home/about" class="btn-secondary shadow-sm">
                    Tentang Kami
                </a>
            </div>
        </div>

        <!-- Abstract Decoration & Logo Watermark -->
        <div class="absolute top-0 right-0 w-full lg:w-1/2 h-full flex items-center justify-center pointer-events-none overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-l from-white/50 dark:from-stone-900/50 to-transparent z-10 hidden lg:block"></div>
            <div class="w-96 h-96 bg-brand-yellow/10 rounded-full blur-3xl absolute -right-20 -top-20"></div>
            <div class="w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl absolute -right-40 -bottom-40"></div>
            
            <div class="relative z-0 opacity-[0.03] dark:opacity-[0.08] lg:opacity-10 dark:lg:opacity-20 transform lg:translate-x-24 rotate-12 transition-all duration-1000">
                <img src="<?= BASE_URL ?>img/logo.png" alt="Logo Watermark" class="w-80 md:w-[40rem] h-auto object-contain">
            </div>
        </div>


    </div>

    <!-- Stats/Features -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div
            class="bg-white dark:bg-stone-800 p-8 rounded-3xl shadow-sm border border-stone-100 dark:border-stone-700/50">
            <div
                class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Bahan Segar</h3>
            <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed">Setiap bahan dipasok harian dan
                melalui kontrol kualitas yang ketat.</p>
        </div>
        <div
            class="bg-white dark:bg-stone-800 p-8 rounded-3xl shadow-sm border border-stone-100 dark:border-stone-700/50">
            <div
                class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 rounded-2xl flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Produksi Higienis</h3>
            <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed">Proses masak menggunakan standar
                kebersihan tinggi untuk keamanan Anda.</p>
        </div>
        <div
            class="bg-white dark:bg-stone-800 p-8 rounded-3xl shadow-sm border border-stone-100 dark:border-stone-700/50">
            <div
                class="w-12 h-12 bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 rounded-2xl flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold mb-2">Resep Warisan</h3>
            <p class="text-stone-500 dark:text-stone-400 text-sm leading-relaxed">Menjaga cita rasa tradisional tetap
                hidup di setiap gigitan.</p>
        </div>
    </div>

    <!-- Menu Section -->
    <div id="menu-pilihan" class="space-y-12">
        <div class="text-center max-w-xl mx-auto">
            <h2 class="text-3xl font-extrabold mb-4">Menu Pilihan Pawon Selaras</h2>
            <p class="text-stone-500 dark:text-stone-400">Daftar hidangan favorit pelanggan yang siap memanjakan lidah Anda.</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex justify-center p-1 bg-stone-100 dark:bg-stone-800 rounded-2xl w-fit mx-auto shadow-inner">
            <button onclick="switchTab('Makanan')" id="tab-Makanan" class="tab-btn px-8 py-3 rounded-xl font-bold text-sm transition-all duration-300 bg-brand-yellow text-stone-900 shadow-sm">
                Makanan
            </button>
            <button onclick="switchTab('Minuman')" id="tab-Minuman" class="tab-btn px-8 py-3 rounded-xl font-bold text-sm transition-all duration-300 text-stone-500 dark:text-stone-400 hover:text-stone-700 dark:hover:text-stone-200">
                Minuman
            </button>
        </div>

        <style>
            .marquee-parent { width: 100%; overflow: hidden; position: relative; }
            .marquee-child { 
                display: inline-block; 
                white-space: nowrap; 
                transition: transform 2.5s ease-in-out; 
                transform: translateX(0);
            }
            .group:hover .marquee-child,
            .group:active .marquee-child {
                transform: translateX(var(--scroll-dist, 0));
            }
        </style>
        <script>
            function initMarquees() {
                document.querySelectorAll('.marquee-child').forEach(el => {
                    const parentWidth = el.parentElement.offsetWidth;
                    const scrollWidth = el.scrollWidth;
                    if (scrollWidth > parentWidth) {
                        const distance = scrollWidth - parentWidth;
                        el.style.setProperty('--scroll-dist', `-${distance + 20}px`);
                    }
                });
            }

            function switchTab(category) {
                // Toggle Buttons
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('bg-brand-yellow', 'text-stone-900', 'shadow-sm');
                    btn.classList.add('text-stone-500', 'dark:text-stone-400');
                });
                const activeBtn = document.getElementById('tab-' + category);
                activeBtn.classList.add('bg-brand-yellow', 'text-stone-900', 'shadow-sm');
                activeBtn.classList.remove('text-stone-500', 'dark:text-stone-400');

                // Toggle Content
                document.querySelectorAll('.menu-grid').forEach(grid => {
                    grid.classList.add('hidden');
                });
                document.getElementById('grid-' + category).classList.remove('hidden');
                
                // Re-init marquees for newly visible items
                initMarquees();
            }

            window.addEventListener('load', initMarquees);
            window.addEventListener('resize', initMarquees);
        </script>

        <?php 
        $categories = ['Makanan', 'Minuman'];
        foreach($categories as $cat):
            $filteredMenus = array_filter($menus, fn($m) => ($m['kategori'] ?? 'Makanan') == $cat);
        ?>
            <div id="grid-<?= $cat ?>" class="menu-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 <?= $cat !== 'Makanan' ? 'hidden' : '' ?> animate-fade-in">
                <?php if(empty($filteredMenus)): ?>
                    <div class="col-span-full py-12 text-center bg-stone-50 dark:bg-stone-800/50 rounded-3xl border-2 border-dashed border-stone-200 dark:border-stone-700">
                        <p class="text-stone-400">Belum ada menu <?= strtolower($cat) ?> yang ditampilkan.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($filteredMenus as $m): ?>
                        <div class="group bg-white dark:bg-stone-800 rounded-[2rem] overflow-hidden border border-stone-100 dark:border-stone-700/50 hover:shadow-2xl hover:shadow-brand-yellow/10 transition-all duration-500 hover:-translate-y-2 <?= !$m['is_available'] ? 'opacity-90 grayscale' : '' ?>">
                            <div class="aspect-square bg-stone-100 dark:bg-stone-900 flex items-center justify-center relative overflow-hidden">
                                <?php if ($m['gambar']): ?>
                                    <img src="<?= BASE_URL ?>img/menu/<?= $m['gambar'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 <?= !$m['is_available'] ? 'brightness-50' : '' ?>">
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-stone-300 dark:text-stone-700 group-hover:scale-110 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                <?php endif; ?>

                                <?php if (!$m['is_available']): ?>
                                    <div class="absolute inset-0 bg-stone-900/20 backdrop-blur-[1px] flex items-center justify-center z-30">
                                        <span class="px-5 py-2 bg-rose-600 text-white font-black uppercase tracking-[0.2em] rounded-xl shadow-2xl rotate-[-10deg] text-xl border-2 border-white/30 scale-110">
                                            Habis
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($m['is_best_seller']) && $m['is_best_seller'] && $m['is_available']): ?>
                                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-brand-yellow text-stone-900 text-[10px] font-black uppercase tracking-widest shadow-lg flex items-center gap-1 z-20">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        Best Seller
                                    </div>
                                <?php endif; ?>
                                <div class="absolute top-4 right-4 px-3 py-1 rounded-full <?= $m['is_available'] ? 'bg-white/90 text-stone-800' : 'bg-rose-500 text-white' ?> backdrop-blur-md text-[10px] font-black uppercase tracking-widest shadow-sm z-20">
                                    <?= $m['is_available'] ? 'Tersedia' : 'Habis' ?>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="marquee-parent mb-1">
                                    <h4 class="text-lg font-bold text-stone-800 dark:text-stone-100 marquee-child">
                                        <?= htmlspecialchars($m['nama']) ?>
                                    </h4>
                                </div>
                                <p class="text-stone-400 dark:text-stone-500 text-xs mb-4">Hidangan Spesial Pawon Selaras</p>
                                <div class="flex items-center">
                                    <span class="text-xl font-medium text-brand-yellow">
                                        Rp<?= number_format($m['harga_jual'], 0, ',', '.') ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Contact CTA -->
    <div
        class="bg-brand-yellow dark:bg-stone-800 rounded-[2.5rem] p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8 border border-transparent dark:border-brand-yellow/20 shadow-xl transition-all duration-300">
        <div>
            <h2 class="text-3xl font-black text-stone-900 dark:text-brand-yellow mb-2">Ingin Reservasi atau Pesan Antar?
            </h2>
            <p class="text-stone-700 dark:text-stone-400 font-medium">Hubungi kami melalui WhatsApp untuk layanan lebih
                cepat.</p>
        </div>
        <a href="https://wa.me/your-number" target="_blank"
            class="bg-stone-900 dark:bg-brand-yellow text-white dark:text-stone-900 px-8 py-4 rounded-2xl font-bold shadow-xl shadow-stone-900/20 dark:shadow-brand-yellow/10 hover:scale-105 active:scale-95 transition-all flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
            Chat Sekarang
        </a>
        </div>
</div>