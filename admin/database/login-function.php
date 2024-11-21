<?php
    if(isset($_POST['ielogoties'])){
        require 'con_db.php';
        session_start();

        $lietotajvards = htmlspecialchars($_POST['lietotajs']);
        $parole = htmlspecialchars($_POST['parole']);

        $vaicajums = $savienojums->prepare("SELECT * FROM lietotajs WHERE lietotajvards = ?");

        $vaicajums->bind_param("s", $lietotajvards);
        $vaicajums->execute();
        $rezultats = $vaicajums->get_result();

        $lietotajs = $rezultats->fetch_assoc();
        if($lietotajs && password_verify($parole, $lietotajs['parole'])){
            echo $_SESSION['lietotajvards'] = $lietotajs['lietotajvards'];
        }else{
            
            echo $_SESSION['pazinojums'] = 'Nepareizs lietotājvārds vai parole!';
        }

        header("Location: ../");


        $vaicajums->close();
        $savienojums->close();
    }
?>