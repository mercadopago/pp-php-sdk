<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class ExcludedPaymentMethodList
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class ExcludedPaymentMethodList extends AbstractCollection
{
    public function __construct()
    {
    }

    public function add($entity, $key = null)
    {
        $excludedPaymentMethod = new ExcludedPaymentMethod();
        $excludedPaymentMethod->setEntity($entity);
        parent::add($excludedPaymentMethod, $key);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
