<?php
    $serveris = "localhost";
    $lietotajs = "root";
    $parole = "root";
    $db = "it_atbalsts";


    $savienojums = mysqli_connect($serveris, $lietotajs, $parole, $db);
    $savienojums->set_charset("utf8mb4");
?>