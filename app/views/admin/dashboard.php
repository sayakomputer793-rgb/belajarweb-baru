<div class="space-y-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card group overflow-hidden">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                    <i data-lucide="folder-kanban" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-black text-slate-500 uppercase tracking-widest">Total Produk</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-4xl font-display font-black text-white"><?= $totalProjects ?></h3>
                <span class="text-xs text-slate-500 font-bold">Proyek</span>
            </div>
            <div class="mt-6 pt-6 border-t border-white/5">
                <a href="<?= baseUrl('admin/projects') ?>" class="text-xs font-bold text-accent-primary hover:text-white transition-colors flex items-center gap-2">
                    Kelola Proyek <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </a>
            </div>
        </div>
        <div class="card group overflow-hidden">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-500 group-hover:scale-110 transition-transform">
                    <i data-lucide="newspaper" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-black text-slate-500 uppercase tracking-widest">Artikel Blog</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-4xl font-display font-black text-white"><?= $totalBlogs ?></h3>
                <span class="text-xs text-slate-500 font-bold">Postingan</span>
            </div>
            <div class="mt-6 pt-6 border-t border-white/5">
                <a href="<?= baseUrl('admin/blogs') ?>" class="text-xs font-bold text-accent-primary hover:text-white transition-colors flex items-center gap-2">
                    Kelola Blog <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </a>
            </div>
        </div>
        <div class="card group overflow-hidden">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-500 group-hover:scale-110 transition-transform">
                    <i data-lucide="mail" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-black text-slate-500 uppercase tracking-widest">Pesan Masuk</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-4xl font-display font-black text-white"><?= $totalContacts ?></h3>
                <span class="text-xs text-slate-500 font-bold">Kontak</span>
            </div>
            <div class="mt-6 pt-6 border-t border-white/5">
                <a href="<?= baseUrl('admin/contacts') ?>" class="text-xs font-bold text-accent-primary hover:text-white transition-colors flex items-center gap-2">
                    Lihat Pesan <i data-lucide="arrow-right" class="w-3 h-3"></i>
                </a>
            </div>
        </div>
        <div class="card group overflow-hidden bg-accent-primary/5 border-accent-primary/20">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-accent-primary flex items-center justify-center text-white shadow-lg shadow-accent-primary/30">
                    <i data-lucide="bell" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-black text-accent-primary uppercase tracking-widest">Belum Dibaca</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-4xl font-display font-black text-white"><?= $unreadCount ?></h3>
                <span class="text-xs text-slate-500 font-bold">Pesan Baru</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <div class="lg:col-span-2 space-y-6">
            <div class="flex items-center justify-between mb-2">
                <h4 class="text-xl font-display font-black text-white">Kontak Terbaru</h4>
                <a href="<?= baseUrl('admin/contacts') ?>" class="text-xs font-bold text-slate-500 hover:text-white underline underline-offset-4">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                <?php if (empty($recentContacts)): ?>
                    <div class="card flex flex-col items-center justify-center py-20 text-center">
                        <i data-lucide="inbox" class="w-16 h-16 text-slate-600 mb-4 mx-auto"></i>
                        <p class="text-slate-500 font-medium">Belum ada pesan yang masuk.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($recentContacts as $contact): ?>
                        <div class="card flex items-center gap-6 group hover:translate-x-1 transition-all">
                            <div class="w-12 h-12 rounded-xl glass flex items-center justify-center shrink-0 <?= $contact->is_read ? '' : 'text-accent-primary bg-accent-primary/10' ?>">
                                <i data-lucide="<?= $contact->is_read ? 'mail-open' : 'mail' ?>" class="w-5 h-5"></i>
                            </div>
                            <div class="flex-grow min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h5 class="font-bold text-white truncate"><?= e($contact->name) ?></h5>
                                    <span class="text-[10px] font-black text-slate-500 uppercase"><?= date('d M, H:i', strtotime($contact->created_at)) ?></span>
                                </div>
                                <p class="text-sm text-slate-500 truncate"><?= e($contact->subject) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="space-y-8">
            <div class="space-y-6">
                <h4 class="text-xl font-display font-black text-white">Aksi Cepat</h4>
                <div class="space-y-3">
                    <a href="<?= baseUrl('admin/projects/create') ?>" class="w-full flex items-center gap-4 p-4 glass rounded-2xl hover:bg-white/10 transition-all border-l-4 border-blue-500">
                        <i data-lucide="plus-circle" class="w-5 h-5 text-blue-500"></i>
                        <span class="font-bold text-sm text-white">Tambah Proyek</span>
                    </a>
                    <a href="<?= baseUrl('admin/blogs/create') ?>" class="w-full flex items-center gap-4 p-4 glass rounded-2xl hover:bg-white/10 transition-all border-l-4 border-purple-500">
                        <i data-lucide="pen-tool" class="w-5 h-5 text-purple-500"></i>
                        <span class="font-bold text-sm text-white">Tulis Artikel</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
