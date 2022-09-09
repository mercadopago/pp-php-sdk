<?php

namespace MercadoPago\PP\Sdk\Common;

use Iterator;

/**
 * Class AbstractCollection
 *
 * @package MercadoPago\PP\Sdk\Common
 */
abstract class AbstractCollection implements \IteratorAggregate, \Countable, \JsonSerializable
{
    /**
     * @var array
     */
    public $collection;

    /**
     * Add entity to collection
     *
     * @param $entity
     * @param null $key
     */
    public function add(AbstractEntity $entity, $key = null)
    {
        if (is_null($key)) {
            $this->collection[] = $entity;
        } else {
            $this->collection[$key] = $entity;
        }
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Iterator
    {
        return new \ArrayIterator($this->collection);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->collection);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->collection;
    }
}
