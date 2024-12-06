<?php

namespace MercadoPago\PP\Sdk\Tests\Integration;

use PHPUnit\Framework\TestCase;
use MercadoPago\PP\Sdk\Sdk;

class OnboardingTest extends TestCase
{
    private function loadOnboardingInstance()
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

        return $sdk->getOnboardingInstance();
    }

    public function testGetOnboardingDataWithSuccess()
    {
        $configKeys = new ConfigKeys();
        $envVars = $configKeys->loadConfigs();
        $onboardingInstance = $this->loadOnboardingInstance();

        $response = json_decode(json_encode($onboardingInstance->getOnboardingData($envVars['APPLICATION_ID'])));

        var_dump($response);

        $this->assertTrue(is_string($response->application->name));
        $this->assertTrue(is_string($response->user->email));
    }
}
