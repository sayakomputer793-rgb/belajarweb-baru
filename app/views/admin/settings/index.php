<div class="space-y-10">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-3xl font-display font-black text-white">Pengaturan Situs</h3>
            <p class="text-slate-500 text-sm mt-1">Kelola identitas dan konfigurasi situs portofolio Anda.</p>
        </div>
    </div>
    <form action="<?= baseUrl("admin/settings/update") ?>" method="POST" class="space-y-10">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-500/20 text-blue-500 flex items-center justify-center"><i data-lucide="info" class="w-4 h-4"></i></div>
                    <h4 class="font-display font-black text-white uppercase tracking-wider text-sm">Informasi Dasar</h4>
                </div>
                <div class="card space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Nama Situs</label>
                        <input type="text" name="settings[site_name]" value="<?= e($settings['site_name'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Tagline Situs</label>
                        <input type="text" name="settings[site_tagline]" value="<?= e($settings['site_tagline'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Email Kontak</label>
                        <input type="email" name="settings[email]" value="<?= e($settings['email'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-500 flex items-center justify-center"><i data-lucide="share-2" class="w-4 h-4"></i></div>
                    <h4 class="font-display font-black text-white uppercase tracking-wider text-sm">Media Sosial</h4>
                </div>
                <div class="card space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">GitHub URL</label>
                        <input type="url" name="settings[github_url]" value="<?= e($settings['github_url'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">LinkedIn URL</label>
                        <input type="url" name="settings[linkedin_url]" value="<?= e($settings['linkedin_url'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Twitter URL</label>
                        <input type="url" name="settings[twitter_url]" value="<?= e($settings['twitter_url'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white">
                    </div>
                </div>
            </div>
        </div>
        <div class="space-y-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-lg bg-accent-primary/20 text-accent-primary flex items-center justify-center"><i data-lucide="user" class="w-4 h-4"></i></div>
                <h4 class="font-display font-black text-white uppercase tracking-wider text-sm">Bagian Tentang (About)</h4>
            </div>
            <div class="card space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Text Tentang Saya</label>
                    <textarea name="settings[about_text]" rows="5" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white"><?= e($settings['about_text'] ?? '') ?></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Tahun Pengalaman</label>
                        <input type="text" name="settings[about_experience]" value="<?= e($settings['about_experience'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white text-center">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Proyek Selesai</label>
                        <input type="text" name="settings[about_projects_completed]" value="<?= e($settings['about_projects_completed'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white text-center">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Total Klien</label>
                        <input type="text" name="settings[about_clients]" value="<?= e($settings['about_clients'] ?? '') ?>" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white text-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end pt-6">
            <button type="submit" class="btn-primary px-10 py-5 text-lg">Simpan Perubahan</button>
        </div>
    </form>
</div>
