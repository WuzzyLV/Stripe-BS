<?php
session_start();
header("Content-Type: application/json");

if ($_SESSION['loma'] != "admin") {
    echo json_encode(array("error" => "Begone mf"));
}

require '../con_db.php';

//get query param id
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $savienojums->query("SELECT * FROM lietotajs WHERE lietotajs_id = $id;");
    $query = $query->fetch_assoc();
    unset($query['parole']);
    $query["id"] = $query['lietotajs_id'];
    unset($query['lietotajs_id']);
    unset($query['created_at']);
    echo json_encode($query);
    $savienojums->close();
    exit();
}
