<?php
namespace Config;
use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $defaultGroup = 'default';
    public array $default = [
        'DSN'      => '',
        'hostname' => getenv('PGHOST'),
        'username' => getenv('PGUSER'),
        'password' => getenv('PGPASSWORD'),
        'database' => getenv('PGDATABASE'),
        'DBDriver' => 'Postgre',
        'port'     => getenv('PGPORT'),
        'DBDebug'  => true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
    ];
}
