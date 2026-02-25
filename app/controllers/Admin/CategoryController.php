<?php

require_once __DIR__ . '/../../models/Category.php';

class CategoryController extends Controller
{
    protected string $layout = 'admin/layouts/main';

    public function index(): void
    {
        $this->requireLogin();
        $categoryModel = new Category();

        $this->view('admin.categories.index', [
            'pageTitle' => 'Manajemen Kategori',
            'categories' => $categoryModel->findAll('id DESC')
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $this->view('admin.categories.create', [
            'pageTitle' => 'Tambah Kategori',
            'csrfToken' => $this->csrfToken()
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/categories');
            return;
        }

        $name = $this->sanitize($_POST['name'] ?? '');

        if (!$name) {
            $this->setFlash('error', 'Nama kategori harus diisi.');
            $this->redirect('/admin/categories/create');
            return;
        }

        $categoryModel = new Category();
        $slug = $this->slugify($name); // Assuming Model has slugify or using a helper

        $categoryModel->create([
            'name' => $name,
            'slug' => $slug
        ]);

        $this->setFlash('success', 'Kategori baru berhasil ditambahkan.');
        $this->redirect('/admin/categories');
    }

    public function edit(int $id): void
    {
        $this->requireLogin();
        $categoryModel = new Category();
        $category = $categoryModel->findById($id);

        if (!$category) {
            $this->setFlash('error', 'Kategori tidak ditemukan.');
            $this->redirect('/admin/categories');
            return;
        }

        $this->view('admin.categories.edit', [
            'pageTitle' => 'Edit Kategori',
            'category' => $category,
            'csrfToken' => $this->csrfToken()
        ]);
    }

    public function update(int $id): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/categories');
            return;
        }

        $name = $this->sanitize($_POST['name'] ?? '');

        if (!$name) {
            $this->setFlash('error', 'Nama kategori harus diisi.');
            $this->redirect("/admin/categories/edit/{$id}");
            return;
        }

        $categoryModel = new Category();
        $slug = $this->slugify($name);

        $categoryModel->update($id, [
            'name' => $name,
            'slug' => $slug
        ]);

        $this->setFlash('success', 'Kategori berhasil diperbarui.');
        $this->redirect('/admin/categories');
    }

    public function delete(int $id): void
    {
        $this->requireLogin();
        $categoryModel = new Category();

        if ($categoryModel->delete($id)) {
            $this->setFlash('success', 'Kategori berhasil dihapus.');
        }
        else {
            $this->setFlash('error', 'Gagal menghapus kategori.');
        }

        $this->redirect('/admin/categories');
    }

    private function slugify(string $text): string
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9-]/', '-', $text);
        $text = preg_replace('/-+/', '-', $text);
        return trim($text, '-');
    }
}
