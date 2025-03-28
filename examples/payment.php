<?php

    use MercadoPago\PP\Sdk\Sdk;

    require_once(__DIR__ . '/vendor/autoload.php');

    function debug($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    $sdk = new Sdk( 'accessToken', 'platformId', 'productId', 'integratorId', 'publicKey', 'urisScope' );

    $payment = $sdk->getPaymentInstance();

    //For each new call it will be necessary to create a card token
    $payment->token = "card_token";

    $payment->transaction_amount = 230;
    $payment->description = "Ergonomic Silk Shirt";
    $payment->installments = 1;
    $payment->payment_method_id = "master";
    $payment->payer->email = "test_user_98934401@testuser.com";

    debug(json_encode($payment->save()));

    //Get Payment
    debug(json_encode($payment->read(array(
        "id" => $payment->id,
    ))));

    //Create Payment with Super Token
    debug(json_encode($payment->saveWithSuperToken('ABC_TOKEN_123', 'credit_card')));
 ?>
 