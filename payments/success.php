<?php

if(!empty($_GET['session_id'])){
    $session_id = $_GET['session_id'];

    require_once './../stripe-php/init.php';
    require_once "config.php";

    $statusMsg = '';
    try{

        $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        $customer_email = $checkout_session->customer_details->email;
        $payment_intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);

        if($payment_intent->status === 'succeeded'){
            $transactionID = $payment_intent->id;
            $statusMsg = `
                <h2>Maksajums veikts veiksmigi!</h2>
                <p>Lai turpmak iegutu pro privilegijas, veicot jaunu pieteikumu, izmantojiet so epastu: <b>${customer_email}</b></p>
                <p>Maksajuma reference: ${transactionID}</p>
            `;
        }else{
            $statusMsg = "Ej bekot!";
        }
        echo $statusMsg;
        
 


    }catch(Exception $e){
        echo "Nevar iegut maksajuma informaciju: " . $e->getMessage();
    }
}else {
    echo "Maksajuma informacija nav pieejama!";
}