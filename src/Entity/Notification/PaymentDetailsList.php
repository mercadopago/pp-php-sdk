<?php

namespace MercadoPago\PP\Sdk\Entity\Notification;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class PaymentDetailsList
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class PaymentDetailsList extends AbstractCollection
{

    public function add($entity, $key = null)
    {
        $item = new PaymentDetails();
        $item->setEntity($entity);
        parent::add($item, $key);
    }

    public function __construct()
    {
    }

    /**
     * @codeCoverageIgnore
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }
}
