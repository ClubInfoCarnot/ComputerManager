<?php
// Adding composer autoload
require __DIR__ . '/../vendor/autoload.php';
// Preload environment variable
foreach (parse_ini_file('../.env') as $key => $value) {
    $_ENV[$key] = $value;
}
Sentry\init(['dsn' => $_ENV['SENTRY_DSN']]);
// Set timezone
date_default_timezone_set($_ENV['TIMEZONE']);

include("pages/nav.php");

$request = $_SERVER["REQUEST_URI"];

if (strpos($request, "/computer") === 0) {
    include 'pages/ComputerInfo.php';
    echo exec('pages/ComputerInfo.php');
} else if (strpos($request, "/css") === 0) {
    include 'css/style.css';
} else {
    echo '404 Not Found';
}