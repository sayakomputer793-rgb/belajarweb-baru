<?php

require_once __DIR__ . '/../core/Model.php';

class Blog extends Model
{
    protected string $table = 'blogs';

    public function findPublished(int $page = 1, int $perPage = 6): array
    {
        $offset = ($page - 1) * $perPage;

        $countStmt = $this->db->query("SELECT COUNT(*) FROM blogs WHERE status = 'published'");
        $total = (int)$countStmt->fetchColumn();
        $totalPages = (int)ceil($total / $perPage);

        $stmt = $this->db->prepare("SELECT b.*, u.full_name as author_name
            FROM blogs b
            LEFT JOIN users u ON b.user_id = u.id
            WHERE b.status = 'published'
            ORDER BY b.created_at DESC
            LIMIT ? OFFSET ?");
        $stmt->execute([$perPage, $offset]);
        $items = $stmt->fetchAll();

        return [
            'items' => $items,
            'total' => $total,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'hasPrev' => $page > 1,
            'hasNext' => $page < $totalPages,
        ];
    }

    public function findDetailBySlug(string $slug): ?object
    {
        $stmt = $this->db->prepare("SELECT b.*, u.full_name as author_name
            FROM blogs b
            LEFT JOIN users u ON b.user_id = u.id
            WHERE b.slug = ?");
        $stmt->execute([$slug]);
        $result = $stmt->fetch();

        if ($result) {
            // Increment views
            $this->db->prepare("UPDATE blogs SET views = views + 1 WHERE id = ?")->execute([$result->id]);
        }

        return $result ?: null;
    }

    public function getRecent(int $limit = 3): array
    {
        $stmt = $this->db->prepare("SELECT b.*, u.full_name as author_name
            FROM blogs b
            LEFT JOIN users u ON b.user_id = u.id
            WHERE b.status = 'published'
            ORDER BY b.created_at DESC
            LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function createPost(array $data): int
    {
        $data['slug'] = $this->slugify($data['title']);
        $existing = $this->findBySlug($data['slug']);
        if ($existing) {
            $data['slug'] .= '-' . time();
        }
        return $this->create($data);
    }
}
