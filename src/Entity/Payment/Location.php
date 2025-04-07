<?php

namespace MercadoPago\PP\Sdk\Entity\Payment;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Location
 *
 * @property string $source
 * @property string $state_id
 *
 * @package MercadoPago\PP\Sdk\Entity\Payment
 */
class Location extends AbstractEntity
{
    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $state_id;
}
