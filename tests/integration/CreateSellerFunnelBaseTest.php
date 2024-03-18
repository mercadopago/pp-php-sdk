<?php

namespace MercadoPago\PP\Sdk\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MercadoPago\PP\Sdk\Sdk;

class CreateSellerFunnelBaseTest extends TestCase
{
    private function loadCreateSellerFunnelBase()
    {
        $configKeys = new ConfigKeys();
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

        $createSellerFunnelBase = $sdk->getCreateSellerFunnelBaseInstance();

        $createSellerFunnelBase->platform_id = "123";
        $createSellerFunnelBase->shop_url = "http://localhost";

        return $createSellerFunnelBase;
    }


    public function testCreateSellerFunnelBaseWithSuccess()
    {
        $createSellerFunnelBase = $this->loadCreateSellerFunnelBase();

        $response = $createSellerFunnelBase->save();

        $this->assertNotNull($response->id);
        $this->assertNotNull($response->cpp_token);
    }
}
