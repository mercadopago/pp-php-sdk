<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class Config
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class Config
{
    protected string $api_key;
    protected string $access_token;
    protected string $platform_id;
    protected string $product_id;
    protected string $integrator_id;

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->{$name};
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
}
