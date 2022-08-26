<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class AbstractEntity
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class AbstractEntity implements \JsonSerializable
{

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $properties = get_object_vars($this);

        return $properties;
    }
}
