<?php
if (!class_exists("Computer")) {
    include '../backend/computer/Computer.php';
}
if (!class_exists("State")) {
    include '../backend/state/State.php';
}
$computer = new Computer();
$computer->getComputerByUUID($_GET['uuid']);
?>

<link rel="stylesheet" href="css/computer_info.css">
<section class="computer-info-section">
    <h2 class="computer-info-h2">Computer Informations:</h2>
    <div class="computer-info-content">
        <table class="computer-info-table">
            <tr>
                <th scope="col">Specifications</th>
                <th scope="col" style="text-align: center;">Values</th>
            </tr>
            <tr>
                <th scope="row">Database UUID</th>
                <td><?php
                    echo $computer->uuid;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Brand</th>
                <td><?php
                    echo $computer->brand;
                    ?></td>
                </td>
            </tr>
            <tr>
                <th scope="row">Model</th>
                <td><?php
                    echo $computer->model;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Serial Number</th>
                <td><?php
                    echo $computer->serialNumber;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Mac Address</th>
                <td><?php
                    echo $computer->macAddress;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Arrival</th>
                <td><?php
                    echo $computer->entryDate;
                    ?></td>
            </tr>
            <tr >
                <th scope="row">Leaving</th>
                <td>Not implemented</td>
            </tr>
            <tr>
                <th scope="row">Recipient</th>
                <td>Not implemented</td>
            </tr>
            <tr>
                <th scope="row">State</th>
                <td class="status" id="status"><p class="done">Done<p></td>
            </tr>
        </table>
        <p class="qr-text">Computer's QRCode:</p>
        <img class="qr-img" src="img/qr-code.png">
        <a href="img/qr-code.png" download>Download the QRCode</a>
    </div>
</section>

<script src="js/modificate_computer_infos.js"></script>