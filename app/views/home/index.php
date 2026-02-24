<!-- Hero Section -->
<section id="home" class="min-h-screen pt-40 pb-20 flex items-center relative overflow-hidden">
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-3 px-4 py-2 glass-premium rounded-full text-accent-primary text-xs font-black uppercase tracking-[0.2em] mb-8 reveal-left">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-accent-primary"></span>
                    </span>
                    <span>Ready for new challenges</span>
                </div>
                
                <h1 class="text-6xl md:text-8xl lg:text-9xl font-black mb-10 leading-[0.9] reveal-left" style="transition-delay: 0.1s">
                    <?= $settings['hero_title'] ?? 'Digital' ?> <br>
                    <span class="gradient-text italic"><?= $settings['hero_subtitle'] ?? 'Architect' ?></span>
                </h1>
                
                <p class="text-xl md:text-2xl text-slate-400 max-w-xl mb-12 leading-relaxed reveal-left" style="transition-delay: 0.2s">
                    <?= $settings['hero_description'] ?? 'Saya merancang dan membangun ekosistem digital yang modern, berperforma tinggi, dan fokus pada pengalaman pengguna.' ?>
                </p>
                
                <div class="flex flex-col sm:flex-row items-center gap-6 reveal-left" style="transition-delay: 0.3s">
                    <a href="#projects" class="btn-primary w-full sm:w-auto">
                        Lihat Proyek
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="#about" class="btn-glass w-full sm:w-auto">
                        Tentang Saya
                    </a>
                </div>
                
                <div class="mt-16 flex items-center gap-10 reveal-left" style="transition-delay: 0.4s">
                    <div class="flex -space-x-4">
                        <?php for($i=1; $i<=4; $i++): ?>
                            <div class="w-12 h-12 rounded-full border-4 border-dark overflow-hidden bg-slate-800">
                                <img src="https://i.pravatar.cc/150?u=<?= $i ?>" alt="Client" class="w-full h-full object-cover">
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-white font-bold text-lg">50+ Klien Puas</span>
                        <span class="text-slate-500 text-sm font-medium">Bekerja sama secara global</span>
                    </div>
                </div>
            </div>
            
            <div class="relative reveal-right hidden lg:block">
                <div class="absolute inset-0 bg-gradient-to-br from-accent-primary/30 to-accent-secondary/30 rounded-[60px] blur-[80px] -z-10 animate-pulse"></div>
                
                <div class="relative glass-premium rounded-[60px] p-4 border-white/5 shadow-2xl overflow-hidden group">
                    <div class="aspect-[4/5] rounded-[48px] overflow-hidden relative">
                        <?php if (!empty($settings['hero_image'])): ?>
                            <img src="<?= baseUrl('assets/images/' . $settings['hero_image']) ?>" alt="Hero" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                        <?php else: ?>
                            <div class="w-full h-full bg-slate-800/50 flex items-center justify-center relative overflow-hidden">
                                <i data-lucide="code-2" class="w-48 h-48 text-white/5 absolute -right-10 -bottom-10 rotate-12"></i>
                                <div class="text-center relative z-10 p-12">
                                    <div class="w-24 h-24 bg-accent-primary/20 rounded-3xl flex items-center justify-center mx-auto mb-8 animate-float">
                                        <i data-lucide="terminal" class="w-12 h-12 text-accent-primary"></i>
                                    </div>
                                    <h3 class="text-3xl font-black mb-4">Building Tomorrow</h3>
                                    <p class="text-slate-400 font-medium">Full-Stack Development & Clean Code Enthusiast</p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Mini Overlay Info -->
                        <div class="absolute bottom-8 left-8 right-8 glass-premium p-6 rounded-3xl flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-xs font-black uppercase tracking-widest text-slate-500 mb-1">Current Tech</span>
                                <span class="text-white font-bold">Next.js + Laravel</span>
                            </div>
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md">
                                <i data-lucide="box" class="w-6 h-6 text-accent-cyan"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Tags -->
                <div class="absolute -top-10 -right-10 glass-premium px-6 py-4 rounded-3xl animate-float">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-xl flex items-center justify-center text-green-500">
                            <i data-lucide="check-circle" class="w-6 h-6"></i>
                        </div>
                        <span class="text-white font-bold">Highly Rated</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-32 relative">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
            <div class="lg:col-span-5 reveal-left">
                <div class="relative">
                    <span class="text-accent-primary font-black uppercase tracking-[0.3em] text-sm mb-6 block">Kisah Saya</span>
                    <h2 class="text-5xl md:text-6xl font-black mb-10 leading-tight">Mewujudkan Ide Lewat <span class="gradient-text italic">Baris Kode.</span></h2>
                    <p class="text-xl text-slate-400 leading-loose mb-10">
                        <?= $settings['about_text'] ?? 'Saya adalah seorang pengembang yang bersemangat dalam menggabungkan estetika desain dengan efisiensi backend. Dengan pengalaman lebih dari 5 tahun, saya telah membantu startup dan perusahaan membangun solusi web yang tidak hanya berfungsi dengan baik, tetapi juga menyenangkan untuk digunakan.' ?>
                    </p>
                    
                    <div class="flex items-center gap-12">
                        <div class="flex flex-col">
                            <span class="text-5xl font-black text-white"><?= $settings['experience_years'] ?? '5+' ?></span>
                            <span class="text-sm font-bold text-slate-500 uppercase tracking-widest mt-2">Tahun Pengalaman</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-5xl font-black text-white"><?= $settings['projects_completed'] ?? '50+' ?></span>
                            <span class="text-sm font-bold text-slate-500 uppercase tracking-widest mt-2">Proyek Selesai</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="lg:col-span-7 reveal-right">
                <div class="glass-premium p-10 md:p-16 rounded-[48px] relative overflow-hidden border-white/5 shadow-3xl">
                    <div class="absolute top-0 right-0 p-10 opacity-10">
                        <i data-lucide="zap" class="w-48 h-48 text-accent-secondary"></i>
                    </div>
                    
                    <h3 class="text-3xl font-black mb-12 flex items-center gap-4">
                        <div class="w-12 h-12 bg-accent-secondary/20 rounded-2xl flex items-center justify-center text-accent-secondary">
                            <i data-lucide="layers" class="w-6 h-6"></i>
                        </div>
                        Keahlian Utama
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <?php if (!empty($skills)): ?>
                            <?php foreach ($skills as $skill): ?>
                            <div class="group">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="font-bold text-slate-200 group-hover:text-accent-primary transition-colors"><?= $skill['name'] ?></span>
                                    <span class="text-accent-primary font-mono font-black"><?= $skill['percent'] ?>%</span>
                                </div>
                                <div class="h-3 w-full bg-slate-800 rounded-full overflow-hidden p-1 shadow-inner">
                                    <div class="skill-fill h-full bg-gradient-to-r from-accent-primary via-accent-secondary to-accent-cyan rounded-full relative" style="width: 0%;" data-percent="<?= $skill['percent'] ?>%">
                                        <div class="absolute top-0 right-0 w-2 h-full bg-white/20 blur-[2px]"></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-slate-500 italic">Data keahlian belum tersedia.</p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-16 pt-10 border-t border-white/5 flex flex-wrap gap-4">
                        <?php 
                        $badges = ['PHP 8+', 'Laravel', 'Next.js', 'React', 'Tailwind CSS', 'Docker', 'AWS'];
                        foreach ($badges as $badge):
                        ?>
                            <span class="px-6 py-3 glass rounded-2xl text-xs font-black uppercase tracking-widest text-slate-400 group-hover:text-white transition-all cursor-default">
                                <?= $badge ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section id="projects" class="py-32 bg-slate-900/40 relative">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-end justify-between mb-20 gap-8">
            <div class="max-w-2xl reveal">
                <span class="text-accent-cyan font-black uppercase tracking-[0.3em] text-sm mb-6 block">Karya Terpilih</span>
                <h2 class="text-5xl md:text-6xl font-black mb-8 leading-tight">Proyek yang Membawa <br><span class="gradient-text italic">Perubahan.</span></h2>
            </div>
            <a href="<?= baseUrl('projects') ?>" class="group flex items-center gap-4 reveal">
                <span class="font-black uppercase tracking-widest text-sm text-slate-500 group-hover:text-white transition-colors">Lihat Semua Karya</span>
                <div class="w-14 h-14 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center group-hover:bg-accent-primary group-hover:border-accent-primary transition-all group-hover:translate-x-2">
                    <i data-lucide="arrow-right" class="w-6 h-6 text-white"></i>
                </div>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                <div class="reveal group h-full">
                    <div class="glass-premium glass-hover rounded-[40px] p-4 h-full flex flex-col border-white/5">
                        <div class="aspect-[16/10] overflow-hidden rounded-[32px] relative mb-8">
                            <?php if (!empty($project->screenshot)): ?>
                                <img src="<?= baseUrl('assets/images/' . $project->screenshot) ?>" alt="<?= $project->title ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            <?php else: ?>
                                <div class="w-full h-full bg-slate-800/80 flex items-center justify-center">
                                    <i data-lucide="image" class="w-16 h-16 text-slate-700"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <div class="absolute bottom-6 left-6 right-6 translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="flex flex-wrap gap-2">
                                    <?php 
                                    $techs = explode(',', $project->tech_stack ?? '');
                                    foreach (array_slice($techs, 0, 3) as $tech): 
                                    ?>
                                        <span class="px-3 py-1.5 bg-white/20 backdrop-blur-md rounded-xl text-[10px] font-black uppercase tracking-widest text-white border border-white/20">
                                            <?= trim($tech) ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="px-4 pb-4 grow flex flex-col">
                            <div class="flex items-center gap-2 text-accent-primary font-black uppercase tracking-widest text-[10px] mb-4">
                                <span class="w-2 h-2 rounded-full bg-accent-primary animate-pulse"></span>
                                <?= $project->category_name ?? 'Featured' ?>
                            </div>
                            <h3 class="text-2xl font-black mb-4 group-hover:text-accent-primary transition-colors leading-tight"><?= $project->title ?></h3>
                            <p class="text-slate-500 mb-8 line-clamp-3 text-sm leading-relaxed grow"><?= strip_tags($project->description) ?></p>
                            
                            <a href="<?= baseUrl('projects/' . $project->slug) ?>" class="flex items-center gap-3 text-white font-black uppercase tracking-widest text-xs group/btn">
                                <span>Lihat Detail</span>
                                <div class="w-10 h-10 glass rounded-xl flex items-center justify-center group-hover/btn:bg-white group-hover/btn:text-dark transition-all">
                                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full py-32 text-center reveal">
                    <div class="w-24 h-24 bg-slate-800/50 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                        <i data-lucide="folder-open" class="w-10 h-10 text-slate-600"></i>
                    </div>
                    <h3 class="text-2xl font-black mb-4">Belum Ada Proyek</h3>
                    <p class="text-slate-500 italic">Karya hebat sedang dalam proses pembuatan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Stats Grid (Bonus UI Upgrade) -->
<section class="py-20 relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 reveal">
            <?php 
            $stats = [
                ['Satisfied Clients', '50+', 'users'],
                ['Finished Projects', '120+', 'briefcase'],
                ['Global Reach', '12', 'globe'],
                ['Cups of Coffee', '1k+', 'coffee'],
            ];
            foreach ($stats as [$label, $val, $icon]):
            ?>
                <div class="glass-premium p-8 rounded-[32px] text-center border-white/5 relative group overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-accent-primary to-accent-cyan scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500"></div>
                    <div class="w-14 h-14 bg-white/5 rounded-2xl flex items-center justify-center mx-auto mb-6 text-accent-primary group-hover:scale-110 transition-transform">
                        <i data-lucide="<?= $icon ?>" class="w-6 h-6"></i>
                    </div>
                    <div class="text-4xl font-black text-white mb-2"><?= $val ?></div>
                    <div class="text-[10px] font-black uppercase tracking-widest text-slate-500"><?= $label ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section id="contact" class="py-32 relative">
    <div class="container mx-auto px-6">
        <div class="glass-premium p-12 md:p-24 rounded-[64px] relative overflow-hidden reveal border-white/5 shadow-3xl">
            <!-- Background Glows -->
            <div class="absolute -top-48 -right-48 w-96 h-96 bg-accent-primary/20 blur-[120px] rounded-full"></div>
            <div class="absolute -bottom-48 -left-48 w-96 h-96 bg-accent-cyan/10 blur-[120px] rounded-full"></div>
            
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div>
                    <span class="text-accent-secondary font-black uppercase tracking-[0.3em] text-sm mb-6 block">Kontak</span>
                    <h2 class="text-5xl md:text-7xl font-black mb-10 leading-tight">Siap Untuk <br><span class="gradient-text italic">Berkarya Bersama?</span></h2>
                    <p class="text-xl text-slate-400 mb-12 leading-loose">Saya selalu terbuka untuk proyek menarik, kolaborasi, atau sekadar berbincang tentang teknologi masa depan.</p>
                    
                    <div class="space-y-8">
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 glass rounded-[24px] flex items-center justify-center text-accent-primary group-hover:bg-accent-primary group-hover:text-white transition-all shadow-xl">
                                <i data-lucide="mail" class="w-8 h-8"></i>
                            </div>
                            <div>
                                <div class="text-[10px] font-black tracking-[0.2em] text-slate-500 uppercase mb-1">Kirim Email</div>
                                <div class="text-2xl font-bold text-white"><?= $settings['contact_email'] ?? 'hello@devportfolio.com' ?></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group">
                            <div class="w-16 h-16 glass rounded-[24px] flex items-center justify-center text-accent-cyan group-hover:bg-accent-cyan group-hover:text-white transition-all shadow-xl">
                                <i data-lucide="message-square" class="w-8 h-8"></i>
                            </div>
                            <div>
                                <div class="text-[10px] font-black tracking-[0.2em] text-slate-500 uppercase mb-1">WhatsApp</div>
                                <div class="text-2xl font-bold text-white"><?= $settings['contact_phone'] ?? '+62 812-3456-7890' ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="glass-premium p-10 md:p-14 rounded-[48px] border-white/5">
                    <form id="contact-form" class="space-y-10">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-4">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1">Nama Lengkap</label>
                                <input type="text" name="name" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-5 focus:border-accent-primary focus:bg-slate-900 outline-none transition-all placeholder:text-slate-700 text-white font-medium" placeholder="Jane Doe">
                            </div>
                            <div class="space-y-4">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1">Alamat Email</label>
                                <input type="email" name="email" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-5 focus:border-accent-primary focus:bg-slate-900 outline-none transition-all placeholder:text-slate-700 text-white font-medium" placeholder="jane@example.com">
                            </div>
                        </div>
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1">Subjek</label>
                            <input type="text" name="subject" required class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-5 focus:border-accent-primary focus:bg-slate-900 outline-none transition-all placeholder:text-slate-700 text-white font-medium" placeholder="Tanya tentang proyek...">
                        </div>
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest px-1">Pesan</label>
                            <textarea name="message" required rows="5" class="w-full bg-slate-900/50 border border-white/10 rounded-2xl px-6 py-5 focus:border-accent-primary focus:bg-slate-900 outline-none transition-all placeholder:text-slate-700 text-white font-medium resize-none" placeholder="Ceritakan ide brilian Anda..."></textarea>
                        </div>
                        
                        <div id="contact-alert" class="contact-alert"></div>
                        
                        <button type="submit" class="btn-primary w-full py-6 group">
                            <span id="btn-text">Kirim Pesan Sekarang</span>
                            <i data-lucide="send" class="w-6 h-6 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" id="btn-icon"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
