<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class Config
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class Config
{
    protected $api_key;
    protected $access_token;
    protected $platform_id;
    protected $product_id;
    protected $integrator_id;

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
