# SIA Pawon Selaras 🍲🥤

Sistem Informasi Akuntansi dan Manajemen Menu untuk **RM Pawon Selaras**. Aplikasi ini dirancang menggunakan arsitektur MVC (Model-View-Controller) native PHP untuk mengelola operasional rumah makan dengan tampilan modern dan interaktif.

## ✨ Fitur Utama

### 🍽️ Manajemen Menu Digital
- **Kategorisasi Otomatis**: Pemisahan cerdas antara 'Makanan' dan 'Minuman' menggunakan sistem Tab yang responsif.
- **Sistem Marquee Cerdas**: Nama menu yang panjang akan berjalan otomatis (marquee) saat di-hover atau disentuh, memastikan teks tetap terbaca tanpa merusak layout.
- **Prioritas Best Seller**: Menu favorit pelanggan secara otomatis tampil di posisi teratas.
- **Status Ketersediaan Real-time**:
  - Admin dapat mengubah status stok (Tersedia/Habis) secara instan via AJAX.
  - Menu yang habis akan otomatis pindah ke posisi paling bawah.
  - Efek visual *grayscale* dan overlay label "Habis" yang mencolok untuk memudahkan pelanggan.

### 🛠️ Panel Admin (Backend)
- **Dashboard CRUD**: Pengelolaan menu lengkap (Nama, Harga, Gambar, Kategori).
- **Manajemen Bahan**: Modul untuk memantau stok bahan baku.
- **Antarmuka Modern**: Desain berbasis Tailwind CSS dengan dukungan Dark Mode.

### 📱 Pengalaman Pengguna (UX)
- **Desain Premium**: Menggunakan estetika modern dengan *glassmorphism*, gradasi halus, dan tipografi berkualitas.
- **Responsif**: Optimal di perangkat desktop maupun smartphone (Mobile First).

## 🚀 Teknologi yang Digunakan
- **Core**: Native PHP (MVC Architecture)
- **Database**: MySQL / MariaDB
- **Frontend**: Tailwind CSS, Vanilla JavaScript
- **Icons**: Heroicons / Lucide Icons

## 🛠️ Instalasi Lokal

1. **Clone Repositori**:
   ```bash
   git clone https://github.com/hervandisipada/sia-production.git
   ```

2. **Konfigurasi Database**:
   - Buat database baru bernama `sia_production`.
   - Import file SQL (jika tersedia) atau jalankan migrasi manual.
   - Sesuaikan konfigurasi di `app/config/database.php`.

3. **Jalankan di XAMPP**:
   - Letakkan folder project di `C:\xampp\htdocs\`.
   - Akses melalui browser di `http://localhost/sia-production`.

## 📝 Catatan Pengembangan
Proyek ini terus dikembangkan untuk mencakup modul akuntansi yang lebih mendalam, termasuk perhitungan HPP otomatis dan laporan laba rugi.

---
Dikembangkan oleh **hervandisipada**.
