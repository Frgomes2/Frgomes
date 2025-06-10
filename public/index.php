<?php

use CodeIgniter\CodeIgniter;
use Config\Paths;

// Load our paths config file
require __DIR__ . '/../app/Config/Paths.php';

// Create the paths instance
$paths = new Paths();

// Load the framework bootstrap file
require rtrim($paths->systemDirectory, '\\/ ') . '/bootstrap.php';

/*
 * ------------------------------------------------------
 * Launch the application
 * ------------------------------------------------------
 * Now that everything is setup, it's time to actually fire
 * up the engines and make this app do its thang.
 */
$app = new CodeIgniter(new \Config\App());
$app->initialize();
$app->run();

