<section class="pt-48 pb-20 relative overflow-hidden">
    <div class="container mx-auto px-6">
        <!-- Back Button -->
        <a href="<?= baseUrl('projects') ?>" class="inline-flex items-center gap-3 text-slate-400 hover:text-white transition-colors mb-12 group reveal">
            <div class="w-10 h-10 glass rounded-xl flex items-center justify-center group-hover:bg-accent-primary group-hover:text-white transition-all">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </div>
            <span class="font-black uppercase tracking-widest text-[10px]">Eksplorasi Lainnya</span>
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center mb-32">
            <div class="reveal">
                <div class="inline-flex items-center gap-3 px-4 py-2 glass rounded-2xl text-accent-cyan text-[10px] font-black uppercase tracking-[0.2em] mb-8">
                    <?= $project->category_name ?? 'Case Study' ?>
                </div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black mb-10 leading-[1.1]"><?= $project->title ?></h1>
                <p class="text-xl text-slate-400 leading-relaxed mb-12"><?= strip_tags($project->description) ?></p>
                
                <div class="grid grid-cols-2 gap-8 mb-12">
                    <div class="glass-premium p-8 rounded-[32px] border-white/5">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500 block mb-2">Klien</span>
                        <span class="text-white font-bold text-lg"><?= $project->client ?? 'Internal Project' ?></span>
                    </div>
                    <div class="glass-premium p-8 rounded-[32px] border-white/5">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500 block mb-2">Tahun</span>
                        <span class="text-white font-bold text-lg"><?= date('Y', strtotime($project->created_at)) ?></span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 mb-12">
                    <?php 
                    $techs = explode(',', $project->tech_stack ?? '');
                    foreach ($techs as $tech): 
                    ?>
                        <span class="px-6 py-3 glass rounded-2xl text-[10px] font-black uppercase tracking-[0.1em] text-slate-300">
                            <?= trim($tech) ?>
                        </span>
                    <?php endforeach; ?>
                </div>

                <div class="flex gap-6">
                    <?php if(!empty($project->demo_url)): ?>
                        <a href="<?= $project->demo_url ?>" target="_blank" class="btn-primary">
                            Live Demo
                            <i data-lucide="external-link" class="w-5 h-5"></i>
                        </a>
                    <?php endif; ?>
                    <?php if(!empty($project->github_url)): ?>
                        <a href="<?= $project->github_url ?>" target="_blank" class="btn-glass">
                            Github
                            <i data-lucide="github" class="w-5 h-5"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="relative reveal">
                <div class="absolute inset-0 bg-accent-cyan/10 blur-[100px] rounded-full animate-pulse"></div>
                <div class="glass-premium p-4 rounded-[60px] border-white/5 shadow-3xl overflow-hidden group relative z-10">
                    <div class="aspect-square rounded-[48px] overflow-hidden">
                        <?php if (!empty($project->screenshot)): ?>
                            <img src="<?= baseUrl('assets/images/' . $project->screenshot) ?>" alt="<?= $project->title ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full bg-slate-800/50 flex items-center justify-center">
                                <i data-lucide="image" class="w-24 h-24 text-slate-700"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Case Study Content (Optional / Placeholders) -->
        <div class="reveal max-w-4xl mx-auto py-20 border-t border-white/5">
            <h2 class="text-4xl font-black mb-12">Tantangan & <span class="gradient-text italic">Solusi</span></h2>
            <div class="prose prose-invert prose-lg max-w-none prose-p:leading-loose prose-p:text-slate-400">
                <p>Proyek ini dimulai dengan visi untuk menyederhanakan workflow yang kompleks. Tantangan utama adalah mengintegrasikan beberapa sistem legacy ke dalam interface yang modern dan responsif tanpa mengorbankan performa.</p>
                <p>Solusi yang diterapkan mencakup arsitektur microservices berbasis Node.js dengan frontend yang sangat dinamis menggunakan React dan GSAP untuk visualisasi data yang interaktif.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-20">
                <div class="glass-premium p-10 rounded-[40px] border-white/5">
                    <div class="w-12 h-12 bg-red-500/20 rounded-2xl flex items-center justify-center text-red-500 mb-8">
                        <i data-lucide="alert-circle" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-2xl font-black mb-4 text-white">Problem</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Latency tinggi saat memproses data real-time dalam jumlah besar antar platform.</p>
                </div>
                <div class="glass-premium p-10 rounded-[40px] border-white/5">
                    <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center text-green-500 mb-8">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-2xl font-black mb-4 text-white">Outcome</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Peningkatan kecepatan proses hingga 60% dan sistem yang lebih scalable untuk growth masa depan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
