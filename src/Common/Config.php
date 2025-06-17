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
     * @var string
     */
    private $public_key;

    /**
     * @var string
     */
    private $uris_scope;

    /**
     * Config constructor.
     *
     * @param string|null $access_token
     * @param string|null $platform_id
     * @param string|null $product_id
     * @param string|null $integrator_id
     * @param string|null $public_key
     * @param string|null $uris_scope
     */
    public function __construct(
        ?string $access_token = null,
        ?string $platform_id = null,
        ?string $product_id = null,
        ?string $integrator_id = null,
        ?string $public_key = null,
        ?string $uris_scope = null
    ) {
        $this->access_token = $access_token;
        $this->platform_id = $platform_id;
        $this->product_id = $product_id;
        $this->integrator_id = $integrator_id;
        $this->public_key = $public_key;
        $this->uris_scope = $uris_scope;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->{$name};
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function __set(string $name, string $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
}
