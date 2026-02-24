/**
 * Admin Panel JavaScript
 */
document.addEventListener('DOMContentLoaded', () => {
    initImagePreview();
    initDeleteConfirm();
    initSidebarToggle();
});

/* ---------- Image Preview on Upload ---------- */
function initImagePreview() {
    const fileInputs = document.querySelectorAll('input[type="file"][data-preview]');

    fileInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            const previewId = input.dataset.preview;
            const preview = document.getElementById(previewId);
            if (!preview) return;

            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (ev) => {
                    preview.src = ev.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    });
}

/* ---------- Delete Confirmation ---------- */
function initDeleteConfirm() {
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', (e) => {
            if (!confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                e.preventDefault();
            }
        });
    });
}

/* ---------- Sidebar Toggle (Mobile) ---------- */
function initSidebarToggle() {
    const toggle = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('.admin-sidebar');

    if (toggle && sidebar) {
        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });

        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            if (sidebar.classList.contains('show') &&
                !sidebar.contains(e.target) &&
                !toggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });
    }
}
