<section class="pt-40 pb-20 relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mb-20 reveal">
            <span class="text-accent-primary font-black uppercase tracking-[0.3em] text-sm mb-6 block">Catatan & Pemikiran</span>
            <h1 class="text-6xl md:text-8xl font-black mb-8 leading-tight">Insight & <span class="gradient-text italic">Inovasi.</span></h1>
            <p class="text-xl text-slate-400 leading-loose">Menjelajahi persimpangan antara desain, teknologi, dan kreativitas. Berikut adalah artikel dan panduan terbaru saya.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php if (!empty($blogs)): ?>
                <?php foreach ($blogs as $blog): ?>
                <div class="reveal group h-full">
                    <div class="glass-premium glass-hover rounded-[40px] p-4 h-full flex flex-col border-white/5">
                        <div class="aspect-[16/10] overflow-hidden rounded-[32px] relative mb-8">
                            <?php if (!empty($blog->image)): ?>
                                <img src="<?= baseUrl('assets/images/' . $blog->image) ?>" alt="<?= $blog->title ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-800/80 flex items-center justify-center">
                                    <i data-lucide="image" class="w-16 h-16 text-slate-700"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <!-- Date Badge -->
                            <div class="absolute top-6 left-6 glass-premium px-4 py-2 rounded-2xl flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-accent-primary"></i>
                                <span class="text-[10px] font-black text-white"><?= date('d M Y', strtotime($blog->created_at)) ?></span>
                            </div>
                        </div>
                        
                        <div class="px-4 pb-4 grow flex flex-col">
                            <div class="flex items-center gap-2 text-accent-cyan font-black uppercase tracking-widest text-[10px] mb-4">
                                <span class="w-2 h-2 rounded-full bg-accent-cyan"></span>
                                Tutorial & Development
                            </div>
                            <h3 class="text-2xl font-black mb-4 group-hover:text-accent-primary transition-colors leading-tight"><?= $blog->title ?></h3>
                            <p class="text-slate-500 mb-8 line-clamp-3 text-sm leading-relaxed grow"><?= strip_tags($blog->content) ?></p>
                            
                            <div class="flex items-center justify-between pt-6 border-t border-white/5">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-slate-800 overflow-hidden">
                                        <img src="https://i.pravatar.cc/100" alt="Author" class="w-full h-full object-cover">
                                    </div>
                                    <span class="text-xs font-bold text-slate-400">Admin</span>
                                </div>
                                <a href="<?= baseUrl('blog/' . $blog->slug) ?>" class="btn-glass px-4 py-2 rounded-xl text-[10px] uppercase tracking-widest font-black group/btn">
                                    Baca Selengkapnya
                                    <i data-lucide="arrow-up-right" class="w-4 h-4 group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full py-32 text-center reveal">
                    <div class="w-24 h-24 bg-slate-800/50 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                        <i data-lucide="book-open" class="w-10 h-10 text-slate-600"></i>
                    </div>
                    <h3 class="text-2xl font-black mb-4">Belum Ada Artikel</h3>
                    <p class="text-slate-500 italic">Saya sedang menulis sesuatu yang luar biasa untuk Anda.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination (Mock for now) -->
        <div class="mt-20 flex justify-center reveal">
            <div class="glass-premium p-2 rounded-3xl flex items-center gap-2">
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl hover:bg-white/5 transition-colors disabled:opacity-30" disabled>
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
                <div class="px-6 py-2 bg-accent-primary rounded-2xl text-white font-black text-sm">1</div>
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl hover:bg-white/5 transition-colors">
                    <i data-lucide="chevron-right" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>
</section>
