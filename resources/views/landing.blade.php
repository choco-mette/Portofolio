<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choco Mette - Neo-Brutalism Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Space Grotesk (Chunky/Pop) & Space Mono (Developer feel) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700;900&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #FDFBF7; /* Krem kertas sangat terang dan hangat */
            color: #1A1A1A;
            /* Pola dot-grid tipis ala majalah komik/pop-art */
            background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
            background-size: 30px 30px;
            background-color: #FDFBF7;
        }

        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono { font-family: 'Space Mono', monospace; }

        /* Utilitas Neo-Brutalism: Bayangan Solid & Border Tebal */
        .brutal-border {
            border: 4px solid #1A1A1A;
        }

        .brutal-shadow {
            box-shadow: 8px 8px 0px #1A1A1A;
            transition: all 0.15s ease-in-out;
        }

        .brutal-shadow:hover {
            transform: translate(4px, 4px);
            box-shadow: 4px 4px 0px #1A1A1A;
        }
        
        .brutal-shadow:active {
            transform: translate(8px, 8px);
            box-shadow: 0px 0px 0px #1A1A1A;
        }

        /* Marquee Animation (Efek teks berjalan ala 90s TV) */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            width: 100%;
            border-top: 4px solid #1A1A1A;
            border-bottom: 4px solid #1A1A1A;
            background-color: #FFD23F; /* Kuning Mustard */
        }
        
        .marquee-content {
            display: inline-block;
            animation: marquee 15s linear infinite;
            font-weight: 900;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Warna Aksen Hangat */
        .bg-mustard { background-color: #FFD23F; }
        .bg-terracotta { background-color: #EE4266; }
        .bg-sage { background-color: #0EAD69; }
        .bg-retro-blue { background-color: #3BCEAC; }
        .bg-warm-white { background-color: #FFFFFF; }

        /* Modal Animation (Tambahan untuk Pop-up) */
        @keyframes popIn {
            0% { transform: scale(0.95) translateY(10px); opacity: 0; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }
        .modal-animate {
            animation: popIn 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col items-center pb-20">

    <nav class="w-full max-w-6xl px-4 py-6 md:py-10 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="brutal-border brutal-shadow bg-warm-white px-6 py-2 rounded-xl">
            <h1 class="font-display font-black text-2xl tracking-tighter uppercase">Choco Mette<span class="text-[#EE4266]">.</span></h1>
        </div>
        
        <div class="flex gap-4 font-mono text-sm font-bold">
            <a href="#works" class="brutal-border brutal-shadow bg-warm-white px-4 py-2 rounded-xl uppercase">Works</a>
            <a href="#projects" class="brutal-border brutal-shadow bg-warm-white px-4 py-2 rounded-xl uppercase">Projects</a>
            <a href="#blog" class="brutal-border brutal-shadow bg-warm-white px-4 py-2 rounded-xl uppercase">Medium</a>
            <a href="#contact" class="brutal-border brutal-shadow bg-mustard px-4 py-2 rounded-xl uppercase">Ping Me</a>
        </div>
    </nav>

    <header class="w-full max-w-6xl px-4 flex flex-col md:flex-row gap-8 mt-4 mb-12">
        <!-- Main Intro Card -->
        <div class="brutal-border brutal-shadow bg-mustard p-8 md:p-12 rounded-2xl w-full md:w-2/3 relative overflow-hidden">
            <p class="font-mono text-sm uppercase font-bold mb-4 border-2 border-[#1A1A1A] inline-block px-3 py-1 bg-warm-white rounded-full">Profile</p>
            <h2 class="font-display font-black text-5xl md:text-7xl uppercase leading-none tracking-tighter mb-6">
                About <br> <span class="text-white" style="-webkit-text-stroke: 3px #1A1A1A; text-shadow: 6px 6px 0px #1A1A1A;">Me.</span>
            </h2>
            <p class="font-mono text-base md:text-lg max-w-lg leading-relaxed font-bold">
                Saya adalah seorang pengembang perangkat lunak yang berfokus pada arsitektur backend, server Linux, dan infrastruktur. Suka merakit sistem yang tangguh sambil mendengarkan musik lo-fi.
            </p>
        </div>

        <div class="flex flex-col gap-8 w-full md:w-1/3">
            <!-- Avatar -->
            <div class="brutal-border brutal-shadow bg-retro-blue h-48 rounded-2xl overflow-hidden relative group cursor-pointer">
                <!-- Using a placeholder image for the avatar -->
                <img src="https://images.unsplash.com/photo-1550439062-609e1531270e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Code setup" class="w-full h-full object-cover grayscale contrast-125 group-hover:grayscale-0 transition-all duration-300">
                <div class="absolute bottom-2 left-2 bg-warm-white brutal-border px-2 py-1 text-xs font-mono font-bold">Status: Still Alive</div>
            </div>
            
            <!-- Core Stack -->
            <div class="brutal-border brutal-shadow bg-warm-white p-6 rounded-2xl flex-grow flex flex-col justify-center">
                <h3 class="font-display font-bold text-xl uppercase mb-3 border-b-4 border-[#1A1A1A] pb-2">Tech Stack</h3>
                <div class="flex flex-wrap gap-2 font-mono text-xs font-bold uppercase">
                    @foreach($skills as $skill)
                        <span style="background-color: {{ $skill->bg_color }}; color: {{ $skill->text_color }}" class="px-2 py-1 brutal-border rounded-lg hover:-translate-y-1 hover:shadow-[2px_2px_0px_#1a1a1a] transition-all cursor-default">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <div class="marquee-container py-3 my-12 transform -rotate-2 scale-105 shadow-[0px_8px_0px_rgba(0,0,0,0.1)]">
        <div class="marquee-content font-display text-2xl uppercase tracking-wider text-[#1A1A1A]">
            • LATENCY IS THE ENEMY • DOCKER IS MY FRIEND • I WRITE CODE AND DRINK COFFEE • LINUX OR NOTHING • LATENCY IS THE ENEMY • DOCKER IS MY FRIEND • I WRITE CODE AND DRINK COFFEE • LINUX OR NOTHING • 
        </div>
    </div>

    <main class="w-full max-w-6xl px-4 grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12">
        
        <!-- Wrapper Kolom Kiri untuk Works & Projects -->
        <div class="md:col-span-8 flex flex-col gap-16">
            
            <!-- SECTION 1: WORKS (Karya Profesional) -->
            <section id="works">
                <div class="flex items-end justify-between mb-8 border-b-4 border-[#1A1A1A] pb-4">
                    <h2 class="font-display font-black text-4xl uppercase">Experience</h2>
                    <div class="font-mono font-bold text-sm bg-warm-white brutal-border px-3 py-1 rounded-full">Career</div>
                </div>

                <div class="space-y-6">
                    @foreach($experiences as $experience)
                    <article onclick="openExpModal(this)" class="brutal-border brutal-shadow bg-warm-white rounded-2xl p-6 md:p-8 relative overflow-hidden group cursor-pointer hover:-translate-y-1 transition-all">
                        @if(!$experience->end_year)
                        <div class="absolute top-0 right-0 bg-terracotta text-warm-white font-mono text-xs font-bold px-4 py-1 brutal-border border-t-0 border-r-0 rounded-bl-xl z-10">
                            Present
                        </div>
                        @endif
                        
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="w-full md:w-1/4 flex flex-col justify-start pt-2">
                                <span class="exp-period font-mono text-sm font-bold text-gray-500 border-b-2 border-dashed border-[#1A1A1A] pb-2 mb-2 w-max">{{ $experience->start_year->format('Y') }} - {{ $experience->end_year ? $experience->end_year->format('Y') : 'Present' }}</span>
                                <h4 class="company-name font-display font-black text-xl text-[#1A1A1A] uppercase leading-tight">{!! nl2br(e($experience->company)) !!}</h4>
                            </div>
                            
                            <div class="w-full md:w-3/4 md:border-l-4 border-[#1A1A1A] md:pl-8">
                                <h3 class="job-title font-display font-black text-2xl md:text-3xl uppercase mb-2 group-hover:text-terracotta transition-colors">{{ $experience->title }}</h3>
                                <div class="font-mono text-sm leading-relaxed font-bold text-gray-700 mb-4 line-clamp-2">
                                    {!! Str::markdown($experience->description) !!}
                                </div>
                                
                                <div class="font-mono text-xs font-bold text-terracotta flex items-center gap-1 group-hover:text-[#1A1A1A] transition-colors mb-4">
                                    <span>Buka Detail Lengkap</span> <span class="text-lg leading-none">↗</span>
                                </div>
                            </div>
                        </div>

                        <div class="hidden">
                            <div class="detail-desc font-mono text-sm md:text-base leading-relaxed font-bold text-gray-700 space-y-4">
                                {!! Str::markdown($experience->description) !!}
                            </div>
                            <div class="detail-tech">
                                @foreach($experience->skills as $skill)
                                <span style="background-color: {{ $skill->bg_color }}; color: {{ $skill->text_color }}" class="font-mono text-[10px] uppercase font-bold brutal-border px-2 py-0.5 rounded-full">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>

            <!-- SECTION 2: PROJECTS (Proyek Personal/Eksperimen) -->
            <section id="projects">
                <div class="flex items-end justify-between mb-8 border-b-4 border-[#1A1A1A] pb-4">
                    <h2 class="font-display font-black text-4xl uppercase">Projects</h2>
                    <div class="font-mono font-bold text-sm bg-warm-white brutal-border px-3 py-1 rounded-full">Experiments</div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($projects as $project)
                    <article class="brutal-border brutal-shadow bg-warm-white rounded-2xl flex flex-col overflow-hidden group cursor-pointer block h-full">
                        <div class="h-32 border-b-4 border-[#1A1A1A] bg-mustard p-3 flex items-center justify-center">
                            @if($project->cover_image)
                            <img src="{{ Storage::disk('r2')->url($project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover brutal-border rounded-xl grayscale group-hover:grayscale-0 transition-all">
                            @else
                            <div class="w-full h-full bg-warm-white brutal-border rounded-xl flex items-center justify-center font-display font-black text-2xl uppercase opacity-50">{{ $project->title }}</div>
                            @endif
                        </div>
                        <div class="p-5 flex flex-col flex-grow justify-between bg-warm-white">
                            <div>
                                <h3 class="font-display font-black text-xl uppercase mb-1">{{ $project->title }}</h3>
                                <p class="font-mono text-xs leading-relaxed font-bold text-gray-700 mb-4">{{ $project->summary }}</p>
                            </div>
                            <div class="flex justify-between items-center mt-auto">
                                <div class="flex flex-wrap gap-1">
                                    @foreach($project->skills->take(3) as $skill)
                                    <span style="background-color: {{ $skill->bg_color }}; color: {{ $skill->text_color }}" class="font-mono text-[10px] uppercase font-bold brutal-border px-2 py-1 rounded-md">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                                <a href="{{ $project->live_url ?? $project->repo_url ?? '#' }}" target="_blank" class="text-xl group-hover:text-terracotta transition-colors">↗</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>

                <!-- Tombol Show More -->
                <div class="mt-10 flex justify-center">
                    <a href="#" class="brutal-border brutal-shadow bg-warm-white px-8 py-3 rounded-xl font-display font-black text-xl uppercase hover:bg-mustard transition-colors flex items-center gap-3 group active:translate-y-1 active:translate-x-1 active:shadow-none">
                        Explore More Projects
                        <span class="text-2xl group-hover:translate-x-2 transition-transform">→</span>
                    </a>
                </div>
            </section>
        </div>

        <aside id="blog" class="md:col-span-4 mt-12 md:mt-0">
            <div class="brutal-border brutal-shadow bg-[#E8E6DF] p-6 rounded-2xl h-full">
                <div class="flex items-center gap-3 mb-8 border-b-4 border-[#1A1A1A] pb-4">
                    <div class="w-4 h-4 rounded-full bg-terracotta border-2 border-[#1A1A1A] animate-pulse"></div>
                    <h2 class="font-display font-black text-2xl uppercase">Medium Feed</h2>
                </div>

                <div class="space-y-4">
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
                    
                    <!-- Decorative Element -->
                    <a href="https://medium.com/@choco_mette" target="_blank" rel="noopener noreferrer" class="block mt-8 bg-terracotta text-warm-white brutal-border p-4 rounded-xl transform rotate-3 hover:rotate-0 flex items-center justify-center gap-2 transition-transform brutal-shadow hover:-translate-y-1">
                        <span class="font-display font-black text-xl uppercase">More on Medium</span>
                        <span class="text-2xl">✍️</span>
                    </a>
                </div>
            </div>
        </aside>

    </main>

    <footer class="w-full max-w-6xl px-4 mt-20">
        <div class="brutal-border bg-[#1A1A1A] text-warm-white p-8 md:p-12 rounded-3xl flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <h2 class="font-display font-black text-3xl uppercase text-white mb-2">Let's Build Something.</h2>
                <p class="font-mono text-sm font-bold text-gray-300">Printed in the terminal. © 2026 Choco Mette.</p>
            </div>
            
            <div class="flex gap-4">
                <a href="#" class="w-12 h-12 bg-warm-white text-[#1A1A1A] brutal-border flex items-center justify-center rounded-full hover:bg-terracotta hover:-translate-y-1 transition-transform">
                    <span class="font-mono font-bold text-xs">GH</span>
                </a>
                <a href="#" class="w-12 h-12 bg-warm-white text-[#1A1A1A] brutal-border flex items-center justify-center rounded-full hover:bg-retro-blue hover:-translate-y-1 transition-transform">
                    <span class="font-mono font-bold text-xs">IN</span>
                </a>
                <a href="#" class="w-12 h-12 bg-mustard text-[#1A1A1A] brutal-border flex items-center justify-center rounded-full hover:bg-warm-white hover:-translate-y-1 transition-transform">
                    <span class="font-mono font-bold text-xs">@</span>
                </a>
            </div>
        </div>
    </footer>

    <!-- ========================================== -->
    <!-- MODAL EXPERIENCE (Neo-Brutalism Style)     -->
    <!-- ========================================== -->
    <div id="exp-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 md:p-8">
        <!-- Backdrop yang akan menutup modal jika di klik -->
        <div class="absolute inset-0 bg-[#1A1A1A]/70 backdrop-blur-sm cursor-pointer" onclick="closeExpModal()"></div>
        
        <!-- Modal Content Box -->
        <div class="relative brutal-border brutal-shadow bg-warm-white w-full max-w-3xl rounded-2xl flex flex-col max-h-full modal-animate">
            
            <!-- Header Modal -->
            <div class="flex justify-between items-center p-4 md:p-6 border-b-4 border-[#1A1A1A] bg-mustard rounded-t-xl">
                <div class="flex flex-col">
                    <span id="modal-period" class="font-mono text-xs font-bold text-[#1A1A1A] mb-1">Period</span>
                    <h3 id="modal-company" class="font-display font-black text-2xl md:text-3xl uppercase leading-none">Company</h3>
                </div>
                <!-- Tombol Close Bergaya Stiker -->
                <button onclick="closeExpModal()" class="brutal-border bg-white w-10 h-10 flex items-center justify-center rounded-full hover:bg-terracotta hover:text-white transition-colors font-display font-black text-xl shadow-[2px_2px_0px_#1A1A1A] active:translate-y-1 active:translate-x-1 active:shadow-none">
                    X
                </button>
            </div>
            
            <!-- Body Modal (Scrollable jika teks terlalu panjang) -->
            <div class="p-6 md:p-8 overflow-y-auto bg-[#FDFBF7] rounded-b-xl">
                <h4 id="modal-job-title" class="font-display font-black text-3xl md:text-4xl uppercase mb-6 text-terracotta drop-shadow-[2px_2px_0px_rgba(26,26,26,1)]">Job Title</h4>
                
                <!-- Area Teks HTML (Diisi otomatis oleh JS) -->
                <div id="modal-desc" class="mb-8">
                    <!-- Konten didorong masuk ke sini -->
                </div>
                
                <!-- Tech Stack Area -->
                <div class="pt-6 border-t-4 border-dashed border-[#1A1A1A]">
                    <h5 class="font-mono text-sm font-bold uppercase mb-3 text-gray-500">Technologies Used:</h5>
                    <div id="modal-tech" class="flex flex-wrap gap-2">
                        <!-- Badges didorong masuk ke sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPT UNTUK LOGIKA MODAL                  -->
    <!-- ========================================== -->
    <script>
        function openExpModal(element) {
            // 1. Ekstrak data dari kelas di dalam Card yang diklik
            const company = element.querySelector('.company-name').innerHTML;
            const period = element.querySelector('.exp-period').innerHTML;
            const jobTitle = element.querySelector('.job-title').innerHTML;
            const detailDesc = element.querySelector('.detail-desc').innerHTML;
            const detailTech = element.querySelector('.detail-tech').innerHTML;

            // 2. Suntikkan (inject) data tersebut ke dalam elemen DOM Modal
            document.getElementById('modal-company').innerHTML = company;
            document.getElementById('modal-period').innerHTML = period;
            document.getElementById('modal-job-title').innerHTML = jobTitle;
            document.getElementById('modal-desc').innerHTML = detailDesc;
            document.getElementById('modal-tech').innerHTML = detailTech;

            // 3. Tampilkan Modal & Kunci Scroll Halaman Utama (Background body)
            const modal = document.getElementById('exp-modal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeExpModal() {
            // Sembunyikan Modal & Kembalikan kemampuan Scroll
            const modal = document.getElementById('exp-modal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Opsional: Tutup modal kalau user menekan tombol 'Escape' di keyboard
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeExpModal();
            }
        });
    </script>
</body>
</html>
