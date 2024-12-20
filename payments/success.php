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

        // Check if this payment reference already exists
        $query = $savienojums->prepare("SELECT * FROM payments WHERE email = ? AND payment_reference = ?");
        $query->execute([$customer_email, $transactionID]);

        if ($query->num_rows() > 0) {
            // Payment is a duplicate
            echo "<p>Maksājums jau veikts ar šo atsauci! Atkārtojiet darbību ar citu maksājumu atsauci.</p>";
            exit;
        }
        $query->close();

        // Calculate end_date (current date + 1 year)
        $current_date = new DateTime();
        $end_date = $current_date->modify('+1 year')->format('Y-m-d');

        // Check if the user already has an active payment
        $query = $savienojums->prepare("SELECT end_date FROM payments WHERE email = ?");
        $query->execute([$customer_email]);

        if ($query->num_rows() > 0) {
            echo "Existing payment found";
            // Extend the end_date if the last payment is not expired
            $existing_payment = $query->get_result()->fetch_assoc();
            $existing_end_date = new DateTime($existing_payment['end_date']);
            if ($existing_end_date > new DateTime()) {
                $existing_end_date->modify('+1 year');
                $end_date = $existing_end_date->format('Y-m-d');
            }
        }
        $query->close();
        //delete old payment
        $query = $savienojums->prepare("DELETE FROM payments WHERE email = ?");
        $query->execute([$customer_email]);
        $query->close();

        // Insert or update payment record
        $insert_query = $savienojums->prepare("INSERT INTO payments (email, payment_reference, timestamp, end_date) VALUES (?, ?, NOW(), ?)");
        $insert_query->execute([$customer_email, $transactionID, $end_date]);

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
