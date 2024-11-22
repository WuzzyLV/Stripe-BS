<?php
session_start();
header("Content-Type: application/json");

if ($_SESSION['loma'] != "admin") {
    echo json_encode(array("error" => "Begone mf"));
    exit();
}

require '../con_db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "UPDATE lietotajs SET statuss = 'dzests' WHERE lietotajs_id = ?";
    $stmt = $savienojums->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(array("success" => "Lietotajs izdzests."));
    } else {
        echo json_encode(array("error" => "Kļūda serverī"));
    }

    $stmt->close();
} else {
    echo json_encode(array("error" => "ID ir vajadzigs."));
}

$savienojums->close();
