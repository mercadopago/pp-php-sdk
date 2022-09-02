<?php

use MercadoPago\PP\Sdk\HttpClient\HttpClient;
use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\HttpClient\Requester\RequesterInterface;

/**
 * Class Test-HttpClient
 *
 * @package Tests
 */
class HttpClientTest extends \PHPUnit\Framework\TestCase
{

    function getRequesterInterfaceMock($response)
    {
        $mock = $this->getMockBuilder(RequesterInterface::class)
            ->onlyMethods(['createRequest', 'sendRequest'])
            ->getMock();

        $mock->expects(self::any())->method('createRequest')->willReturn($mock);

        $mock->expects(self::any())->method('sendRequest')->willReturn($response);

        return $mock;
    }

    /**
     * A single example test.
     */
    function testHttpGetSuccess()
    {
        // arrange
        $mockResponse = new Response();
        $mockResponse->setStatus(200);
        $mockResponse->setData('teste');

        $client = new HttpClient($this->getRequesterInterfaceMock($mockResponse));

        // act
        $response = $client->get('https://some-url.com');

        // assert
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * A single example test.
     */
    function testHttpPutSuccess()
    {
        // arrange
        $mockResponse = new Response();
        $mockResponse->setStatus(200);
        $mockResponse->setData('teste');

        $client = new HttpClient($this->getRequesterInterfaceMock($mockResponse));
        
        // act
        $response = $client->put('https://some-url.com');

        // assert
        $this->assertEquals($mockResponse, $response);
    }

    /**
     * A single example test.
     */
    function testHttpPostSuccess()
    {
        // arrange
        $mockResponse = new Response();
        $mockResponse->setStatus(200);
        $mockResponse->setData('teste');

        $client = new HttpClient($this->getRequesterInterfaceMock($mockResponse));
        
        // act
        $response = $client->post('https://some-url.com');

        $this->assertEquals($mockResponse, $response);
    }

    /**
     * A single example test.
     */
    function testHttpSendUriError()
    {
        // arrange
        $mockResponse = new Response();

        $client = new HttpClient($this->getRequesterInterfaceMock($mockResponse));

        // assert + act
        $this->expectException(\TypeError::class);
        $client->send('get', 100);
    }

    /**
     * A single example test.
     */
    function testHttpSendBodyError()
    {
        // arrange
        $mockResponse = new Response();

        $client = new HttpClient($this->getRequesterInterfaceMock($mockResponse));

        // assert + act
        $this->expectException(\TypeError::class);
        $client->send('get', 'https://some-url.com', [], 100);
    }
}
