<?php
require "con_db.php";

if(isset($_POST['id'])){
    $p_vards = htmlspecialchars($_POST['vards']);
    $p_uzvards = htmlspecialchars($_POST['uzvards']);
    $p_epasts = htmlspecialchars($_POST['epasts']);
    $p_talrunis = htmlspecialchars($_POST['talrunis']);
    $p_apraksts = htmlspecialchars($_POST['apraksts']);
    $p_statuss = htmlspecialchars($_POST['statuss']);

    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    $vaicajums = $savienojums->prepare("INSERT INTO pieteikums(vards, uzvards, epasts, talrunis, apraksts, status, created_ip) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $vaicajums->bind_param("sssisss", $p_vards, $p_uzvards, $p_epasts, $p_talrunis, $p_apraksts, $p_statuss, $ip);


    
    if($vaicajums->execute()){
        echo "Veiksmīgi pievienots!";
    }else{
        echo "Kļūda: ".$savienojums->error();
    }

    $vaicajums->close();
    $savienojums->close();

}

?>