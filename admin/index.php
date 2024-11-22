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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script-index.js" defer></script>
</head>
<body>
    <?php require 'components/header.php'; ?>

    <div class="admin-main">
       <div class="admin-grid">
                <div class="user gray-bg">
                    <h2>Sveicināti, <?php echo $_SESSION['lietotajvards']; ?>!</h2>
                    <p>Tava loma sistēmā: 
                        <?php
                            require 'database/con_db.php';
                            $query = $savienojums->prepare("SELECT * FROM lietotajs WHERE lietotajvards = ?");
                            $query->bind_param("s", $_SESSION['lietotajvards']);
                            $query->execute();
                            $user = $query->get_result()->fetch_assoc();
                            $query->close();
                            $savienojums->close();
                            echo $user['loma'] == "admin" ? "Administrātors" : "Moderators";
                        ?>
                    </p>
                </div>

                <div class="new gray-bg">
                    <div class="items">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <div>
                            <h3 id="new-applications"></h3>
                            <p>Jauni pieteikumi</p> 
                        </div>
                    </div>
                </div>
                <div class="opened gray-bg">
                    <div class="items">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <div>
                            <h3 id="opened-applications"></h3>
                            <p>Atvērti pieteikumi</p> 
                        </div>
                    </div>
                </div>
                    <div class="waiting gray-bg">
                    <div class="items">
                        <i class="fa-solid fa-spinner"></i>
                        <div>
                            <h3 id="waiting-applications"></h3>
                            <p>Gaida pieteikumi</p> 
                        </div>
                    </div>
                    </div>

                    <div class="all gray-bg">
                    <div class="items">
                    <i class="fa-solid fa-list"></i></i>
                        <div>
                            <h3 id="all-applications"></h3>
                            <p>Kopā pieteikumi</p> 
                        </div>
                    </div>
        </div>
        <div class="grid-low">
        <div>
            <div class="newest-header">
                <p>JAUNĀKIE PIETEIKUMI</p>
            </div>
            <table class="table-newest">
                <tr>
                    <th>Vārds, uzvārds</th>
                    <th>Datums</th>
                    <th>Statuss</th>
                </tr>
                <tbody id="applications-newest"></tbody>
            </table>    
        </div>

        <div class="right-col"> 
            <div class="newest-header">
                <p>PIETEIKUMU SKAITS</p>
            </div>
            <div class="chart-container">
                <canvas id="stats" ></canvas>
            </div>
        </div>

    </div>

    


     <?php
        if(isset($_SESSION['pazinojums']));
     ?>


</body>
</html>
