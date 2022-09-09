<?php

namespace MercadoPago\PP\Sdk\Tests\Entity\Notification;

use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\Common\Config;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Notification\Notification;
use MercadoPago\PP\Sdk\Tests\Mock\NotificationMock;

/**
 * Class NotificationTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Entity\Notification
 */
class NotificationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Notification
     */
    private $notification;

    /**
     * @var array
     */
    private $notificationMock;

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
        $this->notificationMock = NotificationMock::COMPLETE_NOTIFICATION;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->configMock = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->notification = new Notification($this->managerMock, $this->configMock);
        $this->notification->setData($this->notificationMock);
    }

    function testGetAndSetSuccess()
    {
        $this->notification->__set('notification_id', 'XXX');

        $actual = $this->notification->__get('notification_id');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }

    function testGetPropertiesSuccess()
    {
        $actual = $this->notification->getProperties();

        $this->assertTrue(is_array($actual));
    }

    function testGetUriSuccess()
    {
        $actual = $this->notification->getUris();

        $this->assertTrue(is_array($actual));
    }

    function testHandleResponseSuccess()
    {
        $response = new Response();
        $response->setStatus(200);
        $response->setData($this->notificationMock);

        $expected = $this->notification;
        $actual = $this->notification->handleResponse($response, 'get', $expected);

        $this->assertEquals($expected, $actual);
    }

    function testHandleResponseFailure()
    {
        $data = array('message' => 'Error');

        $response = new Response();
        $response->setStatus(400);
        $response->setData($data);

        $this->expectExceptionMessage('Error');
        $this->notification->handleResponse($response, 'get');
    }

    function testHandleResponseFailureInternalApiError()
    {
        $response = new Response();
        $response->setStatus(500);
        $response->setData(null);

        $this->expectExceptionMessage('Internal API Error');
        $this->notification->handleResponse($response, 'get');
    }

    function testJsonSerializeSuccess()
    {
        $actual = $this->notification->jsonSerialize();
        $expected = 'P-25604645467';

        $this->assertTrue(is_array($actual));
        $this->assertEquals($expected, $actual['notification_id']);
    }

    function testReadSuccess()
    {
        $response = new Response();
        $response->setStatus(200);
        $response->setData($this->notificationMock);

        $this->managerMock->expects(self::any())->method('getEntityUri')->willReturn('/bifrost/notification/status/:id');
        $this->configMock->expects(self::any())->method('__get')->willReturn('XXX');
        $this->managerMock->expects(self::any())->method('execute')->willReturn($response);

        $actual = $this->notification->read( array("id" => "P-25604645467") );

        $this->assertEquals(json_encode($response->getData()), json_encode($actual));
    }
}
