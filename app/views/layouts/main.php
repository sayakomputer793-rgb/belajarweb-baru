<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "DevPortfolio — Modern Web Developer" ?></title>
    
    <!-- Fonts: Outfit for dynamic headings, Inter for high readability -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@700;800;900&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: '#020617', // Deepest Navy
                        'dark-surface': '#0f172a',
                        'dark-card': '#1e293b',
                        'accent-primary': '#6366f1', // Indigo
                        'accent-secondary': '#8b5cf6', // Violet
                        'accent-cyan': '#06b6d4', // Cyan
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        @layer base {
            body { 
                @apply bg-dark text-slate-300 font-sans selection:bg-accent-primary/30 selection:text-white antialiased;
            }
            h1, h2, h3, h4, h5, h6 {
                @apply font-display text-white tracking-tight;
            }
        }
        
        @layer components {
            .glass { 
                @apply bg-slate-900/40 backdrop-blur-xl border border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.37)]; 
            }
            .glass-premium {
                @apply bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-2xl border border-white/20 shadow-2xl;
            }
            .glass-hover { 
                @apply transition-all duration-500 hover:bg-white/10 hover:border-white/30 hover:-translate-y-1 hover:shadow-accent-primary/20; 
            }
            
            .gradient-text {
                @apply bg-clip-text text-transparent bg-gradient-to-r from-accent-primary via-accent-secondary to-accent-cyan;
            }

            .btn-primary {
                @apply relative overflow-hidden px-8 py-4 bg-accent-primary text-white font-bold rounded-2xl transition-all hover:scale-105 active:scale-95 shadow-lg shadow-accent-primary/25 hover:shadow-accent-primary/40 flex items-center justify-center gap-2;
            }
            
            .btn-glass {
                @apply px-8 py-4 glass glass-hover text-white font-bold rounded-2xl flex items-center justify-center gap-2;
            }
        }

        /* Background Blobs */
        .blob {
            @apply absolute rounded-full blur-[120px] opacity-20 animate-pulse-slow;
        }

        /* Animations */
        .reveal { opacity: 0; transform: translateY(30px); }
        .reveal-left { opacity: 0; transform: translateX(-30px); }
        .reveal-right { opacity: 0; transform: translateX(30px); }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { @apply bg-dark; }
        ::-webkit-scrollbar-thumb { @apply bg-slate-800 rounded-full hover:bg-slate-700 transition-colors; }
    </style>
</head>
<body class="overflow-x-hidden min-h-screen">
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="blob w-[500px] h-[500px] bg-accent-primary -top-48 -left-24"></div>
        <div class="blob w-[400px] h-[400px] bg-accent-secondary top-1/2 -right-24 delay-700"></div>
        <div class="blob w-[300px] h-[300px] bg-accent-cyan -bottom-24 left-1/4 delay-1000"></div>
    </div>

    <!-- Layout Wrapper -->
    <div class="relative z-10 flex flex-col min-h-screen">
        <!-- Navbar -->
        <?php require __DIR__ . '/../partials/navbar.php'; ?>

        <!-- Content -->
        <main class="flex-grow">
            <?= $content ?>
        </main>

        <!-- Footer -->
        <?php require __DIR__ . '/../partials/footer.php'; ?>
    </div>

    <!-- Custom Cursor -->
    <div id="cursor" class="fixed w-8 h-8 rounded-full border border-accent-primary pointer-events-none z-[9999] opacity-0 transition-opacity duration-300 hidden lg:block"></div>
    <div id="cursor-dot" class="fixed w-1 h-1 bg-accent-primary rounded-full pointer-events-none z-[9999] opacity-0 transition-opacity duration-300 hidden lg:block"></div>

    <script>
        // Init Lucide Icons
        lucide.createIcons();

        // GSAP Registration
        gsap.registerPlugin(ScrollTrigger);

        document.addEventListener('DOMContentLoaded', () => {
            // Reveal Animations
            const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
            reveals.forEach((el) => {
                gsap.to(el, {
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 90%',
                        toggleActions: 'play none none none'
                    },
                    opacity: 1,
                    y: 0,
                    x: 0,
                    duration: 1.2,
                    ease: 'expo.out'
                });
            });

            // Smooth Cursor
            const cursor = document.getElementById('cursor');
            const dot = document.getElementById('cursor-dot');
            
            if (cursor && dot) {
                document.addEventListener('mousemove', (e) => {
                    gsap.to(cursor, { x: e.clientX - 16, y: e.clientY - 16, duration: 0.6, ease: 'power3.out' });
                    gsap.to(dot, { x: e.clientX - 2, y: e.clientY - 2, duration: 0.1 });
                    cursor.style.opacity = '1';
                    dot.style.opacity = '1';
                });

                document.addEventListener('mouseleave', () => {
                    cursor.style.opacity = '0';
                    dot.style.opacity = '0';
                });

                // Hover effects
                const hoverables = document.querySelectorAll('a, button, input, textarea, .glass-hover');
                hoverables.forEach(el => {
                    el.addEventListener('mouseenter', () => {
                        gsap.to(cursor, { scale: 1.5, backgroundColor: 'rgba(99, 102, 241, 0.1)', duration: 0.3 });
                    });
                    el.addEventListener('mouseleave', () => {
                        gsap.to(cursor, { scale: 1, backgroundColor: 'transparent', duration: 0.3 });
                    });
                });
            }

            // Contact Form handler
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const btn = contactForm.querySelector('button[type="submit"]');
                    const btnText = document.getElementById('btn-text');
                    const btnIcon = document.getElementById('btn-icon');
                    const alert = document.getElementById('contact-alert');
                    
                    btn.classList.add('opacity-70', 'cursor-wait');
                    btnText.innerText = 'Mengirim...';
                    
                    try {
                        const formData = new FormData(contactForm);
                        const response = await fetch('<?= baseUrl('contact/send') ?>', {
                            method: 'POST',
                            body: formData
                        });
                        
                        const result = await response.json();
                        
                        alert.innerText = result.message;
                        alert.className = `contact-alert ${result.status}`;
                        
                        if (result.status === 'success') {
                            contactForm.reset();
                        }
                    } catch (error) {
                        alert.innerText = 'Gagal mengirim pesan. Silakan coba lagi.';
                        alert.className = 'contact-alert error';
                    } finally {
                        btn.classList.remove('opacity-70', 'cursor-wait');
                        btnText.innerText = 'Kirim Pesan';
                    }
                });
            }
        });
    </script>
</body>
</html>
