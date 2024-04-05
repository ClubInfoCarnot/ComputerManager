<?php
function createMigration() {
    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];
    $name = $_ENV['DB_NAME'];
    $pdo = new PDO("mysql:host=$host:$port;dbname=$name", $user, $pass);
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    $result = $pdo->query("SELECT `mac-address` FROM `computer-inventory` WHERE `serial-number`='1234' LIMIT 1000");
    foreach ($result as $row) {
        echo $row['mac-address'] . "<br>";
    }
}