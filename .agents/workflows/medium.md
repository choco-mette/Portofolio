---
description: Mengambil artikel dari Medium via RSS XML, mem- parsing-nya secara native di PHP tanpa API pihak ketiga, melakukan caching untuk performa maksimal, dan menampilkannya di landing page.
---

📡 Workflow Khusus: Integrasi RSS Medium (Native PHP)

1. Pembuatan & Konfigurasi Controller
Instruksi untuk AI:

Buka atau buat app/Http/Controllers/PortfolioController.php.

Tambahkan method index().

Gunakan Facade Illuminate\Support\Facades\Http, Illuminate\Support\Facades\Cache, dan Carbon\Carbon.

Tulis logika pengambilan RSS di dalam blok Cache::remember dengan durasi 43200 detik (12 jam) dan cache key medium_posts.

Logika Parsing (Wajib diikuti AI):

Lakukan Http::get("https://medium.com/feed/@choco_mette").

Jika gagal, return collect().

Parsing XML menggunakan simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA) (wajib menggunakan LIBXML_NOCDATA untuk menembus tag <![CDATA[ ]]>).

Konversi objek XML menjadi Array asosiatif menggunakan json_decode(json_encode($xmlNode), true).

Ekstrak data dari path $arrayData['channel']['item'].

Handle Edge Case: Jika hanya ada 1 artikel, data akan berupa associative array, bukan indexed array. Tambahkan logika:

PHP
if (!empty($items) && !isset($items[0])) {
    $items = [$items];
}
Looping data (maksimal 5 artikel menggunakan array_slice).

Format output array yang dimasukkan ke dalam collection:

title: Bersihkan dengan trim().

link: Buang parameter query menggunakan explode('?', $item['link'])[0].

date: Format tanggal menggunakan Carbon::parse($item['pubDate'])->format('d M Y').

Kembalikan data tersebut dan lempar ke view('landing', compact('mediumPosts')).

2. Pendaftaran Route
Instruksi untuk AI:

Buka routes/web.php.

Pastikan ada route untuk halaman utama yang mengarah ke Controller di atas:
Route::get('/', [PortfolioController::class, 'index'])->name('landing');

3. Rendering di Frontend (Blade)
Instruksi untuk AI:

Buka resources/views/landing.blade.php.

Cari bagian <aside id="blog"> (Bagian Medium Feed).

Hapus konten statis blog, dan ganti dengan struktur looping Blade berikut:

Blade
@if($mediumPosts->isEmpty())
    <p class="font-mono text-sm font-bold text-gray-500 italic">Terjadi gangguan sinyal ke server Medium...</p>
@else
    @foreach($mediumPosts as $post)
        <a href="{{ $post['link'] }}" target="_blank" rel="noopener noreferrer" class="block bg-warm-white brutal-border p-4 rounded-xl brutal-shadow hover:bg-mustard transition-colors group">
            <p class="font-mono text-[10px] font-bold text-gray-600 mb-1 border-b-2 border-dotted border-[#1A1A1A]/30 pb-1 uppercase">
                {{ $post['date'] }}
            </p>
            <h3 class="font-display font-bold text-lg leading-tight mb-2 group-hover:text-terracotta transition-colors">
                {{ $post['title'] }}
            </h3>
            <p class="font-mono text-xs font-bold text-[#1A1A1A] uppercase flex items-center justify-between mt-3">
                <span>Read Article</span>
                <span class="text-lg leading-none group-hover:translate-x-2 transition-transform">→</span>
            </p>
        </a>
    @endforeach
@endif
Pastikan tautan statis "More on Medium" di bagian bawah feed mengarah ke: https://medium.com/@choco_mette.