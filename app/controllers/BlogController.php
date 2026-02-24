<?php

require_once __DIR__ . '/../models/Blog.php';

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
        $page = (int)($_GET['page'] ?? 1);
        if ($page < 1)
            $page = 1;

        $result = $this->blog->findPublished($page, 6);

        $this->view('blog.index', [
            'pageTitle' => 'Blog — ' . $this->config['name'],
            'blogs' => $result['items'],
            'pagination' => $result,
        ]);
    }

    public function show(string $slug): void
    {
        $blog = $this->blog->findDetailBySlug($slug);
        if (!$blog) {
            http_response_code(404);
            echo 'Blog post not found';
            return;
        }

        $recentPosts = $this->blog->getRecent(3);

        $this->view('blog.show', [
            'pageTitle' => $blog->title . ' — ' . $this->config['name'],
            'blog' => $blog,
            'recentPosts' => $recentPosts,
        ]);
    }
}
