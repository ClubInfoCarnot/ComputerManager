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

    <?php include("pages/nav.php") ?>

    <h1>
        <?php
        include 'backend\computer\Computer.php';
        $computer = new Computer();
        $computer->getComputer('1234');
        echo $computer->brand;
        ?>
    <h1>
    
</body>
</html>