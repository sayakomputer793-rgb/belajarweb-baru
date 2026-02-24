<?php

return [
    'name' => 'DevPortfolio',
    'url'  => 'http://localhost/belajarweb.baru/public',
    'base_path' => '/belajarweb.baru/public',

    // Database
    'db_host' => 'localhost',
    'db_name' => 'portfolio_db',
    'db_user' => 'root',
    'db_pass' => '',

    // SMTP (configure for production)
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_user' => '',
    'smtp_pass' => '',
    'smtp_from' => 'noreply@example.com',
    'smtp_from_name' => 'DevPortfolio',

    // Upload
    'upload_max_size' => 2 * 1024 * 1024, // 2MB
    'upload_allowed_types' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
];
