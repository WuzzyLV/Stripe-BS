<?php
    require 'con_db.php';

    $query = isset($_GET['query']) ? htmlspecialchars(trim($_GET['query'])) : '';

    $vaicajums = "SELECT * FROM pieteikums";

    if (!empty($query)) {
        $query = $savienojums->real_escape_string($query); 
        $vaicajums .= " WHERE 
            vards LIKE '%$query%' OR 
            uzvards LIKE '%$query%' OR 
            epasts LIKE '%$query%' OR 
            talrunis LIKE '%$query%'";
    }

    $vaicajums .= " ORDER BY pieteikums_id DESC";

    $rezultats = mysqli_query($savienojums, $vaicajums);

    if (!$rezultats) {
        die('Kļūda: ' . mysqli_error($savienojums));
    }


    $json = array();
    while ($ieraksts = $rezultats->fetch_assoc()) {
        $json[] = array(
            'id' => htmlspecialchars($ieraksts['pieteikums_id']),
            'vards' => htmlspecialchars($ieraksts['vards']),
            'uzvards' => htmlspecialchars($ieraksts['uzvards']),
            'epasts' => htmlspecialchars($ieraksts['epasts']),
            'talrunis' => htmlspecialchars($ieraksts['talrunis']),
            'datums' => htmlspecialchars($ieraksts['datums']),
            'statuss' => htmlspecialchars($ieraksts['status'])
        );
    }

    echo json_encode($json);

