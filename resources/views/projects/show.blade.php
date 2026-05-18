<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Choco Mette</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Space Grotesk & Space Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700;900&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Highlight.js for Syntax Highlighting -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/neo-brutalism.css') }}">
</head>
<body class="antialiased min-h-screen flex flex-col items-center pb-20">

    <nav class="w-full max-w-5xl px-4 py-6 md:py-10 flex flex-col md:flex-row justify-between items-center gap-6">
        <a href="{{ route('landing') }}" class="brutal-border brutal-shadow bg-warm-white px-6 py-2 rounded-xl group hover:bg-mustard transition-colors">
            <h1 class="font-display font-black text-2xl tracking-tighter uppercase group-hover:-translate-x-1 transition-transform inline-block">&larr; Back to Base</h1>
        </a>
        
        <div class="flex gap-2 font-mono text-xs font-bold uppercase bg-[#E8E6DF] brutal-border px-4 py-2 rounded-xl">
            <span class="text-gray-500">Project / </span> <span>{{ $project->title }}</span>
        </div>
    </nav>

    <main class="w-full max-w-5xl px-4 flex flex-col gap-12 mt-4">
        
        <header class="flex flex-col gap-6">
            @if($project->skills && $project->skills->count() > 0)
            <div class="flex flex-wrap gap-2">
                @foreach($project->skills as $skill)
                    <span style="background-color: {{ $skill->bg_color }}; color: {{ $skill->text_color }}" class="font-mono text-xs uppercase font-bold brutal-border px-3 py-1 rounded-full">{{ $skill->name }}</span>
                @endforeach
            </div>
            @endif
            
            <h1 class="font-display font-black text-5xl md:text-7xl uppercase leading-none tracking-tighter">
                {{ $project->title }}
            </h1>
            
            @if($project->summary)
            <p class="font-mono text-lg md:text-xl font-bold max-w-2xl border-l-8 border-terracotta pl-4 py-2 bg-warm-white/50">
                {{ $project->summary }}
            </p>
            @endif
            
            <div class="flex flex-wrap gap-4 mt-4">
                @if($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" class="brutal-border brutal-shadow bg-retro-blue px-6 py-3 rounded-xl uppercase font-display font-bold text-lg flex items-center gap-2 hover:bg-white transition-colors">
                    <span>Source Code</span> <span>↗</span>
                </a>
                @endif
                
                @if($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" class="brutal-border brutal-shadow bg-mustard px-6 py-3 rounded-xl uppercase font-display font-bold text-lg flex items-center gap-2 hover:bg-white transition-colors">
                    <span>Live Demo</span> <span>⚡</span>
                </a>
                @endif
            </div>
        </header>

        @if($project->cover_image)
        <div class="w-full h-64 md:h-96 brutal-border brutal-shadow bg-mustard rounded-2xl overflow-hidden p-2 md:p-2">
            <img src="{{ Storage::disk('r2')->url($project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover brutal-border rounded-xl grayscale hover:grayscale-0 transition-all duration-500">
        </div>
        @endif

        <article class="w-full max-w-5xl mx-auto space-y-8 font-mono text-base md:text-lg leading-relaxed markdown-content brutal-border brutal-shadow bg-warm-white p-6 md:p-12 rounded-2xl">
            {!! $project->parsed_content !!}
        </article>

    </main>

    <footer class="w-full max-w-5xl px-4 mt-20 mb-8 text-center border-t-4 border-[#1A1A1A] pt-8">
        <h2 class="font-display font-black text-4xl uppercase tracking-tighter">Ready for the Next Build?</h2>
        <a href="mailto:hello@example.com" class="font-mono text-lg font-bold bg-mustard brutal-border px-6 py-3 rounded-xl inline-block mt-4 brutal-shadow hover:bg-warm-white transition-colors uppercase">
            Let's Talk
        </a>
    </footer>

    <!-- Highlight.js Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/bash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/javascript.min.js"></script>
    
    <script src="{{ asset('js/neo-brutalism.js') }}"></script>
</body>
</html>
