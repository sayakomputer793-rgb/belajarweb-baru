<div class="max-w-2xl">
    <div class="mb-10">
        <a href="<?= baseUrl("admin/categories") ?>" class="text-xs font-bold text-slate-500 hover:text-white flex items-center gap-2 mb-4 group w-fit">
            <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Daftar
        </a>
        <h3 class="text-3xl font-display font-black text-white">Edit Kategori</h3>
    </div>
    <div class="card">
        <form action="<?= baseUrl("admin/categories/update/" . $category->id) ?>" method="POST" class="space-y-6">
            <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-500">Nama Kategori</label>
                <input type="text" name="name" value="<?= e($category->name) ?>" required class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white placeholder:text-slate-600" placeholder="Contoh: Web Development">
            </div>
            <button type="submit" class="w-full btn-primary py-4">Perbarui Kategori</button>
        </form>
    </div>
</div>
