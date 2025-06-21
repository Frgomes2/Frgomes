<?php
date_default_timezone_set('America/Fortaleza');

$env = getenv('ENV') ?: getenv('APP_ENV') ?: 'development';
define("ENV", $env);

// Config para produção Railway
if (ENV === 'production') {
    function railway_parse_database_url() {
        $url = getenv("DATABASE_URL");
        if (!$url) return null;
        $parts = parse_url($url);
        return [
            'host' => $parts['host'],
            'dbname' => ltrim($parts['path'], '/'),
            'user' => $parts['user'],
            'pass' => $parts['pass'],
            'port' => $parts['port'] ?? 5432,
        ];
    }

    $db = railway_parse_database_url();

    define("DB_HOST", $db['host'] ?? 'localhost');
    define("DB_BASE", $db['dbname'] ?? 'fallback');
    define("DB_USER", $db['user'] ?? 'fallback');
    define("DB_PASS", $db['pass'] ?? 'fallback');

    define("BASE_URL", "https://frgomes.com.br");

} else {
    // Config local
    define("DB_HOST", "localhost");
    define("DB_BASE", "rpg");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("BASE_URL", "http://" . $_SERVER['HTTP_HOST'] . "/frgomes/");
}

// Comuns
define("DS", DIRECTORY_SEPARATOR);
define("URL_SITE", "http://" . $_SERVER['HTTP_HOST']);
define("PATH_THEME", "assets/theme/");
