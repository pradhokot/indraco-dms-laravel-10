/**
 * INDRACO Document Management System (DMS)
 * Core Application Script - /assets/js/app.js
 */

(() => {
   'use strict';

   const THEME_STORAGE_KEY = 'indraco_dms_theme';

   /**
    * Mendapatkan tema yang tersimpan di localStorage
    */
   const getStoredTheme = () => localStorage.getItem(THEME_STORAGE_KEY);

   /**
    * Menyimpan tema ke localStorage
    */
   const setStoredTheme = (theme) => localStorage.setItem(THEME_STORAGE_KEY, theme);

   /**
    * Mendeteksi preferensi tema:
    * 1. Dari localStorage jika pernah dipilih oleh user
    * 2. Dari preferensi tema sistem/browser jika belum ada di localStorage
    */
   const getPreferredTheme = () => {
      const storedTheme = getStoredTheme();
      if (storedTheme) {
         return storedTheme;
      }
      return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
   };

   /**
    * Memperbarui ikon dan title pada tombol pengalih tema:
    * - Saat tema terang aktif: tampilkan ikon moon-stars untuk beralih ke gelap
    * - Saat tema gelap aktif: tampilkan ikon sun untuk beralih ke terang
    */
   const updateThemeToggleUI = (theme) => {
      const toggleButtons = document.querySelectorAll('[data-bs-theme-toggle]');
      toggleButtons.forEach((btn) => {
         const icon = btn.querySelector('i');
         if (theme === 'dark') {
            if (icon) {
               icon.className = 'bi bi-sun-fill text-warning';
            }
            btn.setAttribute('title', 'Ubah ke Tema Terang');
            btn.setAttribute('aria-label', 'Ubah ke Tema Terang');
         } else {
            if (icon) {
               icon.className = 'bi bi-moon-stars-fill';
            }
            btn.setAttribute('title', 'Ubah ke Tema Gelap');
            btn.setAttribute('aria-label', 'Ubah ke Tema Gelap');
         }
      });
   };

   /**
    * Memperbarui sumber gambar (src) untuk elemen yang terpengaruh tema:
    * Mendukung atribut standar:
    * - data-img-theme-light & data-img-theme-dark
    * - data-theme-light & data-theme-dark
    */
   const updateThemeImages = (theme) => {
      const images = document.querySelectorAll(
         'img[data-img-theme-light], img[data-img-theme-dark], img[data-theme-light], img[data-theme-dark]'
      );
      images.forEach((img) => {
         const lightSrc = img.getAttribute('data-img-theme-light') || img.getAttribute('data-theme-light');
         const darkSrc = img.getAttribute('data-img-theme-dark') || img.getAttribute('data-theme-dark');

         if (theme === 'dark' && darkSrc) {
            if (img.getAttribute('src') !== darkSrc) {
               img.setAttribute('src', darkSrc);
            }
         } else if (theme === 'light' && lightSrc) {
            if (img.getAttribute('src') !== lightSrc) {
               img.setAttribute('src', lightSrc);
            }
         }
      });
   };

   /**
    * Mengatur tema pada atribut HTML root dan memperbarui semua elemen UI
    */
   const setTheme = (theme) => {
      document.documentElement.setAttribute('data-bs-theme', theme);
      updateThemeToggleUI(theme);
      updateThemeImages(theme);
   };

   /**
    * Memperbarui status UI tombol fullscreen (bi-fullscreen <-> bi-fullscreen-exit)
    */
   const updateFullscreenUI = () => {
      const isFullscreen = !!(
         document.fullscreenElement ||
         document.webkitFullscreenElement ||
         document.mozFullScreenElement ||
         document.msFullscreenElement
      );

      document.querySelectorAll('[data-action="fullscreen"]').forEach((btn) => {
         const icon = btn.querySelector('i');
         if (isFullscreen) {
            if (icon) {
               icon.className = 'bi bi-fullscreen-exit';
            }
            btn.setAttribute('title', 'Keluar Layar Penuh [Exit Fullscreen]');
            btn.setAttribute('aria-label', 'Keluar Layar Penuh');
         } else {
            if (icon) {
               icon.className = 'bi bi-fullscreen';
            }
            btn.setAttribute('title', 'Layar Penuh [Fullscreen]');
            btn.setAttribute('aria-label', 'Layar Penuh');
         }
      });
   };

   /**
    * Jam & Tanggal Digital Real-Time di Footer (Format: HH:mm WIB | Hari, DD Bulan YYYY)
    */
   const initLiveClock = () => {
      const timeElements = document.querySelectorAll('[data-live-time]');
      const dateElements = document.querySelectorAll('[data-live-date]');

      if (!timeElements.length && !dateElements.length) return;

      const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const months = [
         'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
         'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ];

      const updateClock = () => {
         const now = new Date();

         // Format Waktu: HH:mm WIB
         const hours = String(now.getHours()).padStart(2, '0');
         const minutes = String(now.getMinutes()).padStart(2, '0');
         const timeString = `${hours}:${minutes} WIB`;

         // Format Tanggal: Hari, DD Bulan YYYY
         const dayName = days[now.getDay()];
         const dateNum = String(now.getDate()).padStart(2, '0');
         const monthName = months[now.getMonth()];
         const year = now.getFullYear();
         const dateString = `${dayName}, ${dateNum} ${monthName} ${year}`;

         timeElements.forEach((el) => {
            if (el.textContent !== timeString) {
               el.textContent = timeString;
            }
         });

         dateElements.forEach((el) => {
            if (el.textContent !== dateString) {
               el.textContent = dateString;
            }
         });
      };

      // Jalankan langsung sekali lalu perbarui setiap detik
      updateClock();
      setInterval(updateClock, 1000);
   };

   // 1. Terapkan tema segera saat script dieksekusi untuk mencegah flash putih/hitam
   const initialTheme = getPreferredTheme();
   document.documentElement.setAttribute('data-bs-theme', initialTheme);

   // 2. Inisialisasi event listener setelah DOM selesai dimuat
   document.addEventListener('DOMContentLoaded', () => {
      // Pastikan UI tombol, gambar, jam, dan status fullscreen sinkron
      updateThemeToggleUI(getPreferredTheme());
      updateThemeImages(getPreferredTheme());
      updateFullscreenUI();
      initLiveClock();

      // Perbarui tahun copyright otomatis untuk elemen dengan data-year
      document.querySelectorAll('[data-year]').forEach((el) => {
         el.textContent = new Date().getFullYear();
      });

      // Tangani klik tombol ubah tema
      document.querySelectorAll('[data-bs-theme-toggle]').forEach((toggleBtn) => {
         toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const currentTheme = document.documentElement.getAttribute('data-bs-theme') || 'light';
            const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
            setStoredTheme(nextTheme);
            setTheme(nextTheme);
         });
      });

      // Tangani tombol refresh halaman dengan animasi putaran berlawanan jarum jam
      document.querySelectorAll('[data-action="refresh"]').forEach((btn) => {
         btn.addEventListener('click', (e) => {
            e.preventDefault();
            const icon = btn.querySelector('i');
            if (icon) {
               icon.classList.add('spin-counter-clockwise');
            }
            btn.classList.add('disabled');
            btn.setAttribute('aria-disabled', 'true');

            // Beri jeda 400ms agar animasi putaran berlawanan jarum jam terlihat sebelum reload
            setTimeout(() => {
               window.location.reload();
            }, 400);
         });
      });

      // Tangani tombol layar penuh (fullscreen)
      document.querySelectorAll('[data-action="fullscreen"]').forEach((btn) => {
         btn.addEventListener('click', (e) => {
            e.preventDefault();
            if (!document.fullscreenElement) {
               document.documentElement.requestFullscreen().catch((err) => {
                  console.warn('Gagal masuk mode layar penuh:', err);
               });
            } else {
               document.exitFullscreen().catch((err) => {
                  console.warn('Gagal keluar mode layar penuh:', err);
               });
            }
         });
      });

      // Sinkronisasi status fullscreen (baik saat klik tombol maupun saat user menekan ESC)
      document.addEventListener('fullscreenchange', updateFullscreenUI);
      document.addEventListener('webkitfullscreenchange', updateFullscreenUI);
      document.addEventListener('mozfullscreenchange', updateFullscreenUI);
      document.addEventListener('MSFullscreenChange', updateFullscreenUI);
   });

   // 3. Pantau perubahan tema browser/OS secara otomatis jika user belum memilih manual
   window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
      const storedTheme = getStoredTheme();
      if (!storedTheme) {
         setTheme(getPreferredTheme());
      }
   });

   // Expose helper secara global jika dibutuhkan
   window.IndracoTheme = {
      getTheme: () => document.documentElement.getAttribute('data-bs-theme') || 'light',
      setTheme: setTheme,
      updateImages: updateThemeImages,
   };
})();
