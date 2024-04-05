<?php
// Preload environment variable
foreach (parse_ini_file('.env') as $key => $value) {
    $_ENV[$key] = $value;
}
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

    <h1>
        <?php
        include 'backend\database\Migration.php';
        echo createMigration();
        ?>
    <h1>
    
</body>
</html>