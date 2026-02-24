<section class="pt-40 pb-20 relative overflow-hidden">
    <!-- Background Decor -->
    <div class="blob w-[600px] h-[600px] bg-accent-primary/10 -top-48 -right-48 opacity-20"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-end justify-between mb-20 gap-10 reveal">
            <div class="max-w-3xl">
                <span class="text-accent-cyan font-black uppercase tracking-[0.3em] text-sm mb-6 block">Portofolio</span>
                <h1 class="text-6xl md:text-8xl font-black mb-8 leading-tight">Solusi Digital <br><span class="gradient-text italic">Tanpa Batas.</span></h1>
                <p class="text-xl text-slate-400 leading-loose">Menampilkan kurasi proyek terbaik saya yang menggabungkan inovasi teknis dengan desain yang intuitif.</p>
            </div>
            
            <!-- Category Filter -->
            <div class="glass-premium p-2 rounded-[32px] flex flex-wrap gap-2">
                <button onclick="filterProjects('all')" class="cat-btn px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all bg-accent-primary text-white shadow-lg" data-category="all">Semua</button>
                <?php foreach ($categories as $cat): ?>
                    <button onclick="filterProjects('<?= strtolower($cat->name) ?>')" class="cat-btn px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all text-slate-500 hover:text-white hover:bg-white/5" data-category="<?= strtolower($cat->name) ?>">
                        <?= $cat->name ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" id="projects-grid">
            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                <div class="project-card reveal group" data-category="<?= strtolower($project->category_name ?? '') ?>">
                    <div class="glass-premium glass-hover rounded-[40px] p-4 h-full flex flex-col border-white/5">
                        <div class="aspect-[16/10] overflow-hidden rounded-[32px] relative mb-8">
                            <?php if (!empty($project->screenshot)): ?>
                                <img src="<?= baseUrl('assets/images/' . $project->screenshot) ?>" alt="<?= $project->title ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-800/80 flex items-center justify-center">
                                    <i data-lucide="image" class="w-16 h-16 text-slate-700"></i>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-6 left-6 glass-premium px-4 py-2 rounded-2xl">
                                <span class="text-[10px] font-black uppercase tracking-widest text-accent-cyan"><?= $project->category_name ?? 'Featured' ?></span>
                            </div>
                        </div>
                        
                        <div class="px-4 pb-4 grow flex flex-col">
                            <h3 class="text-2xl font-black mb-4 group-hover:text-accent-primary transition-colors leading-tight"><?= $project->title ?></h3>
                            <p class="text-slate-500 mb-8 line-clamp-3 text-sm leading-relaxed grow"><?= strip_tags($project->description) ?></p>
                            
                            <div class="flex flex-wrap gap-2 mb-8">
                                <?php 
                                $techs = explode(',', $project->tech_stack ?? '');
                                foreach (array_slice($techs, 0, 3) as $tech): 
                                ?>
                                    <span class="px-3 py-1.5 glass rounded-xl text-[9px] font-black uppercase tracking-[0.1em] text-slate-400">
                                        <?= trim($tech) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                            
                            <a href="<?= baseUrl('projects/' . $project->slug) ?>" class="btn-glass w-full py-4 text-[10px] uppercase tracking-[0.2em] group/btn">
                                Detail Proyek
                                <i data-lucide="chevron-right" class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full py-32 text-center reveal">
                    <div class="w-24 h-24 bg-slate-800/50 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                        <i data-lucide="box" class="w-10 h-10 text-slate-600"></i>
                    </div>
                    <h3 class="text-2xl font-black mb-4">Portofolio Kosong</h3>
                    <p class="text-slate-500 italic">Karya inovatif sedang dalam pengembangan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    function filterProjects(category) {
        const cards = document.querySelectorAll('.project-card');
        const buttons = document.querySelectorAll('.cat-btn');
        
        // Update Buttons
        buttons.forEach(btn => {
            if (btn.dataset.category === category) {
                btn.classList.add('bg-accent-primary', 'text-white', 'shadow-lg');
                btn.classList.remove('text-slate-500', 'hover:bg-white/5');
            } else {
                btn.classList.remove('bg-accent-primary', 'text-white', 'shadow-lg');
                btn.classList.add('text-slate-500', 'hover:bg-white/5');
            }
        });

        // Filter Grid
        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                gsap.to(card, { 
                    opacity: 1, 
                    scale: 1, 
                    duration: 0.5, 
                    display: 'block',
                    ease: 'expo.out' 
                });
            } else {
                gsap.to(card, { 
                    opacity: 0, 
                    scale: 0.9, 
                    duration: 0.4, 
                    display: 'none',
                    ease: 'expo.in' 
                });
            }
        });
    }
</script>
