<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div><h3 class="text-3xl font-display font-black text-white">Kotak Masuk</h3><p class="text-slate-500 text-sm mt-1">Pesan dari pengunjung.</p></div>
    </div>
    <div class="card overflow-hidden !p-0">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead><tr class="border-b border-white/5 bg-white/5"><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">Pengirim</th><th class="px-8 py-5 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500 w-full">Pesan</th></tr></thead>
                <tbody class="divide-y divide-white/5">
                    <?php if (empty($contacts)): ?><tr><td colspan="2" class="px-8 py-20 text-center text-slate-500">Kosong.</td></tr><?php endif; ?>
                    <?php foreach ($contacts as $contact): ?>
                        <tr class="group hover:bg-white/[0.02] <?= !$contact->is_read ? "bg-accent-primary/5" : "" ?>">
                            <td class="px-8 py-6"><div class="flex flex-col"><span class="font-bold text-white"><?= e($contact->name) ?></span><span class="text-xs text-slate-500"><?= e($contact->email) ?></span></div></td>
                            <td class="px-8 py-6"><p class="text-sm text-slate-400"><?= e($contact->subject) ?></p></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
