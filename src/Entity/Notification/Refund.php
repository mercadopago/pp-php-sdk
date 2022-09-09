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
    public float $id;

    public string $status;

    public bool $notifying;

    public object $metadata;
}
