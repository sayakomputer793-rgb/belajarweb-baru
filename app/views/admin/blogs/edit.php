<div class="max-w-4xl">
    <div class="mb-10">
        <a href="<?= baseUrl("admin/blogs") ?>" class="text-xs font-bold text-slate-500 hover:text-white flex items-center gap-2 mb-4 group w-fit">
            <i data-lucide="arrow-left" class="w-4 h-4 group-hover:-translate-x-1 transition-transform"></i> Kembali ke Daftar
        </a>
        <h3 class="text-3xl font-display font-black text-white">Edit Artikel</h3>
    </div>
    <form action="<?= baseUrl("admin/blogs/update/" . $blog->id) ?>" method="POST" enctype="multipart/form-data" class="space-y-10">
        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-8">
                <div class="card space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Judul Artikel</label>
                        <input type="text" name="title" value="<?= e($blog->title) ?>" required class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white text-xl font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Kutipan (Excerpt)</label>
                        <textarea name="excerpt" rows="3" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white"><?= e($blog->excerpt) ?></textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Konten Artikel</label>
                        <div id="editor-container" class="glass rounded-2xl min-h-[400px] text-white"><?= $blog->content ?></div>
                        <input type="hidden" name="content" id="blog-content">
                    </div>
                </div>
            </div>
            <div class="space-y-8">
                <div class="card space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Thumbnail</label>
                        <div class="relative group cursor-pointer mb-2">
                            <input type="file" name="thumbnail" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                            <div class="w-full aspect-video glass rounded-2xl flex flex-col items-center justify-center border-2 border-dashed border-white/5 group-hover:border-accent-primary/30 transition-all overflow-hidden bg-slate-800">
                                <?php if ($blog->thumbnail): ?>
                                    <img src="<?= baseUrl("assets/images/" . $blog->thumbnail) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <i data-lucide="image-plus" class="w-8 h-8 text-slate-600 mb-2"></i>
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Ganti Gambar</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-500">Status Publikasi</label>
                        <select name="status" class="w-full px-5 py-4 glass rounded-2xl focus:outline-none focus:ring-2 focus:ring-accent-primary/50 text-white bg-dark">
                            <option value="draft" <?= $blog->status === 'draft' ? 'selected' : '' ?>>Draft (Sembunyikan)</option>
                            <option value="published" <?= $blog->status === 'published' ? 'selected' : '' ?>>Published (Tampilkan)</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full btn-primary py-5 text-lg">
                        <i data-lucide="save" class="w-5 h-5"></i> Simpan Perubahan
                    </button>
                    <a href="<?= baseUrl("admin/blogs/delete/" . $blog->id) ?>" onclick="return confirm('Hapus artikel ini selamanya?')" class="w-full py-4 text-center text-xs font-bold text-red-500/50 hover:text-red-500 transition-colors">Hapus Artikel</a>
                </div>
            </div>
        </div>
    </form>
</div>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [[{ 'header': [1, 2, 3, false] }],['bold', 'italic', 'underline'],['blockquote', 'code-block'],[{'list': 'ordered'}, {'list': 'bullet'}],['link', 'image'],['clean']]
        }
    });
    document.querySelector('form').onsubmit = function() {
        document.querySelector('#blog-content').value = quill.root.innerHTML;
    };
</script>
<style>
    .ql-toolbar.ql-snow { border: none !important; border-bottom: 1px solid rgba(255,255,255,0.05) !important; padding: 1rem !important; }
    .ql-container.ql-snow { border: none !important; font-size: 1rem !important; color: #cbd5e1 !important; }
    .ql-editor { min-height: 350px !important; }
    .ql-snow .ql-stroke { stroke: #94a3b8 !important; }
    .ql-snow .ql-fill { fill: #94a3b8 !important; }
    .ql-snow .ql-picker { color: #94a3b8 !important; }
</style>
