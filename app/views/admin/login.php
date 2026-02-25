<div class="min-h-screen flex items-center justify-center py-20 px-6 sm:px-10">
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute w-[800px] h-[800px] bg-accent-primary/10 blur-[150px] rounded-full -top-1/4 -left-1/4 animate-pulse-slow"></div>
        <div class="absolute w-[600px] h-[600px] bg-accent-secondary/10 blur-[150px] rounded-full -bottom-1/4 -right-1/4 animate-pulse-slow delay-1000"></div>
    </div>
    <div class="max-w-md w-full glass-premium rounded-[32px] p-10 reveal relative z-10">
        <div class="flex flex-col items-center mb-10">
            <div class="w-16 h-16 bg-gradient-to-br from-accent-primary to-accent-secondary rounded-2xl flex items-center justify-center transform rotate-6 mb-6 shadow-xl shadow-accent-primary/20">
                <i data-lucide="shield-check" class="text-white w-8 h-8"></i>
            </div>
            <h1 class="text-4xl font-black mb-3 text-center tracking-tight text-white">Sistem <span class="gradient-text">Admin</span></h1>
            <p class="text-slate-400 text-sm text-center leading-relaxed">Keamanan adalah prioritas. Silakan identifikasi diri Anda untuk melanjutkan.</p>
        </div>
        <?php if (isset($error)): ?>
            <div class="mb-8 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-2xl text-sm flex items-center gap-3 animate-shake">
                <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                <p><?= e($error) ?></p>
            </div>
        <?php endif; ?>
        <form action="<?= baseUrl('admin/login') ?>" method="POST" class="space-y-6">
            <?= $this->csrfField() ?>
            <div class="group">
                <label for="username" class="block text-xs font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1 group-focus-within:text-accent-primary transition-colors">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-accent-primary transition-colors">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <input type="text" name="username" id="username" required
                        class="w-full pl-13 pr-5 py-4.5 glass bg-white/5 border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/40 focus:border-accent-primary/50 transition-all text-white placeholder:text-slate-600 text-sm font-medium"
                        placeholder="Masukkan username admin">
                </div>
            </div>
            <div class="group">
                <label for="password" class="block text-xs font-black uppercase tracking-[0.2em] text-slate-500 mb-3 ml-1 group-focus-within:text-accent-primary transition-colors">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-500 group-focus-within:text-accent-primary transition-colors">
                        <i data-lucide="lock" class="w-5 h-5"></i>
                    </div>
                    <input type="password" name="password" id="password" required
                        class="w-full pl-13 pr-5 py-4.5 glass bg-white/5 border-white/10 rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/40 focus:border-accent-primary/50 transition-all text-white placeholder:text-slate-600 text-sm font-medium"
                        placeholder="••••••••">
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="w-full btn-primary group/btn py-5 rounded-2xl">
                    <span class="relative z-10 flex items-center justify-center gap-3">
                        Otentikasi Sekarang
                        <i data-lucide="arrow-right" class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform"></i>
                    </span>
                </button>
            </div>
        </form>
        <div class="mt-12 pt-8 border-t border-white/5 flex flex-col items-center gap-4">
            <a href="<?= baseUrl() ?>" class="text-xs font-bold text-slate-500 hover:text-white transition-all flex items-center gap-2 group/back">
                <i data-lucide="chevron-left" class="w-4 h-4 group-hover/back:-translate-x-1 transition-transform"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
<style>
    #main-nav, footer, #cursor, #cursor-dot { display: none !important; }
    body { background: #020617 !important; }
    .pl-13 { padding-left: 3.25rem; }
    .py-4\.5 { padding-top: 1.125rem; padding-bottom: 1.125rem; }
</style>
