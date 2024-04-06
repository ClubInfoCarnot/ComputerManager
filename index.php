<?php
// Adding composer autoload
require __DIR__ . '/vendor/autoload.php';
// Preload environment variable
foreach (parse_ini_file('.env') as $key => $value) {
    $_ENV[$key] = $value;
}
Sentry\init(['dsn' => $_ENV['SENTRY_DSN']]);
?>

<html>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Manager</title>
</head>
<body>

    <?php include("pages/nav.php") ?>

    <h1>
        <?php
        include("backend/stats/Stats.php");
        echo "Number of computers: " . getNumberOfComputer();
        ?>
    <h1>
    
</body>
</html>