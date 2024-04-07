<?php

if (!function_exists('getCon')) {
    include '../backend/database/Connection.php';
}

class ComputerType
{
    private $dbData = array();
    public $id = 0;
    public $visualName = "";

    function getComputerType($id) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT * FROM `computer-type` WHERE `id`='$id'");
        $this->dbData = $result;
        $this->setComputerTypeData();
    }

    private function setComputerTypeData() {
        foreach ($this->dbData as $row) {
            $this->id = $row['id'];
            $this->visualName = $row['visual-name'];
        }
    }

    function createComputerType($visualName) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO `computer-type` (`visual-name`) VALUES (?)");
        $stmt->execute(array($visualName));
        $pdo->commit();
        $test = $pdo->query("SELECT LAST_INSERT_ID() AS id FROM `computer-type`");
        $this->id = $test->fetch()['id'];
        $this->visualName = $visualName;
        echo $this->id;
    }
}