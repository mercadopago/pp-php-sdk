<?php

namespace Entity\Exchange;

use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Exchange\Exchange;
use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\Tests\Unit\Mock\ExchangeMock;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class ExchangeTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Unit\Entity\Exchange
 */
class ExchangeTest extends TestCase
{
    /**
     * @var Exchange
    */
    private $exchange;

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
        $this->exchange = ExchangeMock::EXCHANGE_MOCK;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->responseMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->exchange = new Exchange($this->managerMock);
    }

    function testGetHeadersSuccess()
    {
        $actual = $this->exchange->getHeaders();

        $this->assertTrue(is_array($actual));
        $this->assertArrayHasKey('read', $actual);
    }

    function testGetUriSuccess()
    {
        $actual = $this->exchange->getUris();

        $this->assertTrue(is_array($actual));
    }

    function testGetExchangeSuccess()
    {
        $this->responseMock->expects(self::any())->method('getStatus')->willReturn(200);
        $this->responseMock->expects(self::any())->method('getData')->willReturn($this->exchange);

        $this->managerMock->expects(self::any())->method('getEntityUri')->willReturn('/ppcore/beta/payment-methods/v1/exchange');
        $this->managerMock->expects(self::any())->method('getHeader')->willReturn([]);
        $this->managerMock->expects(self::any())->method('execute')->willReturn($this->responseMock);
        $this->managerMock->expects(self::any())->method('handleResponse')->willReturn($this->exchange);

        $actual = $this->exchange->getExchangeRate("USD");

        $this->assertNotNull($actual);
    }

}
