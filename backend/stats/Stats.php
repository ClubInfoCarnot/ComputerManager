<?php

if (!function_exists('getCon')) {
    include 'backend/database/Connection.php';
}
if (!class_exists("State")) {
    include 'backend/state/State.php';
}

function getNumberOfComputer() {
    $con = getCon();
    $result = $con->query("SELECT COUNT(*) FROM `computer-inventory`");
    $row = $result->fetch();
    return $row[0];
}

function getNumberOfComputerByState(State $state) {
    $con = getCon();
    $result = $con->query("SELECT COUNT(*) FROM `computer-inventory` WHERE `state`='$state->id'");
    $row = $result->fetch();
    return $row[0];
}