<?php

require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../models/Blog.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Setting.php';

class HomeController extends Controller
{
    public function index(): void
    {
        $settingModel = new Setting();
        $projectModel = new Project();
        $blogModel = new Blog();
        $categoryModel = new Category();

        $settings = $settingModel->getAll();
        $projects = $projectModel->findFeatured(6);
        $blogs = $blogModel->getRecent(3);
        $categories = $categoryModel->findAll('name ASC');

        // Parse skills from settings
        $skills = [];
        if (!empty($settings['skills'])) {
            foreach (explode(',', $settings['skills']) as $skill) {
                $parts = explode(':', $skill);
                if (count($parts) === 2) {
                    $skills[] = ['name' => trim($parts[0]), 'percent' => (int)$parts[1]];
                }
            }
        }

        $this->view('home.index', [
            'pageTitle' => ($settings['site_name'] ?? 'DevPortfolio') . ' — ' . ($settings['hero_title'] ?? 'Portfolio'),
            'settings' => $settings,
            'projects' => $projects,
            'blogs' => $blogs,
            'categories' => $categories,
            'skills' => $skills,
            'csrfToken' => $this->csrfToken(),
        ]);
    }
}
