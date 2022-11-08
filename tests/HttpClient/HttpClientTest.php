<?php

use MercadoPago\PP\Sdk\HttpClient\HttpClient;
use MercadoPago\PP\Sdk\HttpClient\Response;
use MercadoPago\PP\Sdk\HttpClient\Requester\RequesterInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class HttpClientTest
 *
 * @package MercadoPago\Tests\HttpClient
 */
class HttpClientTest extends TestCase
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
        $mockResponse->setData(new stdClass());

        $client = new HttpClient('https://some-url.com', $this->getRequesterInterfaceMock($mockResponse));

        // act
        $response = $client->get('/');

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
        $mockResponse->setData(new stdClass());

        $client = new HttpClient('https://some-url.com', $this->getRequesterInterfaceMock($mockResponse));

        // act
        $response = $client->put('/');

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
        $mockResponse->setData(new stdClass());

        $client = new HttpClient('https://some-url.com', $this->getRequesterInterfaceMock($mockResponse));

        // act
        $response = $client->post('/');

        $this->assertEquals($mockResponse, $response);
    }

    /**
     * A single example test.
     */
    function testHttpSendUriError()
    {
        // arrange
        $mockResponse = new Response();

        $client = new HttpClient('https://some-url.com', $this->getRequesterInterfaceMock($mockResponse));

        // assert + act
        $this->expectException(Exception::class);
        $client->send('get', 100);
    }

    /**
     * A single example test.
     */
    function testHttpSendBodyError()
    {
        // arrange
        $mockResponse = new Response();

        $client = new HttpClient('https://some-url.com', $this->getRequesterInterfaceMock($mockResponse));

        // assert + act
        $this->expectException(Exception::class);
        $client->send('get', 'https://some-url.com', [], 100);
    }
}
