<?php
session_start();
     if(!isset($_SESSION['lietotajvards'])){
        header("Location: login.php");
        exit;
    }
    if ($_SESSION['loma'] != "admin") {
        header("Location: /admin");
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
    <link rel="stylesheet" href="./style/users.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script-users.js" defer></script>
</head>
<body>
    <?php require 'components/header.php'; ?>

    <div class="admin-top user-admin-top">
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
                <th>Lietotajvārds</th>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>E-pasts</th>
                <th>Loma</th>
                <th>Reģ. datums</th>
                <th></th>
            </tr>
            <tbody id="users-table"></tbody>
        </table>

    </div>
    

    <!-- Modal for ticket creation -->
    <div class="modal" id="modal-admin">
        <div class="modal-box">
            <div class="close-modal">
                <i class="fa fa-times"></i>
            </div>
            <h2 id="modal-title">Lietotājs:</h2>
            <div class="error-container">
                <div id="error"></div> 
            </div>
            <form id="user-form">
                <div class="formElements">
                    <label for="name" id="modal-vards">Lietotajvārds:</label>
                    <input type="text" id="lietotajvards" required>
                    <label for="name" id="modal-vards">Vārds:</label>
                    <input type="text" id="vards"  required>
                    <label for="surname" id="modal-uzvards">Uzvārds:</label>
                    <input type="text" id="uzvards"  required>
                    <label for="email" id="modal-epasts">E-pasta adrese:</label>
                    <input type="email" id="epasts"  required>
                    <label>Statuss:</label>
                    <select id="loma" required>
                        <option value="moderator">Moderators</option>
                        <option value="admin">Administrātors</option>
                    </select>

                    <label for="password" id="modal-password">Parole:</label>
                    <div>
                        <div  class="btn active hidden" id="password-dropdown" onclick="togglePasswordField()">Izveidot jaunu paroli <i class="fa-solid fa-arrow-turn-down"></i></div>
                        <input type="password" id="password"  required>
                    </div>
            
                </div>
                <input type="hidden" id="piet_ID"></INPUt>
                <button type="submit"  class="btn active" id="submit-button">Saglabāt</button>
            </form>
        </div>
     </div>

     <?php
        if(isset($_SESSION['pazinojums']));
     ?>


</body>
</html>
