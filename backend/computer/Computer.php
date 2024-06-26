<?php

if (!class_exists("State")) {
    include '../backend/state/State.php';
}
if (!function_exists('getCon')) {
    include '../backend/database/Connection.php';
}
if (!class_exists("ComputerType")) {
    include '../backend/computer/ComputerType.php';
}
if (!class_exists("Recipient")) {
    include '../backend/recipient/Recipient.php';
}

class Computer
{
    private $dbData = array();
    public $id = 0;
    public $brand = "";
    public $model = "";
    public $serialNumber = "";
    public $macAddress = "";

    public ?State $state = null;

    public ?ComputerType $type = null;
    public $entryDate = "";
    public $exitDate = "";
    public ?Recipient $recipient = null;


    function getComputerBySerialNumber($serialNumber, $limit = 1000) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT * FROM `computer-inventory` WHERE `serial-number`='$serialNumber' LIMIT $limit");
        $this->dbData = $result;
        $this->setComputerData();
    }

    function getComputerByID($id, $limit = 1000) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT * FROM `computer-inventory` WHERE `id`=$id LIMIT $limit");
        $this->dbData = $result;
        $this->setComputerData();
    }

    private function setComputerData() {
        foreach ($this->dbData as $row) {
            $this->id = $row['id'];
            $this->brand = $row['brand'];
            $this->model = $row['model'];
            $this->serialNumber = $row['serial-number'];
            $this->macAddress = $row['mac-address'];
            $state = new State();
            $state->getState($row['state']);
            $this->state = $state;
            $type = new ComputerType();
            $type->getComputerType($row['type']);
            $this->type = $type;
            $this->entryDate = date("d-m-Y", intval($row['entry-date']));
            $this->exitDate = date("d-m-Y", intval($row['leave-date']));
            $recipient = new Recipient();
            $recipient->getRecipientByID($row['recipient']);
            $this->recipient = $recipient;
        }
    }

    function setState(State $state) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("UPDATE `computer-inventory` SET `state`=? WHERE `id`=?");
        $stmt->execute(array($state->id, $this->id));
        $pdo->commit();
        $this->state = $state;
        echo "OKK";
    }
}