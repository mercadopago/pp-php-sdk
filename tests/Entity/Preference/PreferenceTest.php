<?php

namespace MercadoPago\PP\Sdk\Tests\Entity\Preference;

use MercadoPago\PP\Sdk\HttpClient\Response;
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
    protected $responseMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->preferenceMock = PreferenceMock::COMPLETE_PREFERENCE;

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->responseMock = $this->getMockBuilder(Response::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->preference = new Preference($this->managerMock);
        $this->preference->setEntity($this->preferenceMock);
    }

    function testGetAndSetSuccess()
    {
        $this->preference->__set('external_reference', 'XXX');

        $actual = $this->preference->__get('external_reference');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }

    function testGetUriSuccess()
    {
        $actual = $this->preference->getUris();

        $this->assertTrue(is_array($actual));
    }

    function testSaveSuccess()
    {
        $this->responseMock->expects(self::any())->method('getStatus')->willReturn(201);
        $this->responseMock->expects(self::any())->method('getData')->willReturn($this->preferenceMock);

        $this->managerMock->expects(self::any())->method('getEntityUri')->willReturn('/v1/asgard/preferences');
        $this->managerMock->expects(self::any())->method('getHeader')->willReturn([]);
        $this->managerMock->expects(self::any())->method('execute')->willReturn($this->responseMock);
        $this->managerMock->expects(self::any())->method('handleResponse')->willReturn(true);

        $actual = $this->preference->save();

        $this->assertTrue($actual);
    }

    function testJsonSerializeSuccess()
    {
        $actual = $this->preference->jsonSerialize();
        $expected = 'WC-XX';

        $this->assertTrue(is_array($actual));
        $this->assertEquals($expected, $actual['external_reference']);
    }
}
