<?php

namespace MercadoPago\PP\Sdk\Tests\Common;

use MercadoPago\PP\Sdk\Common\Config;

/**
 * Class ConfigTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Common\Config
 */
class ConfigTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->config = new Config();
    }

    function testGetAndSetSuccess()
    {
        $this->config->__set('api_key', 'XXX');

        $actual = $this->config->__get('api_key');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }
}
