<?php

require_once __DIR__ . '/../core/Model.php';

class Project extends Model
{
    protected string $table = 'projects';

    public function findPublished(string $orderBy = 'featured DESC, created_at DESC'): array
    {
        $stmt = $this->db->query("SELECT p.*, c.name as category_name, c.slug as category_slug
            FROM projects p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.status = 'published'
            ORDER BY {$orderBy}");
        return $stmt->fetchAll();
    }

    public function findByCategory(string $categorySlug): array
    {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug
            FROM projects p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.status = 'published' AND c.slug = ?
            ORDER BY p.featured DESC, p.created_at DESC");
        $stmt->execute([$categorySlug]);
        return $stmt->fetchAll();
    }

    public function findFeatured(int $limit = 6): array
    {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug
            FROM projects p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.status = 'published'
            ORDER BY p.featured DESC, p.created_at DESC
            LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function findDetailBySlug(string $slug): ?object
    {
        $stmt = $this->db->prepare("SELECT p.*, c.name as category_name, c.slug as category_slug
            FROM projects p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.slug = ?");
        $stmt->execute([$slug]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function createProject(array $data): int
    {
        $data['slug'] = $this->slugify($data['title']);

        // Ensure unique slug
        $existing = $this->findBySlug($data['slug']);
        if ($existing) {
            $data['slug'] .= '-' . time();
        }

        return $this->create($data);
    }
}
