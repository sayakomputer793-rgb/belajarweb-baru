<?php

require_once __DIR__ . '/../../config/database.php';

class Model
{
    protected PDO $db;
    protected string $table = '';

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function findAll(string $orderBy = 'id DESC', ?int $limit = null): array
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$orderBy}";
        if ($limit) {
            $sql .= " LIMIT {$limit}";
        }
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?object
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function findBySlug(string $slug): ?object
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE slug = ?");
        $stmt->execute([$slug]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function create(array $data): int
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})");
        $stmt->execute(array_values($data));

        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $set = implode(', ', array_map(fn($col) => "{$col} = ?", array_keys($data)));

        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$set} WHERE id = ?");
        return $stmt->execute([...array_values($data), $id]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function count(string $where = '1=1'): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM {$this->table} WHERE {$where}");
        return (int)$stmt->fetchColumn();
    }

    public function paginate(int $page = 1, int $perPage = 6, string $where = '1=1', string $orderBy = 'id DESC'): array
    {
        $offset = ($page - 1) * $perPage;
        $total = $this->count($where);
        $totalPages = (int)ceil($total / $perPage);

        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$where} ORDER BY {$orderBy} LIMIT ? OFFSET ?");
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

    protected function slugify(string $text): string
    {
        $text = strtolower(trim($text));
        $text = preg_replace('/[^a-z0-9-]/', '-', $text);
        $text = preg_replace('/-+/', '-', $text);
        return trim($text, '-');
    }
}
