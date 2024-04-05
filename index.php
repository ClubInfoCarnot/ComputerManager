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
    <link rel="stylesheet" href="css/style.css">
    <title>Computer Manager</title>
</head>
<body>

    <?php include("pages/nav.php") ?>

    <h1>
        <?php
        include 'backend\database\Migration.php';
        echo createMigration();
        ?>
    <h1>
    
</body>
</html>