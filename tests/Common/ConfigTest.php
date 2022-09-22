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
        $this->config->access_token = 'XXX';

        $actual = $this->config->__get('access_token');
        $expected = 'XXX';

        $this->assertEquals($expected, $actual);
    }
}
