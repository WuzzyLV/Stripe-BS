<?php
    require 'con_db.php';

    require_once 'utils.php';   
    
    try{

    if(isset($_POST['id'])){
        $id = intval($_POST['id']);
        $vaicajums = $savienojums->prepare("SELECT * FROM pieteikums WHERE pieteikums_id = ?");
        $vaicajums->bind_param('i', $id);
        $vaicajums->execute();
        $rezultats = $vaicajums->get_result();
        if(!$rezultats){
            die('Kļūda '.$savienojums->error());
        }

        $json = array();
        while($ieraksts = $rezultats->fetch_assoc()){
            $json [] = array(
                'id' => htmlspecialchars($ieraksts['pieteikums_id']),
                'vards' => htmlspecialchars($ieraksts['vards']),
                'uzvards' => htmlspecialchars($ieraksts['uzvards']),
                'epasts' => htmlspecialchars($ieraksts['epasts']),
                'talrunis' => htmlspecialchars($ieraksts['talrunis']),
                'apraksts' => htmlspecialchars($ieraksts['apraksts']),
                'datums' => htmlspecialchars(formatDateWithHour($ieraksts['datums'])),
                'updated_at' => htmlspecialchars(formatDateWithHour($ieraksts['updated_at'])),
                'created_ip' => htmlspecialchars($ieraksts['created_ip'] ? $ieraksts['created_ip'] : 'Nav'),
                'statuss' => htmlspecialchars($ieraksts['status'])
            );
        }
        $vaicajums->close();
        $savienojums->close();
    
        $jsonstring = json_encode($json[0]);
    
        echo $jsonstring;
    }
}catch(Exception $e){
    echo '$e->getMessage()';
}

?>