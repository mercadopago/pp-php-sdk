<?php

namespace MercadoPago\PP\Sdk\Entity\Preference;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class ExcludedPaymentTypeList
 *
 * @package MercadoPago\PP\Sdk\Entity\Preference
 */
class ExcludedPaymentTypeList extends AbstractCollection
{
    public function __construct()
    {
    }

    public function add($entity, $key = null)
    {
        $excludedPaymentType = new ExcludedPaymentType();
        $excludedPaymentType->setEntity($entity);
        parent::add($excludedPaymentType, $key);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
