<?php

require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../models/Category.php';

class ProjectController extends Controller
{
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
        $projects = $this->project->findPublished();
        $categories = $this->category->findAll('name ASC');

        $this->view('projects.index', [
            'pageTitle' => 'Portfolio — ' . $this->config['name'],
            'projects' => $projects,
            'categories' => $categories,
        ]);
    }

    public function show(string $slug): void
    {
        $project = $this->project->findDetailBySlug($slug);
        if (!$project) {
            http_response_code(404);
            echo 'Project not found';
            return;
        }

        $this->view('projects.show', [
            'pageTitle' => $project->title . ' — ' . $this->config['name'],
            'project' => $project,
        ]);
    }

    // ---------- API Endpoints ----------

    public function apiAll(): void
    {
        $projects = $this->project->findPublished();
        $this->json(['success' => true, 'data' => $projects]);
    }

    public function apiByCategory(string $slug): void
    {
        $projects = $this->project->findByCategory($slug);
        $this->json(['success' => true, 'data' => $projects]);
    }

    public function apiDetail(string $slug): void
    {
        $project = $this->project->findDetailBySlug($slug);
        if (!$project) {
            $this->json(['success' => false, 'message' => 'Not found'], 404);
            return;
        }
        $this->json(['success' => true, 'data' => $project]);
    }
}
