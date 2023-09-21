<?php

namespace MercadoPago\PP\Sdk\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MercadoPago\PP\Sdk\Sdk;

class PaymentTest extends TestCase
{
    private function loadPayment()
    {
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $accessToken = $envVars['ACCESS_TOKEN'] ?? null;
        $sdk = new Sdk(
            $accessToken,
            'BP1EF6QIC4P001KBGQ10',
            'BC32CANTRPP001U8NHO0',
            ''
        );

        $payment = $sdk->getPaymentInstance();

        $payment->transaction_amount = 230;
        $payment->description = "Ergonomic Silk Shirt";
        $payment->payer->first_name = "Daniel";
        $payment->payer->last_name = "Lima";
        $payment->payer->identification->type = "CPF";
        $payment->payer->identification->number = "097.588.560-06";
        $payment->point_of_interaction->type = "CHECKOUT";

        $payment->payer->email = "test_user_98934401@testuser.com";

        return $payment;
    }
    private function loadPaymentV21()
    {
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $accessToken = $envVars['ACCESS_TOKEN'] ?? null;
        $sdk = new Sdk(
            $accessToken,
            'BP1EF6QIC4P001KBGQ10',
            'BC32CANTRPP001U8NHO0',
            ''
        );

        $payment = $sdk->getPaymentV2Instance();

        $payment->transaction_amount = 230;
        $payment->description = "Ergonomic Silk Shirt";
        $payment->payer->first_name = "Daniel";
        $payment->payer->last_name = "Lima";
        $payment->payer->identification->type = "CPF";
        $payment->payer->identification->number = "097.588.560-06";
        $payment->point_of_interaction->type = "CHECKOUT";

        $payment->payer->email = "test_user_98934401@testuser.com";

        return $payment;
    }
    public function testPaymentSuccessCreditCard()
    {
        $payment = $this->loadPayment();

        $cardToken = new CardToken();
        $idToken = $cardToken->generateCardTokenMaster("APRO");

        $payment->token = $idToken;
        $payment->installments = 1;
        $payment->payment_method_id = "master";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'approved');
        $this->assertEquals($response->payment_method_id, 'master');
        $this->assertEquals($response->payment_type_id, 'credit_card');
        $this->assertEquals($response->installments, 1);
        $this->assertEquals($response->status_detail, "accredited");
    }

    public function testPaymentRejectedCreditCard()
    {
        $payment = $this->loadPayment();

        $cardToken = new CardToken();
        $idToken = $cardToken->generateCardTokenMaster("OTHE");

        $payment->token = $idToken;
        $payment->installments = 1;
        $payment->payment_method_id = "master";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'rejected');
        $this->assertEquals($response->payment_method_id, 'master');
        $this->assertEquals($response->payment_type_id, 'credit_card');
        $this->assertEquals($response->installments, 1);
        $this->assertEquals($response->status_detail, "cc_rejected_other_reason");
    }

    public function testPaymentV21SuccessCreditCard()
    {
        $payment = $this->loadPaymentV21();

        $cardToken = new CardToken();
        $idToken = $cardToken->generateCardTokenMaster("APRO");

        $payment->token = $idToken;
        $payment->installments = 1;
        $payment->payment_method_id = "master";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'approved');
        $this->assertEquals($response->payment_method_id, 'master');
        $this->assertEquals($response->payment_type_id, 'credit_card');
        $this->assertEquals($response->installments, 1);
        $this->assertEquals($response->status_detail, "accredited");
    }

    public function testPaymentV21RejectedCreditCard()
    {
        $payment = $this->loadPaymentV21();

        $cardToken = new CardToken();
        $idToken = $cardToken->generateCardTokenMaster("OTHE");

        $payment->token = $idToken;
        $payment->installments = 1;
        $payment->payment_method_id = "master";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'rejected');
        $this->assertEquals($response->payment_method_id, 'master');
        $this->assertEquals($response->payment_type_id, 'credit_card');
        $this->assertEquals($response->installments, 1);
        $this->assertEquals($response->status_detail, "cc_rejected_other_reason");
    }

    public function testPaymentSuccessBoleto()
    {
        $payment = $this->loadPayment();

        $payment->payment_method_id = "bolbradesco";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'pending');
        $this->assertEquals($response->payment_method_id, 'bolbradesco');
        $this->assertEquals($response->payment_type_id, 'ticket');
        $this->assertEquals($response->status_detail, "pending_waiting_payment");
    }

    public function testPaymentSuccessPix()
    {
        $payment = $this->loadPayment();

        $payment->payment_method_id = "pix";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'pending');
        $this->assertEquals($response->payment_method_id, 'pix');
        $this->assertEquals($response->payment_type_id, 'bank_transfer');
        $this->assertEquals($response->status_detail, "pending_waiting_transfer");
    }
}
