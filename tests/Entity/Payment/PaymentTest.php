<?php

namespace MercadoPago\PP\Sdk\Tests\Entity\Notification;

use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Payment\Payment;
use MercadoPago\PP\Sdk\Tests\Mock\PaymentMock;

/**
 * Class PaymentTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Entity\Notification
 */
class PaymentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * @var array
     */
    private $paymentMock;

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
        $this->paymentMock = PaymentMock::COMPLETE_PAYMENT;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->responseMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->payment = new Payment($this->managerMock);
        $this->payment->setEntity($this->paymentMock);
    }

    function testSubclassesTypes()
    {
        $additionalInfo = $this->payment->additional_info;
        $additionalInfoPayer = $additionalInfo->payer;
        $additionalInfoPayerAddress = $additionalInfoPayer->address;
        $phone = $additionalInfoPayer->phone;

        $shipments = $additionalInfo->shipments;
        $receiverAddress = $shipments->receiver_address;

        $items = $additionalInfo->items;
        $item = $items->getIterator()[0];

        $payer = $this->payment->payer;
        $identification = $payer->identification;
        $payerAddress = $payer->address;

        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\AdditionalInfo", $additionalInfo);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\AdditionalInfoPayer", $additionalInfoPayer);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\AdditionalInfoPayerAddress", $additionalInfoPayerAddress);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\Phone", $phone);

        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\Shipments", $shipments);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\ReceiverAddress", $receiverAddress);

        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\ItemList", $items);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\Item", $item);

        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\Payer", $payer);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\PayerIdentification", $identification);
        $this->assertInstanceOf("MercadoPago\PP\Sdk\Entity\Payment\Address", $payerAddress);
    }

    function testGetAndSetSuccess()
    {
        $this->payment->external_reference = 'XXX';

        $actual = $this->payment->__get('external_reference');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }

    function testGetUriSuccess()
    {
        $actual = $this->payment->getUris();

        $this->assertTrue(is_array($actual));
    }

    function testReadSuccess()
    {
        $this->responseMock->expects(self::any())->method('getStatus')->willReturn(200);
        $this->responseMock->expects(self::any())->method('getData')->willReturn($this->paymentMock);

        $this->managerMock->expects(self::any())->method('getEntityUri')->willReturn('/v1/asgard/payments');
        $this->managerMock->expects(self::any())->method('getHeader')->willReturn([]);
        $this->managerMock->expects(self::any())->method('execute')->willReturn($this->responseMock);
        $this->managerMock->expects(self::any())->method('handleResponse')->willReturn($this->paymentMock);

        $actual = $this->payment->read(array("external_reference" => "WC-105"));

        $this->assertEquals(json_encode($this->responseMock->getData()), json_encode($actual));
    }

    function testJsonSerializeSuccess()
    {
        $actual = $this->payment->jsonSerialize();
        $expected = 'WC-105';

        $this->assertTrue(is_array($actual));
        $this->assertEquals($expected, $actual['external_reference']);
    }
}
