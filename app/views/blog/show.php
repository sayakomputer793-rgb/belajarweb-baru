<section class="pt-48 pb-20 relative">
    <div class="container mx-auto px-6 max-w-5xl">
        <!-- Back Button -->
        <a href="<?= baseUrl('blog') ?>" class="inline-flex items-center gap-3 text-slate-400 hover:text-white transition-colors mb-12 group reveal">
            <div class="w-10 h-10 glass rounded-xl flex items-center justify-center group-hover:bg-accent-primary group-hover:text-white transition-all">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </div>
            <span class="font-black uppercase tracking-widest text-[10px]">Kembali ke Blog</span>
        </a>

        <!-- Header -->
        <div class="reveal mb-16">
            <div class="flex items-center gap-4 mb-8">
                <span class="px-4 py-2 glass-premium rounded-full text-accent-primary text-[10px] font-black uppercase tracking-[0.2em] shadow-lg shadow-accent-primary/10">Tutorial</span>
                <span class="text-slate-500 font-bold text-sm"><?= date('d M Y', strtotime($blog->created_at)) ?></span>
                <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                <span class="text-slate-500 font-bold text-sm">5 Menit Baca</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-black mb-10 leading-[1.1] text-white"><?= $blog->title ?></h1>
            
            <div class="flex items-center gap-6 p-1 glass-premium rounded-[32px] w-fit pr-8">
                <div class="w-14 h-14 rounded-[28px] overflow-hidden shadow-xl">
                    <img src="https://i.pravatar.cc/100" alt="Admin" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-black">Admin DevPortfolio</span>
                    <span class="text-slate-500 text-xs font-bold uppercase tracking-widest">Full-Stack Developer</span>
                </div>
            </div>
        </div>

        <!-- Hero Image -->
        <div class="reveal mb-20">
            <div class="glass-premium p-4 rounded-[48px] border-white/5 shadow-3xl">
                <div class="aspect-[21/9] rounded-[36px] overflow-hidden relative">
                    <?php if (!empty($blog->image)): ?>
                        <img src="<?= baseUrl('assets/images/' . $blog->image) ?>" alt="<?= $blog->title ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full bg-slate-800/50 flex items-center justify-center">
                            <i data-lucide="image" class="w-24 h-24 text-slate-700"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/60 via-transparent to-transparent"></div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">
            <div class="lg:col-span-8 reveal">
                <div class="prose prose-invert prose-lg max-w-none 
                    prose-headings:font-display prose-headings:font-black prose-headings:text-white
                    prose-p:text-slate-400 prose-p:leading-loose
                    prose-strong:text-accent-primary
                    prose-img:rounded-[32px] prose-img:border-8 prose-img:border-white/5
                    prose-pre:bg-slate-900/50 prose-pre:border prose-pre:border-white/10 prose-pre:rounded-3xl
                    prose-a:text-accent-cyan prose-a:no-underline hover:prose-a:underline">
                    <?= $blog->content ?>
                </div>
                
                <!-- Share & Tags -->
                <div class="mt-20 pt-10 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-10">
                    <div class="flex flex-wrap gap-3">
                        <?php foreach(['Clean Code', 'PHP', 'Architecture'] as $tag): ?>
                            <span class="px-5 py-2 glass rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-white transition-colors cursor-pointer">
                                #<?= $tag ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Bagikan:</span>
                        <div class="flex items-center gap-2">
                            <?php foreach(['facebook', 'twitter', 'linkedin'] as $sm): ?>
                                <button class="w-10 h-10 glass rounded-xl flex items-center justify-center hover:bg-accent-primary hover:text-white transition-all">
                                    <i data-lucide="<?= $sm ?>" class="w-4 h-4"></i>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Bio Widget -->
                <div class="mt-20 p-10 glass-premium rounded-[48px] border-white/5 flex flex-col md:flex-row gap-10 items-center">
                    <div class="w-32 h-32 rounded-[40px] overflow-hidden shadow-2xl shrink-0 group">
                        <img src="https://i.pravatar.cc/150" alt="Admin" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="text-center md:text-left">
                        <h4 class="text-2xl font-black mb-4">Tentang Penulis</h4>
                        <p class="text-slate-400 mb-6 leading-relaxed">Admin DevPortfolio adalah seorang pengembang piranti lunak yang terobsesi dengan performa dan estetika. Menghabiskan waktu luang untuk mencoba teknologi terbaru.</p>
                        <div class="flex items-center justify-center md:justify-start gap-4">
                            <a href="#" class="text-accent-primary font-bold hover:underline">Follow @admin</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-12 reveal">
                <!-- Newsletter -->
                <div class="glass-premium p-10 rounded-[40px] border-white/5 relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-accent-primary/10 blur-3xl rounded-full"></div>
                    <div class="relative z-10">
                        <h4 class="text-xl font-black mb-6">Dapatkan Insight Terbaru</h4>
                        <p class="text-sm text-slate-500 mb-8 leading-relaxed">Berlangganan newsletter saya untuk mendapatkan update mingguan tentang teknologi web.</p>
                        <form class="space-y-4">
                            <input type="email" placeholder="email@anda.com" class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-4 focus:border-accent-primary outline-none transition-all placeholder:text-slate-700 text-sm">
                            <button type="submit" class="btn-primary w-full py-4 text-sm">Langganan</button>
                        </form>
                    </div>
                </div>

                <!-- Recent Posts -->
                <div class="space-y-8">
                    <h4 class="text-lg font-black flex items-center gap-3">
                        <div class="w-2 h-6 bg-accent-cyan rounded-full"></div>
                        Artikel Terkait
                    </h4>
                    <div class="space-y-6">
                        <?php for($i=0; $i<3; $i++): ?>
                        <a href="#" class="group flex items-center gap-5">
                            <div class="w-20 h-20 rounded-2xl bg-slate-800 overflow-hidden shrink-0">
                                <img src="https://picsum.photos/seed/<?= $i ?>/200" alt="Recent" class="w-full h-full object-cover group-hover:scale-110 transition-transform">
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Feb 24, 2024</span>
                                <h5 class="font-bold text-slate-200 group-hover:text-white group-hover:underline line-clamp-2">Tips Optimasi Backend Laravel 11</h5>
                            </div>
                        </a>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
