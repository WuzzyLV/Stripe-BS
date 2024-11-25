<?php
phpinfo();
echo curl_version();

require_once './../stripe-php/init.php';
require_once "config.php";


//checkout session
$session = \Stripe\Checkout\Session::create([
    'mode' => 'payment',
    'success_url' => "https://stripe.wuzzy.software/payments/success.php?session_id={CHECKOUT_SESSION_ID}",
    'cancel_url' => "https://stripe.wuzzy.software/",
    'locale' => 'lv',
    'line_items' => [[
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => 'PRO PLAN',
            ],
            'unit_amount' => 1000000000,
        ],
        'quantity' => 1,
    ]],
]);

header('Content-Type: application/json');
header("Location: " . $session->url);