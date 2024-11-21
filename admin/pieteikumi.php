<?php
session_start();
     if(!isset($_SESSION['lietotajvards'])){
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en" class="admin-dashboard">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script-admin.js" defer></script>
</head>
<body>
    <header>
        <a href="./" class="logo" id="logo-text">
            <i class="fa fa-server"></i> IT atbalsts
        </a>
        <div class="apply">
            <a href="./" class="btn">Sākums</a>
            <a href="./pieteikumi.php" class="btn">Pieteikumi</a>
            <a href="./" class="btn">PRO īpašnieki</a>
            <a href="logout.php" class="btn"><i class="fas fa-power-off"></i></a>
        </div>
    </header>

    <div class="admin-top">
        <div>
            <input type="text" placeholder="Meklēšana">
            <a class="btn-sm"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
        <div>
            <a class="btn-sm" id="new-btn">
                <i class="fa fa-plus"></i> Pievienot jaunu
            </a>
        </div>
    </div>

    <div class="admin-main">
        <table>
            <tr>
                <th>ID</th>
                <th>Vards</th>
                <th>Uzvards</th>
                <th>E-pasts</th>
                <th>Talrunis</th>
                <th>Datums</th>
                <th>Statuss</th>
                <th></th>
            </tr>
            <tbody id="pieteikumi"></tbody>
        </table>

    </div>
    

    <!-- Modal for ticket creation -->
    <div class="modal" id="modal-admin">
        <div class="modal-box">
            <div class="close-modal">
                <i class="fa fa-times"></i>
            </div>
            <h2 id="modal-title">Pieteikms</h2>
            <form id="pieteikumuForma">
                <div class="formElements">
                <label for="name" id="modal-vards">Vārds:</label>
                <input type="text" id="vards"  required>
                <label for="surname" id="modal-uzvards">Uzvārds:</label>
                <input type="text" id="uzvards"  required>
                <label for="email" id="modal-epasts">E-pasta adrese:</label>
                <input type="email" id="epasts"  required>
                <label for="phone" id="modal-tel">Tālruņa numurs:</label>
                <input type="tel" id="talrunis" pattern="[0-9]{8}"  required>
                <label for="description" id="modal-desc">Problēmas / veicamā uzdevuma apraksts:</label>
                <textarea id="apraksts"  rows="4" required></textarea>
                <label>Statuss:</label>
                <select id="statuss" required>
                    <option value="Jauns">Jauns</option>
                    <option value="Atvērts">Atvērts</option>
                    <option value="Gaida">Gaida</option>
                    <option value="Pabeigts">Pabeigts</option>
                </select>
                </div>
                <INPUt type="hidden" id="piet_ID"></INPUt>
                <button type="submit"  class="btn active" id="submit-button">Saglabāt</button>
            </form>
        </div>
     </div>

     <?php
        if(isset($_SESSION['pazinojums']));
     ?>


</body>
</html>
