<?php

require_once __DIR__ . '/../../models/Blog.php';
require_once __DIR__ . '/../../models/Contact.php';

class BlogController extends Controller
{
    private Blog $blog;

    public function __construct()
    {
        parent::__construct();
        $this->blog = new Blog();
    }

    public function index(): void
    {
        $this->requireLogin();
        $blogs = $this->blog->findAll();
        $unreadCount = (new Contact())->getUnreadCount();

        $this->view('admin.blogs.index', [
            'pageTitle' => 'Manage Blog',
            'blogs' => $blogs,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $unreadCount = (new Contact())->getUnreadCount();

        $this->view('admin.blogs.create', [
            'pageTitle' => 'Create Post',
            'csrfToken' => $this->csrfToken(),
            'unreadCount' => $unreadCount,
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/blogs');
            return;
        }

        $data = [
            'user_id' => $_SESSION['user_id'],
            'title' => $this->sanitize($_POST['title'] ?? ''),
            'content' => $_POST['content'] ?? '',
            'excerpt' => $this->sanitize($_POST['excerpt'] ?? ''),
            'status' => $_POST['status'] ?? 'published',
        ];

        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $path = $this->uploadFile($_FILES['thumbnail'], 'blogs');
            if ($path) {
                $data['thumbnail'] = $path;
            }
        }

        $this->blog->createPost($data);
        $_SESSION['flash_success'] = 'Blog post berhasil ditambahkan!';
        $this->redirect('/admin/blogs');
    }

    public function edit(string $id): void
    {
        $this->requireLogin();
        $blog = $this->blog->findById((int)$id);
        if (!$blog) {
            $this->redirect('/admin/blogs');
            return;
        }

        $unreadCount = (new Contact())->getUnreadCount();

        $this->view('admin.blogs.edit', [
            'pageTitle' => 'Edit Post',
            'blog' => $blog,
            'csrfToken' => $this->csrfToken(),
            'unreadCount' => $unreadCount,
        ]);
    }

    public function update(string $id): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/blogs');
            return;
        }

        $data = [
            'title' => $this->sanitize($_POST['title'] ?? ''),
            'content' => $_POST['content'] ?? '',
            'excerpt' => $this->sanitize($_POST['excerpt'] ?? ''),
            'status' => $_POST['status'] ?? 'published',
        ];

        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $path = $this->uploadFile($_FILES['thumbnail'], 'blogs');
            if ($path) {
                $data['thumbnail'] = $path;
            }
        }

        $this->blog->update((int)$id, $data);
        $_SESSION['flash_success'] = 'Blog post berhasil diupdate!';
        $this->redirect('/admin/blogs');
    }

    public function delete(string $id): void
    {
        $this->requireLogin();
        $this->blog->delete((int)$id);
        $_SESSION['flash_success'] = 'Blog post berhasil dihapus!';
        $this->redirect('/admin/blogs');
    }
}
