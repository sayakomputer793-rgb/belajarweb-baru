<div class="max-w-4xl">
    <div class="mb-10">
        <a href="<?= baseUrl("admin/projects") ?>" class="text-xs font-bold text-slate-500 hover:text-white flex items-center gap-2 mb-4 group w-fit">
            <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Daftar
        </a>
        <h3 class="text-3xl font-display font-black text-white">Edit Proyek</h3>
    </div>
    <form action="<?= baseUrl("admin/projects/update/" . $project->id) ?>" method="POST" enctype="multipart/form-data" class="space-y-10">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-8">
                <div class="card space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Judul Proyek</label>
                        <input type="text" name="title" value="<?= e($project->title) ?>" required class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white font-bold">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Kategori</label>
                            <select name="category_id" required class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white bg-dark">
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat->id ?>" <?= $cat->id == $project->category_id ? 'selected' : '' ?>><?= e($cat->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Tech Stack</label>
                            <input type="text" name="tech_stack" value="<?= e($project->tech_stack) ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Deskripsi</label>
                        <textarea name="description" rows="8" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white"><?= e($project->description) ?></textarea>
                    </div>
                </div>
            </div>
            <div class="space-y-8">
                <div class="card space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Screenshot</label>
                        <div class="relative group cursor-pointer mb-2">
                            <input type="file" name="screenshot" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                            <div class="w-full aspect-video glass rounded-2xl flex flex-col items-center justify-center border-2 border-dashed border-white/5 group-hover:border-accent-primary/30 transition-all overflow-hidden bg-slate-800">
                                <?php if ($project->screenshot): ?>
                                    <img src="<?= baseUrl("assets/images/" . $project->screenshot) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i data-lucide="upload-cloud" class="w-8 h-8 text-slate-600 mb-2"></i>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Ganti Screenshot</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Demo URL</label>
                        <input type="url" name="demo_url" value="<?= e($project->demo_url) ?>" class="w-full px-4 py-3 glass rounded-xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white text-xs">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">GitHub URL</label>
                        <input type="url" name="github_url" value="<?= e($project->github_url) ?>" class="w-full px-4 py-3 glass rounded-xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white text-xs">
                    </div>
                    <div class="flex items-center justify-between p-4 glass rounded-2xl">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">Proyek Utama?</span>
                        <input type="checkbox" name="featured" value="1" <?= $project->featured ? 'checked' : '' ?> class="w-5 h-5 accent-accent-primary">
                    </div>
                    <button type="submit" class="w-full btn-primary py-5">Perbarui Proyek</button>
                </div>
            </div>
        </div>
    </form>
</div>
