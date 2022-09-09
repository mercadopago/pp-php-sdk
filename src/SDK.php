<?php

namespace MercadoPago\PP\Sdk;

use MercadoPago\PP\Sdk\Common\Config;

/**
 * Class Sdk
 *
 * @package MercadoPago\PP\Sdk
 */
class Sdk
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param String $api_key
     * @param String $access_token
     * @param String $platform_id
     * @param String $product_id
     * @param String $integrator_id
     */
    public function __construct(
        string $api_key,
        string $access_token,
        string $platform_id,
        string $product_id,
        string $integrator_id
    ) {
        $this->config = new Config();
        $this->config->__set('api_key', $api_key);
        $this->config->__set('access_token', $access_token);
        $this->config->__set('platform_id', $platform_id);
        $this->config->__set('product_id', $product_id);
        $this->config->__set('integrator_id', $integrator_id);
    }
}
