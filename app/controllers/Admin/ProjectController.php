<?php

require_once __DIR__ . '/../../models/Project.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Contact.php';

class ProjectController extends Controller
{
    protected string $layout = 'admin/layouts/main';
    private Project $project;
    private Category $category;

    public function __construct()
    {
        parent::__construct();
        $this->project = new Project();
        $this->category = new Category();
    }

    public function index(): void
    {
        $this->requireLogin();
        $projects = $this->project->findAll();
        $unreadCount = (new Contact())->getUnreadCount();

        $this->view('admin.projects.index', [
            'pageTitle' => 'Manage Projects',
            'projects' => $projects,
            'unreadCount' => $unreadCount,
        ]);
    }

    public function create(): void
    {
        $this->requireLogin();
        $categories = $this->category->findAll('name ASC');
        $unreadCount = (new Contact())->getUnreadCount();

        $this->view('admin.projects.create', [
            'pageTitle' => 'Add Project',
            'categories' => $categories,
            'csrfToken' => $this->csrfToken(),
            'unreadCount' => $unreadCount,
        ]);
    }

    public function store(): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/projects');
            return;
        }

        $data = [
            'title' => $this->sanitize($_POST['title'] ?? ''),
            'description' => $_POST['description'] ?? '',
            'short_desc' => $this->sanitize($_POST['short_desc'] ?? ''),
            'category_id' => (int)($_POST['category_id'] ?? 0) ?: null,
            'tech_stack' => $this->sanitize($_POST['tech_stack'] ?? ''),
            'demo_url' => $this->sanitize($_POST['demo_url'] ?? ''),
            'github_url' => $this->sanitize($_POST['github_url'] ?? ''),
            'featured' => isset($_POST['featured']) ? 1 : 0,
            'status' => $_POST['status'] ?? 'published',
        ];

        // Handle image upload
        if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
            $path = $this->uploadFile($_FILES['screenshot'], 'projects');
            if ($path) {
                $data['screenshot'] = $path;
            }
        }

        $this->project->createProject($data);
        $_SESSION['flash_success'] = 'Project berhasil ditambahkan!';
        $this->redirect('/admin/projects');
    }

    public function edit(string $id): void
    {
        $this->requireLogin();
        $project = $this->project->findById((int)$id);
        if (!$project) {
            $this->redirect('/admin/projects');
            return;
        }

        $categories = $this->category->findAll('name ASC');
        $unreadCount = (new Contact())->getUnreadCount();

        $this->view('admin.projects.edit', [
            'pageTitle' => 'Edit Project',
            'project' => $project,
            'categories' => $categories,
            'csrfToken' => $this->csrfToken(),
            'unreadCount' => $unreadCount,
        ]);
    }

    public function update(string $id): void
    {
        $this->requireLogin();
        if (!$this->validateCsrf()) {
            $this->redirect('/admin/projects');
            return;
        }

        $data = [
            'title' => $this->sanitize($_POST['title'] ?? ''),
            'description' => $_POST['description'] ?? '',
            'short_desc' => $this->sanitize($_POST['short_desc'] ?? ''),
            'category_id' => (int)($_POST['category_id'] ?? 0) ?: null,
            'tech_stack' => $this->sanitize($_POST['tech_stack'] ?? ''),
            'demo_url' => $this->sanitize($_POST['demo_url'] ?? ''),
            'github_url' => $this->sanitize($_POST['github_url'] ?? ''),
            'featured' => isset($_POST['featured']) ? 1 : 0,
            'status' => $_POST['status'] ?? 'published',
        ];

        if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === UPLOAD_ERR_OK) {
            $path = $this->uploadFile($_FILES['screenshot'], 'projects');
            if ($path) {
                $data['screenshot'] = $path;
            }
        }

        $this->project->update((int)$id, $data);
        $_SESSION['flash_success'] = 'Project berhasil diupdate!';
        $this->redirect('/admin/projects');
    }

    public function delete(string $id): void
    {
        $this->requireLogin();
        $this->project->delete((int)$id);
        $_SESSION['flash_success'] = 'Project berhasil dihapus!';
        $this->redirect('/admin/projects');
    }
}
