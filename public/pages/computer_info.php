<link rel="stylesheet" href="css/computer_info.css">
<section class="computer-info-section">
    <h2 class="computer-info-h2">Computer Informations:</h2>
    <div class="computer-info-content">
        <table class="computer-info-table">
            <tr>
                <th scope="col">Specifications</th>
                <th scope="col" style="text-align: center;" onclick="alert('Good !')">Values</th>
            </tr>
            <tr>
                <th scope="row">Database UUID</th>
                <td id="uuid">UUID-UUID-UUID-UUID-UUID</td>
            </tr>
            <tr>
                <th scope="row">Brand</th>
                <td id="brand">NewSoftBrandExemple</td>
            </tr>
            <tr>
                <th scope="row">Model</th>
                <td id="model">MyFavoriteModel</td>
            </tr>
            <tr>
                <th scope="row">Serial Number</th>
                <td id="serial-number">687319613216123401260</td>
            </tr>
            <tr>
                <th scope="row">Mac Address</th>
                <td id="mac-addr">6E:DA:78:4S:GL</td>
            </tr>
            <tr>
                <th scope="row">Arrival</th>
                <td id="arrival">JJ-MM-AAAA</td>
            </tr>
            <tr >
                <th scope="row">Leaving</th>
                <td id="leaving">JJ-MM-AAAA</td>
            </tr>
            <tr>
                <th scope="row">Recipient</th>
                <td id="recipient">ARandomSchool</td>
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