<?php

namespace MercadoPago\PP\Sdk;

/**
 * Class Sdk
 *
 * @package MercadoPago\PP\Sdk\
 */
class Sdk
{

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
    }
}
