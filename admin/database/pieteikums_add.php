<?php
require "con_db.php";

if(isset($_POST['id'])){
    $p_vards = htmlspecialchars($_POST['vards']);
    $p_uzvards = htmlspecialchars($_POST['uzvards']);
    $p_epasts = htmlspecialchars($_POST['epasts']);
    $p_talrunis = htmlspecialchars($_POST['talrunis']);
    $p_apraksts = htmlspecialchars($_POST['apraksts']);
    $p_statuss = htmlspecialchars($_POST['statuss']);

    $vaicajums = $savienojums->prepare("INSERT INTO pieteikums(vards, uzvards, epasts, talrunis, apraksts, status) VALUES (?, ?, ?, ?, ?, ?)");
    $vaicajums->bind_param("sssiss", $p_vards, $p_uzvards, $p_epasts, $p_talrunis, $p_apraksts, $p_statuss);

    if($vaicajums->execute()){
        echo "Veiksmīgi pievienots!";
    }else{
        echo "Kļūda: ".$savienojums->error();
    }

    $vaicajums->close();
    $savienojums->close();

}

?>