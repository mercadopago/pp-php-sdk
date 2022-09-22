<?php

namespace MercadoPago\PP\Sdk\Entity\Notification;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Refund
 *
 * @package MercadoPago\PP\Sdk\Entity
 */
class Refund extends AbstractEntity
{
    /**
     * @var float
     */
    public $id;

    /**
     * @var string
     */
    public $status;

    /**
     * @var bool
     */
    public $notifying;

    /**
     * @var object
     */
    public $metadata;
}
