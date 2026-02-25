<?php

require_once __DIR__ . '/../../models/Project.php';
require_once __DIR__ . '/../../models/Blog.php';
require_once __DIR__ . '/../../models/Contact.php';

class DashboardController extends Controller
{
    protected string $layout = 'admin/layouts/main';

    public function index(): void
    {
        $this->requireLogin();

        $projectModel = new Project();
        $blogModel = new Blog();
        $contactModel = new Contact();

        $this->view('admin.dashboard', [
            'pageTitle' => 'Dashboard',
            'totalProjects' => $projectModel->count(),
            'totalBlogs' => $blogModel->count(),
            'totalContacts' => $contactModel->count(),
            'unreadCount' => $contactModel->getUnreadCount(),
            'recentContacts' => $contactModel->getRecent(5),
        ]);
    }
}
