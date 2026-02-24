<?php

require_once __DIR__ . '/../core/Model.php';

class User extends Model
{
    protected string $table = 'users';

    public function findByUsername(string $username): ?object
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
