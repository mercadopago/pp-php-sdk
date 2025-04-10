<?php

namespace MercadoPago\PP\Sdk\Tests\Unit\Entity\Notification;

use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Notification\Notification;
use MercadoPago\PP\Sdk\Tests\Unit\Mock\NotificationMock;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class NotificationTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Entity\Notification
 */
class NotificationTest extends TestCase
{
    /**
     * @var Notification
     */
    private $notification;

    /**
     * @var Notification
     */
    private $notificationRefunds;

    /**
     * @var array
     */
    private $notificationMock;

    /**
     * @var array
     */
    private $notificationRefundsMock;

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
        $this->notificationMock = NotificationMock::COMPLETE_NOTIFICATION;
        $this->notificationRefundsMock = NotificationMock::COMPLETE_NOTIFICATION_WITH_REFUND_NOTIFYING;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->responseMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->notificationRefunds = new Notification($this->managerMock);
        $this->notificationRefunds->setEntity($this->notificationRefundsMock);

        $this->notification = new Notification($this->managerMock);
        $this->notification->setEntity($this->notificationMock);
    }

    function testGetAndSetSuccess()
    {
        $this->notification->__set('notification_id', 'XXX');

        $actual = $this->notification->__get('notification_id');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }

    function testGetHeadersSuccess()
    {
        $actual = $this->notification->getHeaders();

        $this->assertTrue(is_array($actual));
        $this->assertArrayHasKey('read', $actual);
        $this->assertArrayHasKey('save', $actual);
        $this->assertTrue(is_array($actual['read']));
        $this->assertTrue(is_array($actual['save']));
    }

    function testGetUriSuccess()
    {
        $actual = $this->notification->getUris();

        $this->assertTrue(is_array($actual));
        $this->assertContains('/v1/asgard/notification/:id', $actual);
    }

    function testGetUriBetaSuccess()
    {
        $uris_scope = 'beta';
        $actual = $this->notification->getUris($uris_scope);

        $this->assertTrue(is_array($actual));
        $this->assertContains('/beta/asgard/notification/:id', $actual);
    }

    function testReadSuccess()
    {
        $this->responseMock->expects(self::any())->method('getStatus')->willReturn(200);
        $this->responseMock->expects(self::any())->method('getData')->willReturn($this->notificationMock);

        $this->managerMock->expects(self::any())->method('getEntityUri')->willReturn('/v1/asgard/notification/:id');
        $this->managerMock->expects(self::any())->method('getHeader')->willReturn([]);
        $this->managerMock->expects(self::any())->method('execute')->willReturn($this->responseMock);
        $this->managerMock->expects(self::any())->method('handleResponse')->willReturn($this->notificationMock);

        $actual = $this->notification->read(array("id" => "P-25604645467"));

        $this->assertEquals(json_encode($this->responseMock->getData()), json_encode($actual));
    }

    function testJsonSerializeSuccess()
    {
        $actual = $this->notification->jsonSerialize();
        $expected = 'P-25604645467';

        $this->assertTrue(is_array($actual));
        $this->assertEquals($expected, $actual['notification_id']);
    }

    function testJsonSerializeRefundsNotifyingSuccess()
    {
        $actual = $this->notificationRefunds->refunds_notifying->jsonSerialize();
        var_dump($actual);
        $this->assertTrue(is_array($actual));
        $this->assertEquals('22.01', $actual[0]->original_currency_amount);
        $this->assertEquals(10, $actual[0]->amount);
        $this->assertEquals(true, $actual[0]->notifying);
        $this->assertEquals(1719452103, $actual[0]->id);
    }
}
