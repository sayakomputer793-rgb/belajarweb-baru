<footer class="mt-20 border-t border-white/5 bg-slate-900/30 overflow-hidden relative">
    <div class="container mx-auto px-6 py-20 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
            <div class="md:col-span-2">
                <a href="<?= baseUrl() ?>" class="flex items-center gap-3 mb-8 group">
                    <div class="w-12 h-12 bg-accent-primary rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition-all">
                        <i data-lucide="code" class="text-white w-6 h-6"></i>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-white">DEV<span class="text-accent-primary">.</span></span>
                </a>
                <p class="text-slate-400 max-w-sm mb-8 leading-loose">
                    Membangun pengalaman digital yang berkesan melalui kode yang bersih dan desain yang modern. Berfokus pada performa dan user-centric development.
                </p>
                <div class="flex items-center gap-4">
                    <?php 
                    $socials = [
                        ['github', $settings['github_url'] ?? '#'],
                        ['linkedin', $settings['linkedin_url'] ?? '#'],
                        ['twitter', $settings['twitter_url'] ?? '#'],
                        ['instagram', $settings['instagram_url'] ?? '#'],
                    ];
                    foreach ($socials as [$icon, $url]):
                    ?>
                        <a href="<?= $url ?>" target="_blank" class="w-12 h-12 glass flex items-center justify-center rounded-2xl transition-all hover:bg-accent-primary hover:text-white hover:-translate-y-1">
                            <i data-lucide="<?= $icon ?>" class="w-5 h-5"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-8">Eksplorasi</h4>
                <ul class="space-y-4 text-slate-400 font-medium">
                    <li><a href="<?= baseUrl() ?>" class="hover:text-accent-primary transition-colors">Utama</a></li>
                    <li><a href="<?= baseUrl('projects') ?>" class="hover:text-accent-primary transition-colors">Portofolio</a></li>
                    <li><a href="<?= baseUrl('blog') ?>" class="hover:text-accent-primary transition-colors">Catatan</a></li>
                    <li><a href="<?= baseUrl() ?>#contact" class="hover:text-accent-primary transition-colors">Kontak</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-8">Hubungi</h4>
                <ul class="space-y-6 text-slate-400">
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 glass flex items-center justify-center rounded-xl shrink-0">
                            <i data-lucide="mail" class="w-4 h-4 text-accent-primary"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs uppercase font-black tracking-widest text-slate-500 mb-1">Email</span>
                            <span class="text-slate-200"><?= $settings['contact_email'] ?? 'hello@devportfolio.com' ?></span>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 glass flex items-center justify-center rounded-xl shrink-0">
                            <i data-lucide="map-pin" class="w-4 h-4 text-accent-primary"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs uppercase font-black tracking-widest text-slate-500 mb-1">Lokasi</span>
                            <span class="text-slate-200"><?= $settings['contact_address'] ?? 'Jakarta, Indonesia' ?></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="pt-10 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-6 text-sm font-medium">
            <p class="text-slate-500">&copy; <?= date('Y') ?> <span class="text-slate-300"><?= $settings['site_name'] ?? 'DevPortfolio' ?></span>. Dibuat dengan <i data-lucide="heart" class="w-4 h-4 inline-block text-red-500 fill-red-500 mx-1"></i> untuk web yang lebih baik.</p>
            <div class="flex items-center gap-8 text-slate-500">
                <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white transition-colors">Ketentuan Layanan</a>
            </div>
        </div>
    </div>
    
    <!-- Footer Decoration -->
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-accent-primary/5 blur-[120px] rounded-full translate-x-1/2 translate-y-1/2"></div>
</footer>
