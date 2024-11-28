<?php

require_once './../stripe-php/init.php';
require_once "config.php";

// Check if session_id is provided in the GET request
if (empty($_GET['session_id'])) {
    echo "<p>Maksājuma informācija nav pieejama!</p>";
    exit;
}
echo "<h1>Maksājuma statuss</h1>";

$session_id = htmlspecialchars($_GET['session_id']); // Sanitize input for security

require_once "../admin/database/con_db.php"; // Assumes this file establishes the $savienojums database connection

try {
    // Retrieve the checkout session from Stripe
    $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
    $customer_email = $checkout_session->customer_details->email;
    $payment_intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);

    // Check the payment status
    if ($payment_intent->status === 'succeeded') {
        $transactionID = $payment_intent->id;

        // Calculate end_date (current date + 1 year)
        $current_date = new DateTime();
        $end_date = $current_date->modify('+1 year')->format('Y-m-d');

        // Check if this payment reference already exists
        $query = $savienojums->prepare("SELECT end_date FROM payments WHERE email = :email AND payment_reference = :payment_reference");
        $query->bindParam(':email', $customer_email);
        $query->bindParam(':payment_reference', $transactionID);
        $query->execute();

        if ($query->rowCount() > 0) {
            // Payment exists; update end_date if not expired
            $existing_payment = $query->fetch(PDO::FETCH_ASSOC);
            $existing_end_date = new DateTime($existing_payment['end_date']);
            if ($existing_end_date > new DateTime()) {
                // Extend by another year if not expired
                $existing_end_date->modify('+1 year');
                $end_date = $existing_end_date->format('Y-m-d');
            }

            $update_query = $savienojums->prepare("UPDATE payments SET end_date = :end_date WHERE email = :email AND payment_reference = :payment_reference");
            $update_query->bindParam(':end_date', $end_date);
            $update_query->bindParam(':email', $customer_email);
            $update_query->bindParam(':payment_reference', $transactionID);
            $update_query->execute();
        } else {
            // New payment; insert into the database
            $insert_query = $savienojums->prepare("INSERT INTO payments (email, payment_reference, timestamp, end_date) VALUES (:email, :payment_reference, NOW(), :end_date)");
            $insert_query->bindParam(':email', $customer_email);
            $insert_query->bindParam(':payment_reference', $transactionID);
            $insert_query->bindParam(':end_date', $end_date);
            $insert_query->execute();
        }

        echo "
            <h2>Maksājums veikts veiksmīgi!</h2>
            <p>Lai turpmāk iegūtu Pro privilēģijas, veicot jaunu pieteikumu, izmantojiet šo e-pastu: 
            <b>{$customer_email}</b></p>
            <p>Maksājuma atsauce: <b>{$transactionID}</b></p>
        ";
    } else {
        // Redirect to the home page if payment was not successful
        header("Location: ../..");
        exit; // Ensure the script stops after redirect
    }
} catch (Exception $e) {
    // Handle exceptions and display a user-friendly message
    echo "<p>Nevar iegūt maksājuma informāciju: " . htmlspecialchars($e->getMessage()) . "</p>";
}
