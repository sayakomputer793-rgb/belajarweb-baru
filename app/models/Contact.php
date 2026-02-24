<?php

require_once __DIR__ . '/../core/Model.php';

class Contact extends Model
{
    protected string $table = 'contacts';

    public function getUnreadCount(): int
    {
        return $this->count('is_read = 0');
    }

    public function getRecent(int $limit = 5): array
    {
        $stmt = $this->db->prepare("SELECT * FROM contacts ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$limit]);
        return $stmt->fetchAll();
    }

    public function markAsRead(int $id): bool
    {
        return $this->update($id, ['is_read' => 1]);
    }
}
