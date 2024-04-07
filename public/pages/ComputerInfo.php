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
                <th scope="col">Spécificitées</th>
                <th scope="col" style="text-align: center;">Valeurs</th>
            </tr>
            <tr>
                <th scope="row">UUID</th>
                <td><?php
                    echo $computer->uuid;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Marque</th>
                <td><?php
                    echo $computer->brand;
                    ?></td>
                </td>
            </tr>
            <tr>
                <th scope="row">Modèle</th>
                <td><?php
                    echo $computer->model;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">N° de série</th>
                <td><?php
                    echo $computer->serialNumber;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Adresse MAC</th>
                <td><?php
                    echo $computer->macAddress;
                    ?></td>
            </tr>
            <tr>
                <th scope="row">Arrivée</th>
                <td><?php
                    echo $computer->entryDate;
                    ?></td>
            </tr>
            <tr >
                <th scope="row">Départ</th>
                <td>Not implemented</td>
            </tr>
            <tr>
                <th scope="row">Destinataire</th>
                <td>Not implemented</td>
            </tr>
            <tr>
                <th scope="row">Status</th>
                <?php 
                if ($computer->state->visualName == "Fait") {
                    $state = "<p class=\"done\">Fait<p></td>";
                } else if ($computer->state->visualName == "Nettoyage") {
                    $state = "<p class=\"in-progress\">Nettoyage<p></td>";
                } else {
                    $state = "<p class=\"waiting\">En attente<p></td>";
                }

                echo "<td class=\"status\">".$state."</td>";
                ?>
            </tr>
        </table>
        <p class="qr-text">QRCode de l'ordinateur:</p>
        <?php
        use chillerlan\QRCode\QRCode;
        $qrcode = new QRCode;
        $render = $qrcode->render($computer->uuid);
        echo '<img class="qr-img" src='.$render.' width="200" height="200">';
        ?>
        <a href="img/qr-code.png" download>Télécharger le QRCode</a>
    </div>
</section>

<script src="js/modificate_computer_infos.js"></script>