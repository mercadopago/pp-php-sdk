<?php

namespace MercadoPago\PP\Sdk\Entity\Shared;

use MercadoPago\PP\Sdk\Common\AbstractEntity;

/**
 * Class Shipment
 *
 * @package MercadoPago\PP\Sdk\Entity\Shared
 */
class Shipment extends AbstractEntity
{

    /**
     * @var float
     */
    protected $cost;

    /**
     * @var string
     */
    protected $default_shipping_method;

    /**
     * @var object
     */
    protected $dimensions;

    /**
     * @var array
     */
    protected $free_methods;

    /**
     * @var boolean
     */
    protected $free_shipping;

    /**
     * @var boolean
     */
    protected $local_pickup;

    /**
     * @var string
     */
    protected $mode;

    /**
     * @var object
     */
    protected $receiver_address;
}
