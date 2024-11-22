<?php
session_start();
header("Content-Type: application/json");

// Check admin privileges
if ($_SESSION['loma'] != "admin") {
    echo json_encode(array("error" => "Begone mf"));
    exit();
}

require '../con_db.php'; // Assuming this file sets up the $savienojums variable

// Capture POST data
$lietotajvards = $_POST['lietotajvards'] ?? null;
$vards = $_POST['vards'] ?? null;
$uzvards = $_POST['uzvards'] ?? null;
$epasts = $_POST['epasts'] ?? null;
$loma = $_POST['loma'] ?? 'moderator';
$password = $_POST['password'] ?? null;
$id = $_POST['id'] ?? null;

// Check if username already exists
if (!$id) {
    // For new users
    $check_query = "SELECT lietotajs_id FROM lietotajs WHERE lietotajvards = ?";
} else {
    // For existing users, exclude the current user from the check
    $check_query = "SELECT lietotajs_id FROM lietotajs WHERE lietotajvards = ? AND lietotajs_id != ?";
}

$check_stmt = $savienojums->prepare($check_query);

if (!$id) {
    $check_stmt->bind_param("s", $lietotajvards);
} else {
    $check_stmt->bind_param("si", $lietotajvards, $id);
}

$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    http_response_code(400);
    echo json_encode(array("error" => "Lietotajvārds jau eksistē."));
    $check_stmt->close();
    exit();
}

$check_stmt->close();

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if (!$id) {
    if (!$lietotajvards || !$vards || !$uzvards || !$epasts || !$password) {
        echo json_encode(array("error" => "Visi lauki ir nepieciešami."));
        exit();
    }
    // Insert new user
    $query = "INSERT INTO lietotajs (lietotajvards, vards, uzvards, epasts, loma, parole, created_at) 
              VALUES (?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $savienojums->prepare($query);
    $stmt->bind_param("ssssss", $lietotajvards, $vards, $uzvards, $epasts, $loma, $hashed_password);

    if ($stmt->execute()) {
        echo json_encode(array("success" => "Lietotajs izveidots."));
    } else {
        http_response_code(500);
        echo json_encode(array("error" => "Neizdevās izveidot lietotāju."));
    }

    $stmt->close();
} else {
    if (!$lietotajvards || !$vards || !$uzvards || !$epasts) {
        echo json_encode(array("error" => "Visi lauki ir nepieciešami."));
        exit();
    }
    $stmt;
    if(!$password) {
        // If password is not provided, do not update it
        $query = "UPDATE lietotajs 
                  SET lietotajvards = ?, vards = ?, uzvards = ?, epasts = ?, loma = ? 
                  WHERE lietotajs_id = ?";
        
        $stmt = $savienojums->prepare($query);
        $stmt->bind_param("sssssi", $lietotajvards, $vards, $uzvards, $epasts, $loma, $id);
        
    }else{
        // Edit existing user
        $query = "UPDATE lietotajs 
                  SET lietotajvards = ?, vards = ?, uzvards = ?, epasts = ?, loma = ?, parole = ? 
                  WHERE lietotajs_id = ?";
        
        $stmt = $savienojums->prepare($query);
        $stmt->bind_param("ssssssi", $lietotajvards, $vards, $uzvards, $epasts, $loma, $hashed_password, $id);
    }
    if ($stmt->execute()) {
        echo json_encode(array("success" => "User updated successfully."));
    } else {
        http_response_code(500);
        echo json_encode(array("error" => "Neizdevās atjaunot lietotāju."));
    }

    $stmt->close();
}

// Close database connection
$savienojums->close();
?>
