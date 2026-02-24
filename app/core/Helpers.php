<?php

/**
 * Get base URL with optional path
 */
function baseUrl(string $path = ''): string
{
    $config = $GLOBALS['config'];
    $url = rtrim($config['url'], '/');
    return $url . '/' . ltrim($path, '/');
}

/**
 * Sanitize output
 */
function e(string $str): string
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
