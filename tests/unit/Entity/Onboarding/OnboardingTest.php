<?php

namespace MercadoPago\PP\Sdk\Tests\Unit\Entity\Onboarding;

use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Onboarding\Onboarding;
use MercadoPago\PP\Sdk\Tests\Unit\Mock\OnboardingMock;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class OnboardingTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Entity\Onboarding
 */
class OnboardingTest extends TestCase
{
    /**
     * @var Onboarding
     */
    private $onboarding;

    /**
     * @var array
     */
    private $onboardingMock;

    /**
     * @var MockObject
     */
    protected $managerMock;

    /**
     * @var MockObject
     */
    protected $responseMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->onboardingMock = OnboardingMock::ONBOARDING_DATA;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->responseMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->onboarding = new Onboarding($this->managerMock);
        $this->onboarding->setEntity($this->onboardingMock);
    }

    function testSubclassesTypes()
    {
        $application = $this->onboarding->__get('application');
        $user = $this->onboarding->__get('user');

        $this->assertIsArray($application);
        $this->assertIsArray($user);
    }

    function testGetAndSetSuccess()
    {
        $this->onboarding->__set('application', $this->onboardingMock['application']);

        $actual = $this->onboarding->__get('application');
        $expected = $this->onboardingMock['application'];

        $this->assertEquals($expected, $actual);
    }

    function testGetHeadersSuccess()
    {
        $actual = $this->onboarding->getHeaders();

        $this->assertTrue(is_array($actual));
        $this->assertArrayHasKey('read', $actual);
        $this->assertArrayHasKey('save', $actual);
        $this->assertTrue(is_array($actual['read']));
        $this->assertTrue(is_array($actual['save']));
    }

    function testGetUriSuccess()
    {
        $actual = $this->onboarding->getUris();

        $this->assertTrue(is_array($actual));
    }

    function testJsonSerializeSuccess()
    {
        $actual = $this->onboarding->jsonSerialize();
        $expected = $this->onboardingMock['application']['name'];

        $this->assertTrue(is_array($actual));
        $this->assertEquals($expected, $actual['application']['name']);
    }
}
