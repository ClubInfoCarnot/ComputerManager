<?php

if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
}
if (!class_exists("State")) {
    include 'backend/state/State.php';
}
if (!class_exists("ComputerType")) {
    include 'backend/computer/ComputerType.php';
}
if (!class_exists("Computer")) {
    include 'backend/computer/Computer.php';
}

class ComputerSearch
{
    private $dbData = array();
    public $computers = array();

    function searchByUUID($uuid, $limit = 20)
    {
        $con = getCon();
        $uuids = $con->query("SELECT `uuid` FROM `computer-inventory` WHERE `uuid` LIKE '%$uuid%' LIMIT $limit");
        foreach ($uuids as $uuid) {
            $computer = new Computer();
            $computer->getComputerByUUID($uuid[0]);
            array_push($this->computers, $computer);
        }
    }
}