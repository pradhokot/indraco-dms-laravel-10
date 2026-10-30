# Dokumen Konsep & Arsitektur - INDRACO Document Management System (DMS)

> Dokumen ini merangkum seluruh kesepakatan desain, struktur template Blade, database, dan implementasi fitur hingga tahap terakhir.

---

## 1. Ikhtisar & Karakteristik Aplikasi
- **Platform:** Laravel 10 (PHP 8.2 FPM + Apache)
- **Target Tampilan:** Berorientasi pada **Web View / Desktop Wrapper** dengan resolusi minimal layar 1024x720px (`app-wrapper`).
- **Akses Langsung Localhost (Tanpa Artisan Serve):**
  - URL Base: `http://localhost/PHP82/indraco-dms-laravel-10/public/`
  - URL Login: `http://localhost/PHP82/indraco-dms-laravel-10/public/login`
  - URL Super Admin: `http://localhost/PHP82/indraco-dms-laravel-10/public/admin`
  - URL Admin Gudang: `http://localhost/PHP82/indraco-dms-laravel-10/public/gudang`
  - URL Departemen: `http://localhost/PHP82/indraco-dms-laravel-10/public/departemen`

---

## 2. Tipe Akun & Manajemen Akun (Role-Based Access)

Aplikasi memiliki **3 Tipe Akun Utama**:

| Tipe Akun (`role`) | Kode | Deskripsi & Hak Akses |
| :--- | :--- | :--- |
| **Super Admin** | `admin` | Akses penuh seluruh modul master, manajemen akun pengguna, audit trail global, dan persetujuan pemusnahan arsip. |
| **Admin Gudang** | `gudang` | Pengelolaan arsip fisik di gudang, penempatan rak/slot, alokasi permohonan simpan/tarik berkas, dan visualisasi denah 2D gudang. |
| **Departemen** | `departemen` | Pengajuan formulir simpan/tarik/perpanjang/pemusnahan dan inventaris arsip internal milik departemen masing-masing (FAT, HCS, GA, Logistik, Marketing, Purchasing, dll.). |

### Database & Akun Default
- **Database:** `indraco_dms_db` (MySQL root / root)
- **Tabel Utama:**
  - `roles`: Menyimpan 3 tipe akun (`admin`, `gudang`, `departemen`).
  - `departments`: Menyimpan master departemen (`FAT`, `HCS`, `GA`, `LOG`, `MKT`, `PUR`).
  - `users`: Menyimpan kredensial user berbasis `username` dengan foreign key ke `roles` dan `departments`.
- **Akun Bawaan (Password Default: `password`):**
  - Super Admin: `admin`
  - Admin Gudang: `gudang`
  - Departemen: `FAT`, `HCS`, `GA`, `logistik`, `marketing`, `purchasing`

---

## 3. Struktur Template Blade (DRY & Modular)

```
resources/views/
├── layouts/
│   ├── app.blade.php             # Layout tunggal utama aplikasi (Header, Nav, Content, Footer, Offcanvas)
│   ├── dashboard.blade.php       # Alias/wrapper layout app
│   └── auth.blade.php            # Layout halaman autentikasi (Background cover, overlay, utility menu, power button)
├── partials/
│   ├── app-header.blade.php      # Header (Logo, Search, Identitas Role & Dept aktif, Utility, Logout)
│   ├── app-nav.blade.php         # Navigasi utama dengan penyaringan menu otomatis per peran
│   ├── app-footer.blade.php      # Footer (Copyright dinamis, Jam & Tanggal live, Notifikasi, Status Koneksi)
│   └── app-setting.blade.php     # Offcanvas panel konfigurasi
├── components/
│   ├── utility-buttons.blade.php # Grup tombol utilitas murni (Ubah Tema, Refresh, Fullscreen)
│   └── brand-logo.blade.php      # Komponen logo INDRACO responsif tema & ukuran (sm / lg)
├── pages/
│   └── dashboard/
│       ├── admin.blade.php       # View dashboard khusus Super Admin
│       ├── gudang.blade.php      # View dashboard khusus Admin Gudang
│       └── departemen.blade.php  # View dashboard khusus Departemen
├── dashboard.blade.php           # View dispatcher dashboard dinamis sesuai role aktif
└── auth/
    └── login.blade.php           # Halaman login dengan alert notifikasi logout interaktif & aman
```

---

## 4. Fitur Interaktif JavaScript & Styling (`public/assets/js/app.js`)

Semua fungsi utilitas inti disatukan dalam **satu file tunggal (`app.js`)** untuk memaksimalkan performa, menghemat HTTP request, dan memanfaatkan caching browser. Modul JS khusus (seperti denah canvas atau chart analitik) baru akan dipisah secara modular per halaman saat dibutuhkan.

### A. Pengalih Tema (Dark / Light Mode)
- **Deteksi Otomatis:** Membaca preferensi browser (`prefers-color-scheme: dark`) saat pertama kali dibuka.
- **Penyimpanan:** Disimpan ke `localStorage ('indraco_dms_theme')`.
- **Atribut Root:** Mengatur `data-bs-theme="light"` atau `"dark"` pada tag `<html>`.
- **Perilaku Ikon:**
  - Tema Terang aktif ➔ Ikon **Bulan-Bintang** (`bi-moon-stars-fill`) dengan tooltip *"Ubah ke Tema Gelap"*.
  - Tema Gelap aktif ➔ Ikon **Matahari** (`bi-sun-fill text-warning`) dengan tooltip *"Ubah ke Tema Terang"*.
- **Bebas Kedipan:** Script dimuat di `<head>` agar tema terpasang instan sebelum halaman selesai dirender.

### B. Gambar Adaptif Tema (Theme-Aware Images)
- Setiap gambar yang ingin berganti warna saat tema gelap cukup diberi atribut:
  ```html
  <img src="logo_normal.png"
       data-img-theme-light="logo_normal.png"
       data-img-theme-dark="logo_invert.png">
  ```
- Logo INDRACO ([`components/brand-logo.blade.php`](file:///var/www/PHP82/indraco-dms-laravel-10/resources/views/components/brand-logo.blade.php)) otomatis berganti ke `logo_indraco_invert.png` di mode gelap agar tetap terbaca jelas dan kontras.

### C. Segarkan Halaman (Refresh)
- Tombol dengan `data-action="refresh"` memutar ikon `bi-arrow-counterclockwise` berlawanan arah jarum jam melalui animasi CSS:
  ```css
  @keyframes spin-counter-clockwise {
     from { transform: rotate(0deg); }
     to { transform: rotate(-360deg); }
  }
  ```
- Diberikan jeda 400ms sebelum `window.location.reload()` agar animasi putaran terlihat jelas oleh pengguna.

### D. Layar Penuh (Fullscreen)
- Tombol dengan `data-action="fullscreen"` berganti ikon secara dinamis:
  - Masuk Fullscreen ➔ Berganti ke **`bi-fullscreen-exit`**.
  - Keluar Fullscreen ➔ Kembali ke **`bi-fullscreen`**.
- Sinkronisasi otomatis dengan event browser `fullscreenchange` (ikon tetap sinkron jika user menekan tombol `ESC`).

### E. Jam & Tanggal Digital Real-Time di Footer (WIB)
- Ditandai dengan atribut `data-live-time` dan `data-live-date`.
- Berjalan otomatis secara *real-time* setiap detik dalam format:
  - **Waktu:** `HH:mm WIB` (misal: `16:37 WIB`)
  - **Tanggal Bahasa Indonesia:** `Hari, DD Bulan YYYY` (misal: `Jumat, 30 Oktober 2026`)
- Timezone aplikasi diatur ke **`Asia/Jakarta`** (WIB) dan locale **`id`**.

### F. Tahun Hak Cipta Dinamis (Copyright Year)
- Menggunakan pendekatan paling ringan dengan **Blade PHP `{{ date('Y') }}`** (zero overhead di browser).
- Pada file template HTML statis, didukung atribut `data-year` yang otomatis diisi oleh `app.js`.

### G. Catatan Teknis Fullscreen & Refresh:
- **Standar Web Browser Biasa:** Sesuai kebijakan keamanan W3C (*User Activation Requirement*), browser melarang script menjalankan `requestFullscreen()` otomatis saat halaman dimuat/direfresh tanpa ada interaksi klik dari pengguna.
- **Solusi untuk WebView / Kiosk Mode:** Jika aplikasi ini nantinya dijalankan dalam container WebView (Electron, Android WebView wrapper, atau Chromium Kiosk Mode), status fullscreen dapat dikunci langsung dari level native container window-nya, sehingga ukuran layar tetap fullscreen penuh meskipun halaman di-refresh berkali-kali.
