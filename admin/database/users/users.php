<?php
session_start();
header("Content-Type: application/json");

if ($_SESSION['loma'] != "admin") {
    echo json_encode(array("error" => "Begone mf"));
}

require '../con_db.php';

$query = $savienojums->query("SELECT * FROM lietotajs WHERE statuss != 'dzests';");
$query = $query->fetch_all(MYSQLI_ASSOC);

foreach($query as &$entry){ // dirty date formatting but oh well
    $entry['created_at'] = date('d.m.y', strtotime($entry['created_at']));
    $entry['id'] = $entry['lietotajs_id'];
    unset($entry['lietotajs_id']);
}

echo json_encode($query);

$savienojums->close();
