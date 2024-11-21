<?php
    require "con_db.php";

    if(isset($_POST['id'])){
        $id = intval($_POST['id']);
        
        $vaicajums = $savienojums->prepare("DELETE FROM pieteikums WHERE pieteikums_id = ?");
        $vaicajums->bind_param("i", $id);

        if($vaicajums->execute()){
            echo "Veiksmīgi dzēsts!";
        }else{
            echo "Kluda!".$savienojums->error();
        }
        $vaicajums->close();
        $savienojums->close(); 
    }
?>