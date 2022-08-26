<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class AbstractCollection
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class AbstractCollection implements \JsonSerializable
{
    protected $collection = [];

    public function add(AbstractEntity $abstractEntity)
    {
        $this->collection[] = $abstractEntity;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $properties = get_object_vars($this);

        return $properties;
    }
}
