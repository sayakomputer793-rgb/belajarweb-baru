<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-display font-black text-white">Manajemen Proyek</h3>
            <p class="text-slate-500 text-sm mt-1">Daftar semua proyek portofolio Anda.</p>
        </div>
        <a href="<?= baseUrl("admin/projects/create") ?>" class="btn-primary">
            <i data-lucide="plus" class="w-5 h-5"></i>
            Tambah Proyek Baru
        </a>
    </div>
    <div class="card overflow-hidden !p-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/5 bg-white/5">
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Info Proyek</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <?php if (empty($projects)): ?>
                        <tr><td colspan="3" class="px-8 py-20 text-center text-slate-500">Belum ada proyek.</td></tr>
                    <?php else: ?>
                        <?php foreach ($projects as $project): ?>
                            <tr class="group hover:bg-white/[0.02]">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-10 rounded-lg glass overflow-hidden bg-slate-800 border border-white/10">
                                            <?php if ($project->screenshot): ?><img src="<?= baseUrl("assets/images/" . $project->screenshot) ?>" class="w-full h-full object-cover"><?php endif; ?>
                                        </div>
                                        <div><h4 class="font-bold text-white"><?= e($project->title) ?></h4></div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 bg-green-500/10 text-green-500 text-[10px] font-black uppercase tracking-widest rounded-lg border border-green-500/20"><?= $project->status ?></span>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="<?= baseUrl("admin/projects/edit/" . $project->id) ?>" class="w-10 h-10 glass flex items-center justify-center rounded-xl text-slate-400 hover:text-white"><i data-lucide="edit-3" class="w-4 h-4"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
