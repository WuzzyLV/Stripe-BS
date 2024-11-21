<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT atbalsts - autorizācija</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
    
</head>

<body>
    <!-- MODAL logi -->
    <div class="modal modal-active" >
        <div class="modal-box">
            <h2>Ielogoties sistēmā</h2>
            <?php
                if(isset($_SESSION['pazinojums'])){
                    echo "<p class='login-notif'>".$_SESSION['pazinojums']."</p>";
                    unset($_SESSION['pazinojums']);
                }
            ?>

            <form action="database/login-function.php" method="POST">
                <label>Lietotājvārds:</label>
                <input type="text" name="lietotajs" required>
                <label>Parole:</label>
                <input type="password" name="parole" required>
                <button type="submit" name="ielogoties" class="btn active">Nosūtīt</button>
            </form>
        </div>
    </div>
</body>
</html>