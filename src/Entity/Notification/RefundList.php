<?php

namespace MercadoPago\PP\Sdk\Entity\Notification;

use MercadoPago\PP\Sdk\Common\AbstractCollection;

/**
 * Class RefundList
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class RefundList extends AbstractCollection
{

    public function add($entity, $key = null)
    {
        $refund = new Refund();
        $refund->setEntity($entity);
        parent::add($refund, $key);
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
