<?php

if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
}

class State
{
    private $dbData = array();
    public $id = 0;
    public $visualName = "";
    public $deleted = "";


    function getState($id) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT * FROM `state` WHERE `id`='$id'");
        $this->dbData = $result;
        $this->setStateData();
    }

    private function setStateData() {
        foreach ($this->dbData as $row) {
            $this->id = $row['id'];
            $this->visualName = $row['visual-name'];
            $this->deleted = $row['deleted'];
        }
    }
}