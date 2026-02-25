<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Admin — DevPortfolio" ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { dark: "#020617", "dark-surface": "#0f172a", "accent-primary": "#6366f1", "accent-secondary": "#8b5cf6" },
                    fontFamily: { sans: ["Inter", "sans-serif"], display: ["Outfit", "sans-serif"] }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body { @apply bg-dark text-slate-300 font-sans antialiased; }
        }
        .glass { @apply bg-white/5 backdrop-blur-xl border border-white/10; }
        .sidebar-link { @apply flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-slate-400 hover:text-white hover:bg-white/5; }
        .sidebar-link.active { @apply bg-accent-primary text-white shadow-lg shadow-accent-primary/20; }
        .card { @apply glass p-6 rounded-3xl transition-all duration-300; }
        .btn-primary { @apply px-6 py-3 bg-accent-primary text-white font-bold rounded-xl transition-all shadow-lg hover:scale-[1.02] flex items-center justify-center gap-2; }
    </style>
</head>
<body class="flex min-h-screen overflow-hidden">
    <aside class="w-72 glass border-r border-white/5 flex flex-col z-20 shrink-0">
        <div class="p-8 border-b border-white/5">
            <a href="<?= baseUrl("admin/dashboard") ?>" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-gradient-to-br from-accent-primary to-accent-secondary rounded-xl flex items-center justify-center transform group-hover:rotate-6 transition-all shadow-lg shadow-accent-primary/20">
                    <i data-lucide="shield" class="text-white w-5 h-5"></i>
                </div>
                <span class="text-xl font-display font-black text-white leading-none">ADMIN<span class="text-accent-primary">.</span></span>
            </a>
        </div>
        <nav class="flex-grow p-6 space-y-2 overflow-y-auto">
            <a href="<?= baseUrl("admin/dashboard") ?>" class="sidebar-link"><i data-lucide="layout-dashboard"></i><span class="font-semibold text-sm">Dashboard</span></a>
            <a href="<?= baseUrl("admin/projects") ?>" class="sidebar-link"><i data-lucide="folder-kanban"></i><span class="font-semibold text-sm">Proyek</span></a>
            <a href="<?= baseUrl("admin/blogs") ?>" class="sidebar-link"><i data-lucide="newspaper"></i><span class="font-semibold text-sm">Blog</span></a>
            <a href="<?= baseUrl("admin/contacts") ?>" class="sidebar-link"><i data-lucide="mail"></i><span class="font-semibold text-sm">Kontak</span></a>
        </nav>
        <div class="p-6 border-t border-white/5">
            <a href="<?= baseUrl("admin/logout") ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-500/70 hover:text-red-500 hover:bg-red-500/10">
                <i data-lucide="log-out"></i><span class="font-semibold text-sm">Keluar</span>
            </a>
        </div>
    </aside>
    <div class="flex-grow flex flex-col h-screen overflow-hidden relative">
        <header class="h-24 border-b border-white/5 flex items-center justify-between px-10 shrink-0 relative z-10 bg-dark/50 backdrop-blur-md">
            <div><h2 class="text-2xl font-display font-black text-white"><?= $pageTitle ?? "Dashboard" ?></h2></div>
            <div class="w-12 h-12 rounded-2xl glass flex items-center justify-center p-1"><i data-lucide="user" class="text-slate-400"></i></div>
        </header>
        <main class="flex-grow overflow-y-auto p-10 relative z-10">
            <div class="max-w-7xl mx-auto"><?= $content ?></div>
        </main>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>
