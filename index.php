<?php
// Preload environment variable
foreach (parse_ini_file('.env') as $key => $value) {
    $_ENV[$key] = $value;
}
?>

<html>
<h1>
    <?php
    include 'backend\database\Migration.php';
    echo createMigration();
    ?>
<h1>
</html>