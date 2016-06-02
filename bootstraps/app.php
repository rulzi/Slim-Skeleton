<?php

require_once __DIR__.'/../vendor/autoload.php'; 

session_start();

$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// Instantiate the app
$settings = require __DIR__ . '/../app/settings.php';
$app = new \Slim\App($settings);

require __DIR__ . '/../app/dependencies.php';
require __DIR__ . '/../app/database.php';
require __DIR__ . '/../app/middleware.php';
require __DIR__ . '/../app/routes.php';
