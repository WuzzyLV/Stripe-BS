<?php
    require 'con_db.php';
    $vaicajums = "SELECT * FROM pieteikums ORDER BY pieteikums_id DESC";
    $rezultats = mysqli_query($savienojums, $vaicajums);

    if(!$rezultats){
        die('Kļūda'.mysqli_error($savienojums));
    }

    $json = array();
    while($ieraksts = $rezultats->fetch_assoc()){
        $json [] = array(
            'id' => htmlspecialchars($ieraksts['pieteikums_id']),
            'vards' => htmlspecialchars($ieraksts['vards']),
            'uzvards' => htmlspecialchars($ieraksts['uzvards']),
            'epasts' => htmlspecialchars($ieraksts['epasts']),
            'talrunis' => htmlspecialchars($ieraksts['talrunis']),
            'datums' => htmlspecialchars($ieraksts['datums']),
            'statuss' => htmlspecialchars($ieraksts['status'])
        );
    }

    $jsonstring = json_encode($json);

    echo $jsonstring;

?>