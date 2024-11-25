<?php

if(!empty($_GET['session_id'])){
    echo "<h1>Maksajuma statuss</h1>";
    $session_id = $_GET['session_id'];

    require_once './../stripe-php/init.php';
    require_once "config.php";

    $statusMsg = '123';
    try{
        echo "1";
        $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        $customer_email = $checkout_session->customer_details->email;
        $payment_intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);

        echo "2";
        if($payment_intent->status === 'succeeded'){
            echo "3";
            $transactionID = $payment_intent->id;
            $statusMsg = `
                <h2>Maksajums veikts veiksmigi!</h2>
                <p>Lai turpmak iegutu pro privilegijas, veicot jaunu pieteikumu, izmantojiet so epastu: <b>${customer_email}</b></p>
                <p>Maksajuma reference: ${transactionID}</p>
            `;
            echo "4";
        }else{
            echo "5";
            $statusMsg = "Ej bekot!";
        }
        echo $statusMsg;
        
    }catch(Exception $e){
        echo "Nevar iegut maksajuma informaciju: " . $e->getMessage();
    }
}else {
    echo "Maksajuma informacija nav pieejama!";
}