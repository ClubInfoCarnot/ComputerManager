<?php
// Adding composer autoload
require __DIR__ . '/vendor/autoload.php';
// Preload environment variable
foreach (parse_ini_file('.env') as $key => $value) {
    $_ENV[$key] = $value;
}
Sentry\init(['dsn' => $_ENV['SENTRY_DSN']]);
// Set timezone
date_default_timezone_set($_ENV['TIMEZONE']);
?>

<html>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Computer Manager</title>
</head>
<body>

    <?php include("pages/nav.php") ?>

    <h1>
        <?php
        include 'backend/computer/Computer.php';
        $computer = new Computer();
        $computer->getComputerBySerialNumber("1234");
        echo $computer->entryDate;
        ?>
    </h1>

    <?php
    if (!class_exists("Computer")) {
        include 'backend/computer/Computer.php';
    }
    use chillerlan\QRCode\QRCode;
    $computer = new Computer();
    $computer->getComputerBySerialNumber("1234");
    $qrcode = new QRCode;
    $render = $qrcode->render($computer->uuid);
    echo '<img src='.$render.'>';
    ?>

</body>
</html>