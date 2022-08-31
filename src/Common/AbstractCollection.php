<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class AbstractCollection
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class AbstractCollection
{
    /**
     * @var array
     */
    protected $collection;

    /**
     * Add entity to collection
     *
     * @param AbstractEntity $abstractEntity
     *
     **/
    public function add(AbstractEntity $abstractEntity)
    {
        $this->collection[] = $abstractEntity;
    }

    /**
     * Get the collection array
     *
     * @return array
     **/
    public function toArray()
    {
        $collection = array();

        foreach ($this->collection as $item) {
            if ($item instanceof AbstractEntity) {
                array_push($collection, $item->toArray());
            } else {
                array_push($collection, $item);
            }
        }

        return $collection;
    }

    /**
     * Get the collection JSON
     *
     * @return mixed
     **/
    public function toJSON()
    {
        $collection = array();

        foreach ($this->collection as $item) {
            array_push($collection, $item->attributesToJson());
        }

        return json_encode($collection);
    }
}
