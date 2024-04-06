<?php

include 'backend/state/State.php';
if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
}

class Computer
{
    public $dbData = array();
    public $uuid = "";
    public $brand = "";
    public $model = "";
    public $serialNumber = "";
    public $macAddress = "";
    public ?State $state = null;

    function getComputer($serialNumber, $limit = 1000) {
        $pdo = getCon();
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
            $state = new State();
            $state->getState($row['state']);
            $this->state = $state;
        }
    }
}