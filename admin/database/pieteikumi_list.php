<?php
require 'con_db.php';

// Get the search query from the GET request
$query = isset($_GET['query']) ? htmlspecialchars(trim($_GET['query'])) : '';

$vaicajums = "SELECT p.pieteikums_id, p.vards, p.uzvards, p.epasts, p.talrunis, p.datums, p.status, 
              IF(payments.end_date >= CURDATE(), 1, 0) AS is_pro
              FROM pieteikums p
              LEFT JOIN payments ON p.epasts = payments.email";

// If a search query is provided, add a WHERE condition to filter results
if (!empty($query)) {
    $query = $savienojums->real_escape_string($query); // Escape special characters to prevent SQL injection
    $vaicajums .= " WHERE 
                    p.vards LIKE '%$query%' OR 
                    p.uzvards LIKE '%$query%' OR 
                    p.epasts LIKE '%$query%' OR 
                    p.talrunis LIKE '%$query%'";
}

// Order the results by the application ID in descending order
$vaicajums .= " ORDER BY p.pieteikums_id DESC";

// Execute the query
$rezultats = mysqli_query($savienojums, $vaicajums);

// Check for errors in the query execution
if (!$rezultats) {
    die('Kļūda: ' . mysqli_error($savienojums));
}

$json = array();

// Fetch the results and build the response array
while ($ieraksts = $rezultats->fetch_assoc()) {
    $json[] = array(
        'id' => htmlspecialchars($ieraksts['pieteikums_id']),
        'vards' => htmlspecialchars($ieraksts['vards']),
        'uzvards' => htmlspecialchars($ieraksts['uzvards']),
        'epasts' => htmlspecialchars($ieraksts['epasts']),
        'talrunis' => htmlspecialchars($ieraksts['talrunis']),
        'datums' => htmlspecialchars($ieraksts['datums']),
        'statuss' => htmlspecialchars($ieraksts['status']),
        'is_pro' => (bool)$ieraksts['is_pro'] // Convert the result to boolean for JSON output
    );
}

// Output the JSON encoded result
echo json_encode($json);
?>
