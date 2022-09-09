<?php

namespace MercadoPago\PP\Sdk\Tests\Entity\Preference;

use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\Common\Config;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Preference\Preference;
use MercadoPago\PP\Sdk\Tests\Mock\PreferenceMock;

/**
 * Class PreferenceTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Entity\Preference
 */
class PreferenceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Preference
     */
    private $preference;

    /**
     * @var array
     */
    private $preferenceMock;

    /**
     * @var MockObject
     */
    protected $managerMock;

    /**
     * @var MockObject
     */
    protected $configMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->preferenceMock = PreferenceMock::COMPLETE_PREFERENCE;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->configMock = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->preference = new Preference($this->managerMock, $this->configMock);
        $this->preference->setData($this->preferenceMock);
    }

    function testGetAndSetSuccess()
    {
        $this->preference->__set('id', 'XXX');

        $actual = $this->preference->__get('id');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }

    function testGetPropertiesSuccess()
    {
        $actual = $this->preference->getProperties();

        $this->assertTrue(is_array($actual));
    }

    function testGetUriSuccess()
    {
        $actual = $this->preference->getUris();

        $this->assertTrue(is_array($actual));
    }

    function testHandleResponseSuccess()
    {
        $response = new Response();
        $response->setStatus(201);
        $response->setData($this->preference);

        $actual = $this->preference->handleResponse($response, 'post');

        $this->assertTrue($actual);
    }

    function testHandleResponseFailure()
    {
        $data = array('message' => 'Error');

        $response = new Response();
        $response->setStatus(400);
        $response->setData($data);

        $this->expectExceptionMessage('Error');
        $this->preference->handleResponse($response, 'post');
    }

    function testHandleResponseFailureInternalApiError()
    {
        $response = new Response();
        $response->setStatus(500);
        $response->setData(null);

        $this->expectExceptionMessage('Internal API Error');
        $this->preference->handleResponse($response, 'post');
    }

    function testJsonSerializeSuccess()
    {
        $actual = $this->preference->jsonSerialize();
        $expected = 'X123X-X123X-X123X-X123X';

        $this->assertTrue(is_array($actual));
        $this->assertEquals($expected, $actual['id']);
    }

    function testSaveSuccess()
    {
        $response = new Response();
        $response->setStatus(201);
        $response->setData($this->preferenceMock);

        $this->managerMock->expects(self::any())->method('getEntityUri')->willReturn('/preferences');
        $this->configMock->expects(self::exactly(4))->method('__get')->willReturn('XXX');
        $this->managerMock->expects(self::any())->method('execute')->willReturn($response);

        $actual = $this->preference->save();

        $this->assertTrue($actual);
    }
}
