// public/js/neo-brutalism.js

// Modals
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
    if(modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// Opsional: Tutup modal kalau user menekan tombol 'Escape' di keyboard
document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") {
        const modal = document.getElementById('exp-modal');
        if (modal && !modal.classList.contains('hidden')) {
            closeExpModal();
        }
    }
});

function showAllExperiences() {
    document.querySelectorAll('.exp-hidden').forEach(el => {
        el.classList.remove('hidden', 'exp-hidden');
    });
    const btn = document.getElementById('btn-more-exp-container');
    if (btn) btn.style.display = 'none';
}

function showAllProjects() {
    document.querySelectorAll('.proj-hidden').forEach(el => {
        el.classList.remove('hidden', 'proj-hidden');
    });
    const btn = document.getElementById('btn-more-proj-container');
    if (btn) btn.style.display = 'none';
}

// Markdown Code Block Styling & Copy Button
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.markdown-content pre').forEach(pre => {
        const wrapper = document.createElement('div');
        wrapper.className = 'brutal-border brutal-shadow bg-[#1A1A1A] rounded-xl overflow-hidden my-8';
        
        let language = 'terminal';
        const code = pre.querySelector('code');
        if (code && code.className) {
            const match = code.className.match(/language-(\w+)/);
            if (match) language = match[1];
        }

        const header = document.createElement('div');
        header.className = 'flex justify-between items-center p-3 bg-gray-200 border-b-4 border-[#1A1A1A]';
        header.innerHTML = `
            <div class="flex gap-2 items-center">
                <div class="w-3 h-3 rounded-full bg-terracotta border-2 border-[#1A1A1A]"></div>
                <div class="w-3 h-3 rounded-full bg-mustard border-2 border-[#1A1A1A]"></div>
                <div class="w-3 h-3 rounded-full bg-sage border-2 border-[#1A1A1A]"></div>
                <span class="text-[10px] font-bold uppercase ml-4 text-[#1A1A1A]">${language}</span>
            </div>
            <button class="copy-btn bg-warm-white hover:bg-mustard brutal-border rounded px-2 py-1 transition-colors flex items-center justify-center text-[#1A1A1A] shadow-[2px_2px_0px_#1A1A1A] active:translate-y-[1px] active:translate-x-[1px] active:shadow-none" title="Copy code">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
            </button>
        `;
        
        const copyBtn = header.querySelector('.copy-btn');
        copyBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const textToCopy = code ? code.innerText : pre.innerText;
            navigator.clipboard.writeText(textToCopy).then(() => {
                const originalSvg = copyBtn.innerHTML;
                copyBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#0EAD69" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>';
                setTimeout(() => {
                    copyBtn.innerHTML = originalSvg;
                }, 2000);
            });
        });

        pre.parentNode.insertBefore(wrapper, pre);
        wrapper.appendChild(header);
        wrapper.appendChild(pre);
    });
    
    // Inisialisasi syntax highlighting
    if (typeof hljs !== 'undefined') {
        hljs.highlightAll();
    }
});
