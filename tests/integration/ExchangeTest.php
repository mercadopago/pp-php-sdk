<?php


use MercadoPago\PP\Sdk\Sdk;
use PHPUnit\Framework\TestCase;

class ExchangeTest extends TestCase
{
    private function loadSdk()
    {
        $configKeys = new \MercadoPago\PP\Sdk\Tests\Integration\ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $accessToken = $envVars['ACCESS_TOKEN'] ?? null;
        $publicKey = $envVars['PUBLIC_KEY'] ?? null;
        $sdk = new Sdk(
            $accessToken,
            'ppcoreinternal',
            'ppcoreinternal',
            '',
            $publicKey
        );

        return $sdk;
    }

    public function testGetExchange()
    {
        $sdk = $this->loadSdk();
        $exchange = $sdk->getExchangeInstance();
        $response = $exchange->getExchangeRate("USD");
        $this->assertNotNull($response);
        $this->assertNotEmpty($response->rate);
        $this->assertEquals($response->currency_base, "USD");
        $this->assertEquals($response->currency_quote, "BRL");
        $this->assertTrue($response->rate > 0);
    }

}

