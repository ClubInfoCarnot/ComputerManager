<?php

class Computer
{
    public $dbData = array();
    public $uuid = "";
    public $brand = "";
    public $model = "";
    public $serialNumber = "";
    public $macAddress = "";

    function getComputer($serialNumber, $limit = 1000) {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $name = $_ENV['DB_NAME'];
        $pdo = new PDO("mysql:host=$host:$port;dbname=$name", $user, $pass);
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT * FROM `computer-inventory` WHERE `serial-number`='$serialNumber' LIMIT $limit");
        $this->dbData = $result;
        $this->setComputerData();
    }

    private function setComputerData() {
        foreach ($this->dbData as $row) {
            $this->uuid = $row['uuid'];
            $this->brand = $row['brand'];
            $this->model = $row['model'];
            $this->serialNumber = $row['serial-number'];
            $this->macAddress = $row['mac-address'];
        }
    }
}