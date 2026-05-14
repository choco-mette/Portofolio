---
trigger: manual
---

# Sistem Desain & Panduan Frontend (Neo-Brutalism Portfolio)

**Gaya Proyek:** Web Design Neo-Brutalism / Pop-Art
**Core Stack:** HTML5, Tailwind CSS, Vanilla JS (untuk manipulasi DOM)

## 0. File Referensi Utama (Source of Truth)
Saat membuat atau memodifikasi komponen, AI Agent **WAJIB** merujuk pada pola yang sudah ada di dalam file-file berikut:
1. **`neobrutal2.html`**: Halaman utama (beranda). Berisi tata letak *grid* asimetris, *marquee animation*, struktur kartu *Works/Projects*, dan implementasi **Modal (Pop-up)** dengan data tersembunyi (`hidden`).
2. **`detail-project.html`**: Halaman studi kasus/artikel. Berisi contoh implementasi *parsing* Markdown, di mana tag HTML mentah seperti `<pre>` dan `<img>` dibungkus (*wrapped*) secara otomatis menggunakan Vanilla JS untuk mendapatkan gaya Neo-Brutalism, lengkap dengan tombol "Copy".

## 1. Filosofi Utama
Proyek ini menggunakan estetika Neo-Brutalism. AI Agent HARUS mematuhi aturan visual berikut secara ketat:
- **TIDAK ADA bayangan halus (soft shadows) atau gradien.** Bayangan harus berupa blok warna solid tanpa efek *blur*.
- **Garis tepi (border) tebal adalah wajib.** Semua elemen interaktif dan wadah (container) utama harus memiliki garis tepi gelap yang tebal.
- **Kontras Tinggi.** Selalu pastikan kontras yang tajam antara warna latar belakang dan teks.
- **Fokus pada Tipografi.** Padukan *font display* yang tebal/besar untuk judul dengan *font monospace* untuk detail, kode, dan *badge*.

## 2. Palet Warna
Selalu gunakan kode *hex* ini dengan tepat. JANGAN menciptakan warna baru kecuali diminta secara eksplisit oleh pengguna.

- **Primary Dark (Borders/Text):** `#1A1A1A`
- **Background Base (Kertas Hangat/Krem):** `#FDFBF7`
- **Pure / Warm White (Warna Kartu):** `#FFFFFF`
- **Accent 1 (Kuning Mustard):** `#FFD23F`
- **Accent 2 (Merah Bata/Terracotta):** `#EE4266`
- **Accent 3 (Hijau Sage):** `#0EAD69`
- **Accent 4 (Biru Retro):** `#3BCEAC`
- **Tech Accent (Ungu PHP):** `#9D4EDD`

## 3. Tipografi
Proyek ini menggunakan dua Google Fonts. Semua teks harus masuk ke dalam salah satu kategori berikut:

- **Display Font (`Space Grotesk`):** - Class Tailwind: `font-display`
  - Penggunaan: Judul (h1, h2, h3), teks *hero* berukuran masif, dan tautan navigasi penting.
  - Ketebalan: Selalu gunakan `font-black` (900) atau `font-bold` (700). Sering-sering ubah menjadi `uppercase`.
- **Monospace Font (`Space Mono`):**
  - Class Tailwind: `font-mono`
  - Penggunaan: Paragraf, deskripsi, *badge*, tag teknologi, tanggal, dan elemen UI kecil.
  - Ketebalan: Gunakan `font-bold` (700) agar mudah dibaca di atas *background* terang.

## 4. Utilitas CSS Global
Proyek ini sangat bergantung pada class CSS kustom yang didefinisikan di blok `<style>`. **AI Agent harus menggunakan class ini daripada menulis utility Tailwind secara sebaris (inline) untuk border dan bayangan tebal:**

- `.brutal-border`: Menerapkan `border: 4px solid #1A1A1A;`
- `.brutal-shadow`: Menerapkan `box-shadow: 8px 8px 0px #1A1A1A; transition: all 0.15s ease-in-out;`
- `.brutal-shadow:hover`: Mengubah posisi menjadi `translate(4px, 4px)` dan bayangan `box-shadow: 4px 4px 0px #1A1A1A;`
- `.brutal-shadow:active`: Mengubah posisi menjadi `translate(8px, 8px)` dan menghilangkan bayangan `box-shadow: 0px 0px 0px #1A1A1A;` (efek tombol ditekan).

*Catatan: Untuk elemen interaktif kecil (seperti badge tech stack), jangan gunakan `.brutal-shadow`. Gunakan efek hover standar ini: `hover:-translate-y-1 hover:shadow-[2px_2px_0px_#1a1a1a]`.*

## 5. Aturan Konstruksi Komponen

### A. Container & Kartu (Cards)
- Selalu bungkus konten utama dalam elemen dengan class `.brutal-border .bg-warm-white .rounded-2xl` (atau `rounded-xl`).
- Tambahkan `.brutal-shadow` jika kartu tersebut dimaksudkan untuk menonjol atau bisa diklik.

### B. Badges / Tag Tech Stack
- Struktur: `<span class="font-mono text-[10px] uppercase font-bold text-white brutal-border px-2 py-0.5 rounded-full">TAG</span>`
- Pilih warna latar belakang (bg-color) dari palet sesuai dengan konteks teknologinya.

### C. Tombol (Buttons)
- Struktur: Selalu gunakan teks `uppercase`, `font-display` atau `font-mono`, dipadukan dengan `.brutal-border`, *padding* yang cukup, dan state *hover/active*.
- Contoh *Active State* untuk efek klik yang solid: `active:translate-y-1 active:translate-x-1 active:shadow-none`.

### D. Modals (Pop-ups) (Rujuk ke neobrutal2.html)
- Harus menyertakan *overlay backdrop* (`bg-[#1A1A1A]/70 backdrop-blur-sm`).
- Container utama modal harus memiliki `.brutal-border .brutal-shadow .modal-animate`.
- Tombol *close* (X) harus terlihat seperti stiker fisik/tombol (bulat, bergaris tepi, dengan shadow solid kecil).
- Data modal di halaman utama diambil menggunakan Vanilla JS dari blok `<div class="hidden">` di dalam masing-masing kartu.

### E. Markdown & Detail Proyek (Rujuk ke detail-project.html)
- JANGAN berikan *styling* rumit langsung pada output HTML mentah dari sistem *backend*.
- Biarkan *backend* memuntahkan tag `<img>`, `<pre>`, atau `<code>` murni di dalam `<article id="markdown-content">`.
- Gunakan Vanilla JS (DOM Manipulation) yang sudah ada di bagian bawah `detail-project.html` untuk "membungkus" elemen-elemen tersebut dengan gaya Neo-Brutalism (seperti *header* terminal Mac OS pada blok kode).

## 6. Arahan Tata Letak (Layout)
- Gunakan Tailwind Grid (`grid-cols-1`, lalu `md:grid-cols-12` dll) untuk tata letak utama.
- Berikan spasi (*gap*, *margin*, *padding*) yang luas/longgar (`gap-8`, `p-6`, `my-12`) agar elemen-elemen yang tebal (chunky) memiliki ruang untuk bernapas.
- **Pola Background:** Tag `<body>` menggunakan pola titik (dot grid) bergaya komik cetak (`background-image: radial-gradient(#1a1a1a 1px, transparent 1px); background-size: 30px 30px;`). Jangan menutupi *background* ini tanpa alasan yang jelas.

## 7. Instruksi Output untuk AI Agent
Saat kamu (AI) diminta menghasilkan kode baru:
1. Hasilkan HTML yang semantik (gunakan `<article>`, `<section>`, `<aside>`, `<nav>`).
2. DILARANG KERAS menggunakan *utility* bayangan standar bawaan Tailwind (misalnya `shadow-lg`, `shadow-md`, `shadow-xl`). HANYA gunakan *offset* warna solid kustom (`shadow-[4px_4px_0px_#1A1A1A]`) atau gunakan class `.brutal-shadow`.
3. Pertahankan gaya *coding* yang *raw*, retro, dan padat (blocky).