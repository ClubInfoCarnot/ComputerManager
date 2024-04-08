<?php

if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
}

class Recipient
{
    private $dbData = array();
    public $id = 0;
    public $name = "";

    function getRecipientByID($id) {
        $pdo = getCon();
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        $result = $pdo->query("SELECT * FROM `recipient` WHERE `id`=$id LIMIT 1");
        $this->dbData = $result;
        $this->setRecipientData();
    }

    private function setRecipientData() {
        foreach ($this->dbData as $row) {
            $this->id = $row['id'];
            $this->name = $row['name'];
        }
    }
}