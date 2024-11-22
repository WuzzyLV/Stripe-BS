<?php
    if(isset($_POST['ielogoties'])){
        require 'con_db.php';
        session_start();

        $lietotajvards = htmlspecialchars($_POST['lietotajs']);
        $parole = htmlspecialchars($_POST['parole']);

        $vaicajums = $savienojums->prepare("SELECT * FROM lietotajs WHERE lietotajvards = ? AND statuss = 'aktivs'");

        $vaicajums->bind_param("s", $lietotajvards);
        $vaicajums->execute();
        $rezultats = $vaicajums->get_result();

        $lietotajs = $rezultats->fetch_assoc();
        if($lietotajs && password_verify($parole, $lietotajs['parole'])){
            $_SESSION['lietotajvards'] = $lietotajs['lietotajvards'];
            $_SESSION['loma'] = $lietotajs['loma'];
            echo $_SESSION['pazinojums'] = 'Veiksmīgi ielogots!';
        }else{
            
            echo $_SESSION['pazinojums'] = 'Nepareizs lietotājvārds vai parole!';
        }

        header("Location: ../");


        $vaicajums->close();
        $savienojums->close();
    }
?>