<?php

namespace MercadoPago\PP\Sdk\Tests\Integration;

use MercadoPago\PP\Sdk\Entity\Payment\Location;
use PHPUnit\Framework\TestCase;
use MercadoPago\PP\Sdk\Sdk;

class PaymentTest extends TestCase
{

    private function loadPaymentSdk() {
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $accessToken = $envVars['ACCESS_TOKEN'] ?? null;
        $publicKey = $envVars['PUBLIC_KEY'] ?? null;
        $urisScope = $envVars['URIS_SCOPE'] ?? null;
        $sdk = new Sdk(
            $accessToken,
            'ppcoreinternal',
            'ppcoreinternal',
            '',
            $publicKey,
            $urisScope
        );
        $notificationUrl = $envVars['NOTIFICATION_URL'] ?? null;
        $payment = $sdk->getPaymentInstance(); 
        $payment->notification_url = $notificationUrl;
        return $payment;
    }

    private function loadPaymentSdkV21() {
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $accessToken = $envVars['ACCESS_TOKEN'] ?? null;
        $publicKey = $envVars['PUBLIC_KEY'] ?? null;
        $urisScope = $envVars['URIS_SCOPE'] ?? null;
        $sdk = new Sdk(
            $accessToken,
            'ppcoreinternal',
            'ppcoreinternal',
            '',
            $publicKey,
            $urisScope
        );
        $notificationUrl = $envVars['NOTIFICATION_URL'] ?? null;
        $payment = $sdk->getPaymentV21Instance(); 
        $payment->notification_url = $notificationUrl;
        return $payment;
    }

    private function loadPayment()
    {
        $payment = $this->loadPaymentSdk();
        $payment->transaction_amount = 230;
        $payment->description = "Ergonomic Silk Shirt";
        $payment->payer->first_name = "Daniel";
        $payment->payer->last_name = "Lima";
        $payment->payer->identification->type = "CPF";
        $payment->payer->identification->number = "097.588.560-06";
        $payment->point_of_interaction->type = "CHECKOUT";

        $payment->payer->address->street_name = "Rua teste";
        $payment->payer->address->street_number = "12";
        $payment->payer->address->neighborhood = "Centro";
        $payment->payer->address->city = "São Paulo";
        $payment->payer->address->federal_unit = "SP";
        $payment->payer->address->zip_code = "12345-123";

        $payment->additional_info->payer->address->street_name = "Rua teste";
        $payment->additional_info->payer->address->zip_code = "12345-123";
        $payment->additional_info->payer->address->city = "São Paulo";
        $payment->additional_info->payer->address->country = "Brasil";
        $payment->additional_info->payer->address->state = "SP";
        $payment->additional_info->payer->address->number = "12";
        $payment->additional_info->payer->address->complement = "12A";
        $payment->additional_info->payer->address->apartment = "1123";
        $payment->additional_info->payer->address->floor = "10";
        $payment->additional_info->payer->address->street_number = "12";

        $payment->additional_info->shipments->receiver_address->street_name = "Rua teste";
        $payment->additional_info->shipments->receiver_address->zip_code = "12345-123";
        $payment->additional_info->shipments->receiver_address->city_name = "São Paulo";
        $payment->additional_info->shipments->receiver_address->state_name = "SP";
        $payment->additional_info->shipments->receiver_address->street_number = "12";
        $payment->additional_info->shipments->receiver_address->apartment = "1123";
        $payment->additional_info->shipments->receiver_address->floor = "10";

        $payment->payer->email = "test_user_98934401@testuser.com";

        return $payment;
    }

    private function loadPaymentV21()
    {
        $payment = $this->loadPaymentSdkV21();
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

    private function loadPayment3DS()
    {
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $accessToken = $envVars['ACCESS_TOKEN_3DS'] ?? null;
        $publicKey = $envVars['PUBLIC_KEY'] ?? null;
        $urisScope = $envVars['URIS_SCOPE'] ?? null;
        $sdk = new Sdk(
            $accessToken,
            'ppcoreinternal',
            $envVars['PRODUCT_ID'],
            '',
            $publicKey,
            $urisScope
        );
        $notificationUrl = $envVars['NOTIFICATION_URL'] ?? null;
        $payment = $sdk->getPaymentInstance(); 
        $payment->notification_url = $notificationUrl;

        $payment->transaction_amount = 230;
        $payment->description = "Ergonomic Silk Shirt";
        $payment->installments = 3;
        $payment->payment_method_id = "master";
        $payment->payer->email = "test_user_98934401@testuser.com";
        $payment->three_d_secure_mode = "optional";

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
        try {
            $response = json_decode(json_encode($payment->save()));
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        $this->assertStringContainsString("Your payment was declined because something went wrong. We recommend trying again or paying with another payment method.", $response);
    }

    public function testPaymentSuccessBoleto()
    {
        $payment = $this->loadPayment();

        $payment->payment_method_id = "bolbradesco";
        $payment->payer->address->zip_code = "000";
        $payment->payer->address->street_name = "rua teste";
        $payment->payer->address->street_number = "123";
        $payment->payer->address->neighborhood = "neighborhood";
        $payment->payer->address->city = "city";
        $payment->payer->address->federal_unit = "federal_unit";

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

    public function testPaymentSuccessCreditCard3DS()
    {
        $payment = $this->loadPayment3DS();

        $cardToken = new CardToken();
        $idToken = $cardToken->generateCardTokenMaster3DS("APRO");

        $payment->token = $idToken;
        $payment->installments = 3;
        $payment->payment_method_id = "master";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'approved');
        $this->assertEquals($response->payment_method_id, 'master');
        $this->assertEquals($response->payment_type_id, 'credit_card');
        $this->assertEquals($response->installments, 3);
        $this->assertEquals($response->status_detail, "accredited");
    }

    public function testPaymentRejectedCreditCard3DS()
    {
        $payment = $this->loadPayment3DS();

        $cardToken = new CardToken();
        $idToken = $cardToken->generateCardTokenMaster3DS("OTHE");

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

    public function testGetPaymentSuccess()
    {
        $payment = $this->loadPayment();
        $payment->payment_method_id = "pix";
        $response = json_decode(json_encode($payment->save()));

        $paymentInstance = $this->loadPaymentSdk();
        $responseRead = json_decode(json_encode($paymentInstance->read(array(
            "id" => $response->id,
        ))));

        $this->assertEquals($responseRead->id, $response->id);
        $this->assertEquals($responseRead->status, $response->status);
        $this->assertEquals($responseRead->payment_type_id, $response->payment_type_id);
        $this->assertEquals($responseRead->payment_method_id, $response->payment_method_id);
        $this->assertEquals($responseRead->transaction_details->total_paid_amount, $response->transaction_details->total_paid_amount);
        $this->assertEquals($responseRead->transaction_details->installment_amount, $response->transaction_details->installment_amount);
        $this->assertEquals($responseRead->point_of_interaction->transaction_data->qr_code_base64, $response->point_of_interaction->transaction_data->qr_code_base64);
        $this->assertEquals($responseRead->point_of_interaction->transaction_data->qr_code, $response->point_of_interaction->transaction_data->qr_code);
    }

    public function testGetPaymentNotFound()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Payment not found');
        $paymentInstance = $this->loadPaymentSdk();
        $responseRead = json_decode(json_encode($paymentInstance->read(array(
            "id" => "123",
        ))));
    }

    public function testGetPaymentSuccessV21()
    {
        $payment = $this->loadPayment();
        $payment->payment_method_id = "pix";
        $response = json_decode(json_encode($payment->save()));

        $paymentInstance = $this->loadPaymentSdkV21();
        $responseRead = json_decode(json_encode($paymentInstance->read(array(
            "id" => $response->id,
        ))));

        $this->assertEquals($responseRead->id, $response->id);
        $this->assertEquals($responseRead->status, $response->status);
        $this->assertEquals($responseRead->payment_type_id, $response->payment_type_id);
        $this->assertEquals($responseRead->payment_method_id, $response->payment_method_id);
        $this->assertEquals($responseRead->transaction_details->total_paid_amount, $response->transaction_details->total_paid_amount);
        $this->assertEquals($responseRead->transaction_details->installment_amount, $response->transaction_details->installment_amount);
    }

    public function testGetPaymentNotFoundV21()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Payment not found');
        $paymentInstance = $this->loadPaymentSdkV21();
        $responseRead = json_decode(json_encode($paymentInstance->read(array(
            "id" => "123",
        ))));
    }

    private function generateSuperTokenCreditCardMaster()
    {
        $url = "https://api.mercadopago.com/v1/account-payment-methods?amount=100.00";
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $publicKey = $envVars['PUBLIC_KEY'] ?? null;
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . $envVars['SUPER_TOKEN_AUTHORIZATION_HEADER'] ?? null,
            'X-Caller-Id: ' . $envVars['SUPER_TOKEN_PAYER_CALLER_ID'] ?? null,
            'X-Client-Id: ' . $envVars['SUPER_TOKEN_CLIENT_ID'] ?? null,
            'X-Caller-SiteId: ' . $envVars['SUPER_TOKEN_SITE_ID'] ?? null,
            'X-Collector-Id: ' . $envVars['SUPER_TOKEN_COLLECTOR_ID'] ?? null,
            'X-Auth-Type: ' . $envVars['SUPER_TOKEN_AUTH_TYPE'] ?? null,
            'Content-Type: application/json',
        ]);

        $output = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        }

        curl_close($ch);
        return json_decode($output)->data[2]->token;
    }

    public function testPaymentSuccessSuperToken()
    {
        $payment = $this->loadPayment();
        $payment->installments = 1;
        $payment->payment_method_id = "master";
        $payment->external_reference = "ppcore-php-sdk";
        $payment->payer->phone->area_code = "11";
        $payment->payer->phone->number = "999999999";
        $payment->payer->email = "test_user_9893440@testuser.com";
        $superToken = $this->generateSuperTokenCreditCardMaster();
        $paymentTypeId = 'credit_card';
        $response = json_decode(json_encode($payment->saveWithSuperToken(
            $superToken, $paymentTypeId
        )));
        $this->assertEquals($response->status, 'approved');
        $this->assertEquals($response->payment_method_id, 'master');
        $this->assertEquals($response->payment_type_id, 'credit_card');
    }

    public function testPaymentSuccessWithLocation()
    {
        $payment = $this->loadPayment();
        $location = new Location();
        $location->source = "collector";
        $location->state_id = "BR-SP";
        $payment->point_of_interaction->location = $location;
        $payment->payment_method_id = "pix";

        $response = json_decode(json_encode($payment->save()));

        $this->assertEquals($response->status, 'pending');
        $this->assertEquals($response->payment_method_id, 'pix');
        $this->assertEquals($response->point_of_interaction->location->source, 'collector');
        $this->assertEquals($response->point_of_interaction->location->state_id, 'BR-SP');

        $paymentInstance = $this->loadPaymentSdk();
        $responseRead = json_decode(json_encode($paymentInstance->read(array(
            "id" => $response->id,
        ))));

        $this->assertEquals($responseRead->id, $response->id);
        $this->assertEquals($responseRead->status, $response->status);
        $this->assertEquals($responseRead->point_of_interaction->location->source, $response->point_of_interaction->location->source);
        $this->assertEquals($responseRead->point_of_interaction->location->state_id, $response->point_of_interaction->location->state_id);
    }
}
