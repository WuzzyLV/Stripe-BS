<?php

require_once './../stripe-php/init.php';
require_once "config.php";

// Check if session_id is provided in the GET request
if (!empty($_GET['session_id'])) {
    echo "<h1>Maksājuma statuss</h1>";

    $session_id = htmlspecialchars($_GET['session_id']); // Sanitize input for security

    try {
        // Retrieve the checkout session from Stripe
        $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        $customer_email = $checkout_session->customer_details->email;
        $payment_intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);

        // Check the payment status
        if ($payment_intent->status === 'succeeded') {
            $transactionID = $payment_intent->id;
            
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
} else {
    // Display a message if no session_id is provided
    echo "<p>Maksājuma informācija nav pieejama!</p>";
}

?>
