<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 py-8" id="main-nav">
    <div class="container mx-auto px-6">
        <div class="glass-premium rounded-[24px] px-8 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="<?= baseUrl() ?>" class="flex items-center gap-3 group">
                <div class="w-12 h-12 bg-gradient-to-br from-accent-primary to-accent-secondary rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition-all shadow-lg shadow-accent-primary/20">
                    <i data-lucide="zap" class="text-white w-6 h-6 fill-white"></i>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-black tracking-tight text-white leading-none">DEV<span class="text-accent-primary">.</span></span>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Portfolio</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-10">
                <?php 
                $currentUrl = $_GET['url'] ?? '';
                $links = [
                    ['Home', ''],
                    ['Portfolio', 'projects'],
                    ['Blog', 'blog'],
                ];
                foreach ($links as [$label, $path]):
                    $isActive = ($currentUrl === $path) || ($path !== '' && str_contains($currentUrl, $path));
                ?>
                    <a href="<?= baseUrl($path) ?>" class="text-sm font-semibold transition-all hover:text-accent-primary <?= $isActive ? 'text-white border-b-2 border-accent-primary pb-1' : 'text-slate-400' ?>">
                        <?= $label ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- CTA -->
            <div class="hidden md:block">
                <a href="<?= baseUrl() ?>#contact" class="btn-primary py-3 px-6 h-auto text-sm">
                    Let's Connect
                </a>
            </div>

            <!-- Mobile Toggle -->
            <button class="md:hidden w-12 h-12 glass flex items-center justify-center rounded-2xl text-white" id="mobile-toggle">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-dark/98 z-[-1] flex flex-col items-center justify-center gap-10 opacity-0 pointer-events-none transition-all duration-500">
        <a href="<?= baseUrl() ?>" class="text-5xl font-display font-black hover:text-accent-primary transition-colors">Home</a>
        <a href="<?= baseUrl('projects') ?>" class="text-5xl font-display font-black hover:text-accent-primary transition-colors">Portfolio</a>
        <a href="<?= baseUrl('blog') ?>" class="text-5xl font-display font-black hover:text-accent-primary transition-colors">Blog</a>
        <a href="<?= baseUrl() ?>#contact" class="text-5xl font-display font-black text-accent-primary">Contact</a>
    </div>
</nav>

<script>
    const nav = document.getElementById('main-nav');
    const toggle = document.getElementById('mobile-toggle');
    const menu = document.getElementById('mobile-menu');
    let isOpen = false;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 10) {
            nav.classList.add('py-4');
            nav.classList.remove('py-8');
        } else {
            nav.classList.add('py-8');
            nav.classList.remove('py-4');
        }
    });

    toggle.addEventListener('click', () => {
        isOpen = !isOpen;
        if (isOpen) {
            menu.classList.remove('opacity-0', 'pointer-events-none');
            toggle.innerHTML = '<i data-lucide="x" class="w-6 h-6"></i>';
            document.body.style.overflow = 'hidden';
        } else {
            menu.classList.add('opacity-0', 'pointer-events-none');
            toggle.innerHTML = '<i data-lucide="menu" class="w-6 h-6"></i>';
            document.body.style.overflow = '';
        }
        lucide.createIcons();
    });
</script>
