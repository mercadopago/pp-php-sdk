<?php

namespace MercadoPago\PP\Sdk\Tests\Common;

use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\Entity\Preference\Preference;
use MercadoPago\PP\Sdk\HttpClient\HttpClient;
use MercadoPago\PP\Sdk\HttpClient\Response;
use stdClass;

/**
 * Class ManagerTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Common\Manager
 */
class ManagerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var MockObject
     */
    protected $clientMock;

    /**
     * @var MockObject
     */
    protected $preferenceMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->clientMock = $this->getMockBuilder(HttpClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->preferenceMock = $this->getMockBuilder(Preference::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->manager = new Manager($this->clientMock);
    }

    function testExecutePostSuccess()
    {
        $headers = array('x-product-id' => 'product_id', 'x-integrator-id' => 'integrator_id');
        $expected = new Response();

        $this->preferenceMock->expects(self::any())->method('jsonSerialize')->willReturn('teste');
        $this->clientMock->expects(self::any())->method('post')->willReturn($expected);

        $actual = $this->manager->execute($this->preferenceMock, '/preference', 'post', $headers);

        $this->assertEquals($expected, $actual);
    }

    function testExecuteGetSuccess()
    {
        $headers = array('x-product-id' => 'product_id', 'x-integrator-id' => 'integrator_id');
        $expected = new Response();

        $this->clientMock->expects(self::any())->method('get')->willReturn($expected);

        $actual = $this->manager->execute($this->preferenceMock, '/preference', 'get', $headers);

        $this->assertEquals($expected, $actual);
    }

    function testGetEntityUrlWithoutParamsSuccess()
    {
        $uris = array('post' => '/preferences');

        $this->preferenceMock->expects(self::any())->method('getUris')->willReturn($uris);

        $actual = $this->manager->getEntityUri($this->preferenceMock, 'post');
        $expected = '/preferences';

        $this->assertEquals($expected, $actual);
    }

    function testGetEntityUrlWithParamsSuccess()
    {
        $uris = array('get' => '/preferences/:id');
        $params = array('id' => '123');

        $this->preferenceMock->expects(self::any())->method('getUris')->willReturn($uris);

        $actual = $this->manager->getEntityUri($this->preferenceMock, 'get', $params);
        $expected = '/preferences/123';

        $this->assertEquals($expected, $actual);
    }

    function testGetEntityUrlFailure()
    {
        $entity = new stdClass();

        $this->expectExceptionMessage('Method not available for stdClass entity');
        $this->manager->getEntityUri($entity, 'post');
    }

    function testGetEntityUrlWithParamsFailure()
    {
        $uris = array('get' => '/preferences/:id');
        $params = array('client_id' => '123');

        $this->preferenceMock->expects(self::any())->method('getUris')->willReturn($uris);

        $actual = $this->manager->getEntityUri($this->preferenceMock, 'get', $params);
        $expected = '/preferences/';

        $this->assertEquals($expected, $actual);
    }
}
