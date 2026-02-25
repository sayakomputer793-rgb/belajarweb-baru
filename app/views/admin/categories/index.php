<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-display font-black text-white">Manajemen Kategori</h3>
            <p class="text-slate-500 text-sm mt-1">Kelola kategori untuk proyek portofolio Anda.</p>
        </div>
        <a href="<?= baseUrl("admin/categories/create") ?>" class="btn-primary">
            <i data-lucide="plus" class="w-5 h-5"></i>
            Tambah Kategori
        </a>
    </div>
    <div class="card overflow-hidden !p-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead><tr class="border-b border-white/5 bg-white/5"><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Nama Kategori</th><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Slug</th><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 text-right">Aksi</th></tr></thead>
                <tbody class="divide-y divide-white/5">
                    <?php foreach ($categories as $category): ?>
                        <tr class="group hover:bg-white/[0.02]">
                            <td class="px-8 py-6"><span class="font-bold text-white"><?= e($category->name) ?></span></td>
                            <td class="px-8 py-6"><code class="text-xs bg-white/5 px-2 py-1 rounded text-accent-primary">/<?= e($category->slug) ?></code></td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?= baseUrl("admin/categories/edit/" . $category->id) ?>" class="w-10 h-10 glass flex items-center justify-center rounded-xl text-slate-400 hover:text-white"><i data-lucide="edit-3" class="w-4 h-4"></i></a>
                                    <form action="<?= baseUrl("admin/categories/delete/" . $category->id) ?>" method="POST" onsubmit="return confirm('Hapus kategori ini?')" class="inline">
                                        <button type="submit" class="w-10 h-10 glass flex items-center justify-center rounded-xl text-slate-400 hover:text-red-500"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
