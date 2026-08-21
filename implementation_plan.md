# Rencana Migrasi Website "Slot atau Deposito?" ke Laravel

Rencana ini menjelaskan langkah-langkah migrasi website dari kode HTML Canva Web export menjadi aplikasi web berbasis Laravel yang terstruktur, responsive, dan berjalan tanpa ketergantungan Canva SDK.

## User Review Required

> [!IMPORTANT]
> - Ketergantungan pada Canva SDK (`__codeletBootstrap__` dan `/_sdk/...`) akan dihapus total.
> - Elemen bertanda `data-template-id` akan diisi langsung dengan teks & HTML bermakna sesuai desain Canva.
> - Tidak ada tabel database baru atau autentikasi yang ditambahkan (aplikasi berjalan client-side simulator).
> - Gambar hero akan menggunakan `public/images/hero.jpg` dengan fallback SVG/CSS yang elegan agar tidak ada *broken image* / 404.

## Proposed Changes

### Configuration & Deployment Setup

#### [NEW] [vercel.json](file:///C:/laragon/www/slot-deposito/vercel.json)
Membuat file konfigurasi Vercel agar project Laravel siap dideploy ke Vercel tanpa kendala routing.

---

### Layouts & Blade Views

#### [NEW] [app.blade.php](file:///C:/laragon/www/slot-deposito/resources/views/layouts/app.blade.php)
Layout master Laravel yang memuat:
- Meta tags & Title
- Google Fonts (DM Sans, Fraunces)
- Tailwind CSS CDN (`3.4.17`)
- Lucide Icons CDN (`0.263.0`)
- Link CSS aplikasi (`public/css/app.css`)
- `@yield('title')`, `@yield('content')`, `@yield('scripts')`
- Script JS simulator (`public/js/simulator.js`)

#### [NEW] [home.blade.php](file:///C:/laragon/www/slot-deposito/resources/views/home.blade.php)
Halaman beranda Blade yang memperluas `layouts.app`:
- **Navbar**: Logo Landmark, Brand Title ("Slot atau Deposito?"), Navigation Links (Simulator, Belajar, Nasihat), CTA Button.
- **Hero Section**: Badge Edukasi Keuangan, Title, Subtitle, CTA Button, Note, 3 Benefit Cards, Hero Image dengan Floating Stats & Risk Warning Card.
- **Simulator Section**: Form input Nominal (Rp), pilihan Periode (1 bln, 6 bln, 1 thn, 3 thn, 5 thn), Slider Bunga (1-10%), Panel Slot (Statistik, Risk Meter, Chart SVG, Slot Pattern 6 Spin, Risk Illustration, Notes), Panel Deposito (Statistik, Proyeksi Bunga, Chart SVG, Proteksi LPS Note).
- **Comparison Section**: 5 kartu perbandingan (Selisih Hasil, Pertumbuhan Capital, Risiko Kehilangan, Keamanan Dana, Efek Jangka Panjang).
- **Belajar Section**: 6 kartu edukasi finansial.
- **Nasihat Section**: 4 advice cards dengan tema dark section.
- **Footer**: Title & Disclaimer Literasi Keuangan.

---

### Asset Management

#### [NEW] [app.css](file:///C:/laragon/www/slot-deposito/public/css/app.css)
Memisahkan style khusus dari kode Canva:
- Variabel warna `:root` (`--ink`, `--muted`, `--blue`, `--green`, `--orange`, `--red`, `--line`)
- Font class (`display-font`)
- Animation keyframes (`rise`, `resultPulse`)
- Graph styling (`chart-line`, `progress-fill`, `stat-number`, `dot-grid`)
- Custom range slider styling & focus outlines

#### [NEW] [simulator.js](file:///C:/laragon/www/slot-deposito/public/js/simulator.js)
Memisahkan seluruh JavaScript logika simulator:
- `parseMoney(value)`
- `formatInput()`
- `makePath(values, rising)`
- `updateCharts(amount, months, monthlyRate, slotBalance)`
- `renderSlotPattern(amount, finalBalance, rounds)`
- `simulate()`
- Event listeners form submit, input blur, range slider update, smooth scroll, serta inisialisasi `lucide.createIcons()` saat `DOMContentLoaded`.

#### [NEW] [hero.jpg](file:///C:/laragon/www/slot-deposito/public/images/hero.jpg)
Penyediaan placeholder / asset gambar hero yang sesuai tema edukasi finansial.

---

### Routes

#### [MODIFY] [web.php](file:///C:/laragon/www/slot-deposito/routes/web.php)
Memastikan route `/` mengembalikan view `home`.

---

## Verification Plan

### Automated Commands
1. Menjalankan pembersihan cache Laravel:
   ```bash
   php artisan optimize:clear
   ```
2. Memeriksa pendaftaran route:
   ```bash
   php artisan route:list
   ```
3. Menjalankan dev server Laravel:
   ```bash
   php artisan serve
   ```

### Manual Verification
1. Membuka `http://127.0.0.1:8000/` di browser.
2. Memastikan seluruh section tampil dengan visual persis seperti desain Canva.
3. Uji coba interaktif simulator:
   - Mengubah nominal modal (misal Rp5.000.000) dan memastikan format Rupiah otomatis.
   - Mengubah periode (misal 3 tahun).
   - Menggeser slider suku bunga.
   - Mengklik tombol "Bandingkan Sekarang".
   - Verifikasi perubahan angka sisa saldo slot, sisa deposito, grafik SVG, risk meter, dan 6 kartu putaran slot.
4. Periksa Console Browser untuk memastikan tidak ada error JavaScript (`404`, `TypeError`, `ReferenceError`, Canva SDK error).
5. Uji tampilan responsive pada layar mobile (360px+), tablet (768px+), dan desktop (1024px+).
