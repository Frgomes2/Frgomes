<?php

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load our paths config file
require FCPATH . '../app/Config/Paths.php';

// Create the paths instance
$paths = new Config\Paths();

// Load the framework bootstrap file
require rtrim($paths->systemDirectory, '\\/ ') . '/bootstrap.php';

$app = Config\Services::codeigniter();
$app->run();
