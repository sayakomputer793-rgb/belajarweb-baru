<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-display font-black text-white">Manajemen Blog</h3>
            <p class="text-slate-500 text-sm mt-1">Daftar semua artikel blog Anda.</p>
        </div>
        <a href="<?= baseUrl("admin/blogs/create") ?>" class="btn-primary">
            <i data-lucide="pen-tool" class="w-5 h-5"></i>
            Tulis Artikel Baru
        </a>
    </div>
    <div class="card overflow-hidden !p-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead><tr class="border-b border-white/5 bg-white/5"><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Judul</th><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 text-right">Aksi</th></tr></thead>
                <tbody class="divide-y divide-white/5">
                    <?php foreach ($blogs as $blog): ?>
                        <tr class="group hover:bg-white/[0.02]">
                            <td class="px-8 py-6"><h4 class="font-bold text-white"><?= e($blog->title) ?></h4></td>
                            <td class="px-8 py-6 text-right"><a href="<?= baseUrl("admin/blogs/edit/" . $blog->id) ?>" class="w-10 h-10 glass flex items-center justify-center rounded-xl text-slate-400 hover:text-white ml-auto"><i data-lucide="edit-3" class="w-4 h-4"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
