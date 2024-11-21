<?php
    // require "con_db.php";

    // if(isset($_POST['id'])){
    //     $id = intval($_POST['id']);
    //     $p_vards = htmlspecialchars($_POST['vards']);
    //     $p_uzvards = htmlspecialchars($_POST['uzvards']);
    //     $p_epasts = htmlspecialchars($_POST['epasts']);
    //     $p_talrunis = htmlspecialchars($_POST['talrunis']);
    //     $p_apraksts = htmlspecialchars($_POST['apraksts']);
    //     $p_statuss = htmlspecialchars($_POST['statuss']);

    //     $vaicajums = $savienojums->prepare("UPDATE IT_pieteikums SET vards = ?, uzvards = ?, epasts = ?, talrunis = ?, apraksts = ?, statuss = ? WHERE pieteikums_id = ?");

    //     $vaicajums->bind_param("sssissi", $p_vards, $p_uzvards, $p_epasts, $p_talrunis, $p_apraksts, $p_statuss, $id);

    //     if($vaicajums->execute()){
    //         echo "Veiksmīgi redigets!";
    //     }else{
    //         echo "Kluda!".$savienojums->error();
    //     }
    //     $vaicajums->close();
    //     $savienojums->close();
    // }
?>

<?php
require "con_db.php";

if(isset($_POST['id'])){
    $id = intval($_POST['id']);
    $p_vards = htmlspecialchars($_POST['vards']);
    $p_uzvards = htmlspecialchars($_POST['uzvards']);
    $p_epasts = htmlspecialchars($_POST['epasts']);
    $p_talrunis = htmlspecialchars($_POST['talrunis']);
    $p_apraksts = htmlspecialchars($_POST['apraksts']);
    $p_statuss = htmlspecialchars($_POST['statuss']);

    $vaicajums = $savienojums->prepare("UPDATE pieteikums SET vards = ?, uzvards = ?, epasts = ?, talrunis = ?, apraksts = ?, status = ? WHERE pieteikums_id = ?");
    $vaicajums->bind_param("sssissi", $p_vards, $p_uzvards, $p_epasts, $p_talrunis, $p_apraksts, $p_statuss, $id);

    if($vaicajums->execute()){
        echo "Veiksmīgi rediģēts!";
    }else{
        echo "Kļūda: ".$savienojums->error();
    }

    $vaicajums->close();
    $savienojums->close();

}

?>