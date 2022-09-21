<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class FreeMethodList
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class FreeMethodList extends AbstractCollection
{
    public function __construct()
    {
    }

    public function add($entity, $key = null)
    {
        $freeMethod = new FreeMethod();
        $freeMethod->setEntity($entity);
        parent::add($freeMethod, $key);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
