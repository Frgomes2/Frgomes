<?php
namespace Config;
use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $defaultGroup = 'default';
	public array $default = [
		'DSN'      => '',
		'hostname' => 'postgres.railway.internal',
		'username' => 'postgres',
		'password' => 'OkgbNBwrOZODgfuVChRErrUkztWQRXAC', // <--- senha real
		'database' => 'railway',
		'DBDriver' => 'Postgre',
		'port'     => 5432,
		'DBDebug'  => true,
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
	];
}
