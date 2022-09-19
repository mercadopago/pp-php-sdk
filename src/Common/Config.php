<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class Config
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class Config
{
    /**
     * @var string
     */
    private $api_key;

    /**
     * @var string
     */
    private $access_token;

    /**
     * @var string
     */
    private $platform_id;

    /**
     * @var string
     */
    private $product_id;

    /**
     * @var string
     */
    private $integrator_id;

    /**
     * Config constructor.
     *
     * @param string|null $api_key
     * @param string|null $access_token
     * @param string|null $platform_id
     * @param string|null $product_id
     * @param string|null $integrator_id
     */
    public function __construct(
        $api_key = null,
        $access_token = null,
        $platform_id = null,
        $product_id = null,
        $integrator_id = null
    ) {
        $this->__set('api_key', $api_key);
        $this->__set('access_token', $access_token);
        $this->__set('platform_id', $platform_id);
        $this->__set('product_id', $product_id);
        $this->__set('integrator_id', $integrator_id);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->{$name};
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
}
