<?php

if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
}

function getNumberOfComputer() {
    $con = getCon();
    $result = $con->query("SELECT COUNT(*) FROM `computer-inventory`");
    $row = $result->fetch();
    return $row[0];
}