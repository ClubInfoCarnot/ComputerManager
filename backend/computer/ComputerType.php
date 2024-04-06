<?php

if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
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
}