<?php

require_once __DIR__ . '/../core/Model.php';

class Setting extends Model
{
    protected string $table = 'settings';

    public function get(string $key, string $default = ''): string
    {
        $stmt = $this->db->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
        $stmt->execute([$key]);
        $result = $stmt->fetchColumn();
        return $result !== false ? $result : $default;
    }

    public function set(string $key, string $value): void
    {
        $stmt = $this->db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)
            ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");
        $stmt->execute([$key, $value]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT setting_key, setting_value FROM settings");
        $results = $stmt->fetchAll();
        $settings = [];
        foreach ($results as $row) {
            $settings[$row->setting_key] = $row->setting_value;
        }
        return $settings;
    }
}
